<?php

namespace App\Http\Controllers;

use App\Models\Centre_Point;
use Illuminate\Http\Request;

use Alert;

class CentrePointController extends Controller
{
    public function index()
    {
        $title = 'Penempatan Center Point Lokasi Umkm';
        $cp = Centre_Point::all();
        return view('masterAdmin.CentrePoint.index', compact('cp', 'title'));
    }
    
    public function create()
    {
        $title = 'Penempatan Center Point Lokasi Umkm';
        return view('masterAdmin.CentrePoint.create', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'koordinat' => 'required'
        ]);

        $centerPoint = new Centre_Point;
        $centerPoint->koordinat = $request->koordinat;
        $centerPoint->save();

        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return to_route('Master Admincentre-point.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Centre_Point $centrePoint)
    {
        $centrePoint = Centre_Point::findOrFail($centrePoint->id);
        return view('masterAdmin.CentrePoint.edit', ['centrePoint' => $centrePoint]);
    }
    
    public function update(Request $request, Centre_Point $centrePoint)
    {
        $centrePoint = Centre_Point::findOrFail($centrePoint->id);
        $centrePoint->koordinat = $request->koordinat;
        $centrePoint->update();

        Alert::success('Success Title', "Data Berhasil Di Update")->autoClose(1000);
        return to_route('Master Admincentre-point.index');
    }
    
    public function destroy(string $id)
    {
        $centrePoint = Centre_Point::findOrFail($id);
        $centrePoint->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->back();
    }
}
