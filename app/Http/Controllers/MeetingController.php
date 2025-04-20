<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Meeting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Events\AktivitasTerjadi;
use Alert;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Daftar Meeting';
        $umkm = User::role('umkm')->get();
        $meeting = Meeting::where('id_investor', auth()->id())->get();
        // dd($umkm);
        return view('investor.meeting.index', compact('umkm', 'meeting', 'title'));
    }

    public function menu(Request $request)
    {
        $title = 'Ajuan Meeting';
        // $umkm = User::role('Umkm')->get();

        // Ambil filter dari request (jika ada), defaultnya adalah semua data
        $filter = $request->input('filter', 'Semua');

        $query = Meeting::with('user')->latest();

        if ($filter != 'Semua') {
            $query->where('status_verifikasi', $filter);
        }
    
        $meeting = $query->get();

        // $meeting = Meeting::with('user')->latest()->get(); //user umkm
        $meetNotification = Meeting::where('status_verifikasi', 'Menunggu')->get();
        // dd($meetNotification);
        
        return view('masterAdmin.pengajuanMeeting.menu', compact('meeting', 'title', 'filter', 'meetNotification'));

    }

    public function menuadmin(Request $request)
    {
        $title = 'Ajuan Meeting';
        // $umkm = User::role('Umkm')->get();

        // Ambil filter dari request (jika ada), defaultnya adalah semua data
        $filter = $request->input('filter', 'Semua');

        $query = Meeting::with('user')->latest();

        if ($filter != 'Semua') {
            $query->where('status_verifikasi', $filter);
        }
    
        $meeting = $query->get();

        // $meeting = Meeting::with('user')->latest()->get(); //user umkm
        $meetNotification = Meeting::where('status_verifikasi', 'Menunggu')->get();
        // dd($meetNotification);
        
        return view('admin.pengajuanmeeting.menu', compact( 'meeting', 'title', 'filter'));
    }

    public function getNotifications()
    {
        $meetNotification = Meeting::where('status_verifikasi', 'Menunggu')->count();

        return response()->json([
            'meetCount' => $meetNotification,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request)
    {
        $title = 'Tambahkan Jadwal Meeting';
        $umkm = User::role('umkm')->get();
        return view('investor.meeting.create', compact('umkm', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'id_umkm' => 'required|exists:users,id',
        'judul' => 'required|string|max:255',
        'lokasi_meeting' => 'required|string|max:255',
        'tanggal' => 'required|date',
    ]);

    $meeting = new Meeting;
    $meeting->id_umkm = $request->id_umkm;
    $meeting->judul = $request->judul;
    $meeting->lokasi_meeting = $request->lokasi_meeting;
    $meeting->tanggal = $request->tanggal;
    $meeting->id_investor = auth()->id();
    $meeting->save();

    // ✅ Catat log aktivitas di sini
    event(new AktivitasTerjadi(
        auth()->id(),
        auth()->user()->getRoleNames()->first(),
        'Mengajukan Meeting',
        'Mengajukan meeting dengan UMKM ID ' . $request->id_umkm
    ));

    Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
    return redirect()->route('Investormeeting.index')->with('success', 'Data Berhasil di Tambah');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Pengajuan Meeting';
        $meeting = Meeting::with('user')->findOrFail($id);
        
        return view('masterAdmin.pengajuanMeeting.show', compact('meeting', 'title'));
    }

    public function showadmin(string $id)
    {
        $title = 'Pengajuan Meeting';   
        $meeting = Meeting::with('user')->findOrFail($id);
        
        return view('admin.pengajuanmeeting.show', compact('meeting', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang login
        return view('investor.meeting.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $meeting = Meeting::findOrFail($id);

        event(new AktivitasTerjadi(
            auth()->id(),
            auth()->user()->getRoleNames()->first(),
            'Menghapus Meeting',
            'Menghapus meeting dengan judul ' . $meeting->judul
        ));

        $meeting->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->route('Investormeeting.index')->with('success', 'Data Berhasil di Hapus');
        
    }

    public function approve($id)
    {
        $meeting = Meeting::findOrFail($id);
        $meeting->status_verifikasi = 'Disetujui';

        event(new AktivitasTerjadi(
            auth()->id(),
            auth()->user()->getRoleNames()->first(),
            'Menyetujui Meeting',
            'Menyetujui meeting dengan judul: ' . $meeting->judul
        ));

        $meeting->save();

        Session::flash('notif_meeting', [
            'status' => 'success',
            'pesan' => 'Pengajuan meeting Anda telah <strong>disetujui</strong> oleh Master Admin.',
        ]);

        return redirect()->back()->with('success', 'Meeting Berhasil Disetujui.');
    }

    public function reject($id)
    {
        $meeting = Meeting::findOrFail($id);
        $meeting->status_verifikasi = 'Ditolak';

        event(new AktivitasTerjadi(
            auth()->id(),
            auth()->user()->getRoleNames()->first(),
            'Menolak Meeting',
            'Menolak meeting dengan judul: ' . $meeting->judul
        ));
        $meeting->save();

    // Notifikasi untuk investor
    Session::flash('notif_meeting', [
        'status' => 'danger',
        'pesan' => 'Pengajuan meeting Anda telah <strong>ditolak</strong> oleh Master Admin.',
    ]);

        return redirect()->back()->with('success', ' Meeting  Berhasil Ditolak.');
    } 
    
}
