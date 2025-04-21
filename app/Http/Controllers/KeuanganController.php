<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Keuangan;
use App\Models\BuktiTransaksi;

use Alert;

class KeuanganController extends Controller
{
    public function index()
    {
        $title = 'Daftar Keuangan';
        $uang = Keuangan::where('id_umkm', auth()->id())->latest()->get();
        
        return view('umkm.keuangan.index', compact('uang', 'title'));
    }
    
    public function menu(Request $request)
    {
        $title = 'Status Keuangan';
        $filter = $request->input('filter', 'Semua');
        $query = Keuangan::with('user')->latest();

        if ($filter != 'Semua') {
            $query->where('status_verifikasi', $filter);
        }
    
        $uang = $query->get();
        $uangNotification = Keuangan::where('status_verifikasi', 'Menunggu')->get();
        // dd($uang);

        // output
        $user = auth()->user();

        if ($user->hasRole('Master Admin')) {
            return view('masterAdmin.keuangan.menu', compact('uang', 'uangNotification', 'title', 'filter'));
        } else if ($user->hasRole('Admin')) {
            return view('admin.keuangan.menu', compact('uang', 'uangNotification', 'title', 'filter'));
        }
    }

    //untuk menghitung jumlah notif yang status menunggu
    public function getNotifications()
    {
        $uangNotification = Keuangan::where('status_verifikasi', 'Menunggu')->count();

        return response()->json([
            'uangCount' => $uangNotification,
        ]);
    }

    public function create()
    {
        $title = 'Tambahkan Keuangan';
        return view('umkm.keuangan.create', compact('title'));
    }

    public function show($id)
    {
        $title = 'Status Keuangan';
        $uang = Keuangan::with('buktiTransaksi')->findOrFail($id);

        // output
        $user = auth()->user();

        if ($user->hasRole('Master Admin')) {
            return view('masterAdmin.keuangan.show', compact('uang', 'title'));
        } else if ($user->hasRole('Admin')) {
            return view('admin.keuangan.show', compact('uang', 'title'));
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal' => 'required|date',
            'income' => 'required|numeric|min:0',
            'outcome' => 'required|numeric|min:0',
            'bukti_transaksi' => 'required|max:2048'
        ]);
    
        // Simpan data keuangan
        $uang = new Keuangan;
        $uang->tanggal = $request->tanggal;
        $uang->income = $request->income;
        $uang->outcome = $request->outcome;
        $uang->profit_loss = $request->income - $request->outcome;
        $uang->id_umkm = auth()->id();
    
        $uang->save();

        if ($request->hasFile('bukti_transaksi')) {
            foreach ($request->file('bukti_transaksi') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/bukti_transaksi', $fileName);
                
                BuktiTransaksi::create([
                    'id_keuangan' => $uang->id,
                    'gambar_bukti' => 'storage/bukti_transaksi/' . $fileName,
                ]);
            }
        }
        
    
        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Umkmkeuangan.index')->with('success', 'Data Keuangan dan Bukti Transaksi berhasil di Tambah');
    
    }
    public function destroy($id)
    {
        $uang = Keuangan::findOrFail($id);

        $uang->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->route('Umkmkeuangan.index')->with('success', 'Data Berhasil di Hapus');
    }
    
    public function approve($id)
    {
        $uang = Keuangan::findOrFail($id);
        $uang->status_verifikasi = 'Disetujui';
        $uang->save();

        return redirect()->back()->with('success', 'Status Keuangan Berhasil Disetujui.');
    }

    public function reject($id)
    {
        $uang = Keuangan::findOrFail($id);
        $uang->status_verifikasi = 'Ditolak';
        $uang->save();

        return redirect()->back()->with('success', 'Status Keuangan Berhasil Ditolak.');
    }
}
