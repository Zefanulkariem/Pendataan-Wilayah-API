<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre_Point;
use App\Models\LokasiUmkm;
use App\Models\Desa;
use App\Models\User;
use Illuminate\Support\Str;

use Alert;

class LokasiUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desa = Desa::all();

        $lk = LokasiUmkm::whereHas('user.roles', function ($query) {
            $query->where('name', 'Umkm'); //ini namanya closure yah | kondisi
        })->with('user')->get(); //kalo ini metode Eager Loading
    
        $userMa = auth()->user();

        if ($userMa->hasRole('Master Admin')) {
            return view('masterAdmin.spot.index', compact('lk', 'desa'));
        } else if ($userMa->hasRole('Admin')) {
            return view('admin.spot.index', compact('lk', 'desa'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desa = Desa::all();

        $idUser = User::whereHas('roles', function ($query) {
            $query->where('name', 'Umkm');
        })->get();

        $centerPoint = Centre_Point::get()->first();
        $userMa = auth()->user();

        if ($userMa->hasRole('Master Admin')) {
            return view('masterAdmin.spot.create', compact('desa', 'centerPoint', 'idUser'));
        } else if ($userMa->hasRole('Admin')) {
            return view('admin.spot.create', compact('desa', 'centerPoint', 'idUser'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_user' => 'required|exists:users,id',
            'nama_umkm' => 'required|string|max:255',
            'koordinat' => 'required',
            'deskripsi' => 'required|string|min:10|max:1000',
            'image' => 'file|image|mimes:png,jpg,jpeg',
            'id_desa' => 'required|exists:desas,id',
        ]);

        $spot = new LokasiUmkm;
        if ($request->hasFile('image')) {

            /**
             * Upload file to public folder
             */
            
            $uploadPath = storage_path('app/public/ImageSpots/');
            $file = $request->file('image');
            $uploadFile = $file->hashName();
            $file->move('upload/spots/', $uploadFile);
            $spot->image = $uploadFile;

            /**
             * Upload file image to storage
             */
            // $file = $request->file('image');
            // $file->storeAs('public/ImageSpots',$file->hashName());
            // $spot->image = $file->hashName();
        }

        $spot->id_user = $request->id_user;
        $spot->id_desa = $request->id_desa;
        $spot->nama_umkm = $request->nama_umkm;
        $spot->slug = Str::slug($request->nama_umkm, '-');
        $spot->deskripsi = $request->deskripsi;
        $spot->koordinat = $request->koordinat;
        $spot->save();

        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        $userMa = auth()->user();

        if ($userMa->hasRole('Master Admin')) {
            return redirect()->route('Master Adminspot.index');
        } else if ($userMa->hasRole('Admin')) {
            return redirect()->route('Adminspot.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $desa = Desa::all();

        $idUser = User::whereHas('roles', function ($query) {
            $query->where('name', 'Umkm');
        })->get();

        // bukan cp karna data yang di save kamukan di lokasiumkm coy
        $lokasiUmkm = LokasiUmkm::find($id);
        $userMa = auth()->user();

        if ($userMa->hasRole('Master Admin')) {
            return view('masterAdmin.spot.edit', compact('desa', 'lokasiUmkm', 'idUser'));
        } else if ($userMa->hasRole('Admin')) {
            return view('admin.spot.edit', compact('desa', 'lokasiUmkm', 'idUser'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_user' => 'required|exists:users,id',
            'nama_umkm' => 'required|string|max:255',
            'koordinat' => 'required',
            'deskripsi' => 'required|string|min:10|max:1000',
            'image' => 'file|image|mimes:png,jpg,jpeg',
            'id_desa' => 'required|exists:desas,id',
        ]);

        // $spot = new LokasiUmkm;
        $spot = LokasiUmkm::findOrFail($id);

        if ($request->hasFile('image')) {
            $uploadPath = storage_path('app/public/ImageSpots/');
            $file = $request->file('image');
            $uploadFile = $file->hashName();
            $file->move('upload/spots/', $uploadFile);
            $spot->image = $uploadFile;
        }

        $spot->id_user = $request->id_user;
        $spot->nama_umkm = $request->nama_umkm;
        $spot->slug = Str::slug($request->nama_umkm, '-');
        $spot->deskripsi = $request->deskripsi;
        $spot->koordinat = $request->koordinat;
        $spot->id_desa = $request->id_desa;
        $spot->save();

        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        $userMa = auth()->user();

        if ($userMa->hasRole('Master Admin')) {
            return redirect()->route('Master Adminspot.index');
        } else if ($userMa->hasRole('Admin')) {
            return redirect()->route('Adminspot.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lk = LokasiUmkm::findOrFail($id);
        
        $lk->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        $userMa = auth()->user();

        if ($userMa->hasRole('Master Admin')) {
            return redirect()->route('Master Adminspot.index')->with('success', 'User deleted successfully.');
        } else if ($userMa->hasRole('Admin')) {
            return redirect()->route('Adminspot.index')->with('success', 'User deleted successfully.');
        }
    }
}
