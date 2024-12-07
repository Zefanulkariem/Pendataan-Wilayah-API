<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Manajemen Pengguna';
        $user = User::all();
        $userMa = auth()->user();

        if ($userMa->hasRole('Master Admin')) {
            return view('masterAdmin.user.index', compact('user', 'title')); //
        } else if ($userMa->hasRole('Admin')) {
            return view('admin.user.index', compact('user', 'title')); //
        } else if ($userMa->hasRole('Umkm')) {
            return '/umkm';
        } else if ($userMa->hasRole('Investor')) {
            return '/investor';
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambahkan Pengguna';
        $roles = Role::all();
        return view('masterAdmin.user.create', compact('roles', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,',
            'password' => 'required|min:8',
            'role' => 'required',
            'gender' => 'required|in:pria,wanita,lainnya',
            'no_telp' => 'required|numeric|max_digits:12',
            'alamat' => 'required|string|min:10',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        $user->assignRole($request->role);

        $user->save();

        // return response()->json([
        //     'data' => $user,
        //     'success' => true,
        //     'message' => 'user berhasil dibuat',
        // ]);
        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Master Adminuser.index')->with('success', 'Data Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = 'Detail Pengguna';
        $user = User::findOrFail($id);
        return view('masterAdmin.user.show', compact('user', 'title')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Perbarui Data Pengguna';
        $roles = Role::all();
        $user = User::findOrFail($id);
        $userRole = $user->getRoleNames()->first();
        return view('masterAdmin.user.edit', compact('user', 'roles', 'userRole', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'role' => 'required',
            'gender' => 'required|in:pria,wanita,lainnya',
            'no_telp' => 'required|numeric|max_digits:12',
            'alamat' => 'required|string|min:10',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->no_telp = $request->no_telp;
        $user->alamat = $request->alamat;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->syncRoles($request->input('role'));
        $user->save();

        Alert::success('Success Title', "Data Berhasil Di Edit")->autoClose(1000);
        return redirect()->route('Master Adminuser.index')->with('success', 'Data Berhasil Di Ubah');
        // return response()->json([
        //     'data' => $user,
        //     'success' => true,
        //     'message' => 'user berhasil di edit',
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->route('Master Adminuser.index')->with('success', 'Data Berhasil Di Hapus');
    }
}
