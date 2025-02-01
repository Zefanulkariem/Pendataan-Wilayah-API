<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Meeting;
use Alert;

class MeetingController extends Controller
{
    public function index()
    {
        $title = 'Daftar Meeting';
        $umkm = User::role('umkm')->get();
        $meeting = Meeting::where('id_investor', auth()->id())->get();
        // dd($umkm);
        return view('investor.meeting.index', compact('umkm', 'meeting', 'title'));
    }
    
    public function menu()
    {
        $title = 'Ajuan Meeting';
        // $umkm = User::role('Umkm')->get();
        $meeting = Meeting::with('user')->latest()->get(); //user umkm
        
        return view('masterAdmin.ajuanMeeting.menu', compact( 'meeting', 'title'));
    }

    public function create()
    {
        $title = 'Tambahkan Jadwal Meeting';
        $umkm = User::role('umkm')->get();
        return view('investor.meeting.create', compact('umkm', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_umkm'        => 'required|exists:users,id',
            'judul'          => 'required|string|max:255',
            'lokasi_meeting' => 'required|string|max:255',
            'tanggal'        => 'required|date',
        ]);

        $meeting = new Meeting;
        $meeting->id_umkm        = $request->id_umkm;
        $meeting->judul          = $request->judul;
        $meeting->lokasi_meeting = $request->lokasi_meeting;
        $meeting->tanggal        = $request->tanggal;
        $meeting->id_investor    = auth()->id();
        $meeting->save();

        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Investoraju-meeting.index')->with('success', 'Data Berhasil di Tambah');
    }

    public function show(string $id)
    {
        $title = 'Ajuan Meeting';
        $meeting = Meeting::with('user')->findOrFail($id);
        
        return view('masterAdmin.ajuanMeeting.show', compact('meeting', 'title'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $meeting = Meeting::findOrFail($id);

        $meeting->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->route('Investormeeting.index')->with('success', 'Data Berhasil di Hapus');
    }
}
