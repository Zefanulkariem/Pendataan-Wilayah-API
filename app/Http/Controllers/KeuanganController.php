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
        $uang = Keuangan::where('id_umkm', auth()->id())->get();
        
        return view('umkm.keuangan.index', compact('uang', 'title'));
    }
    
    public function menu()
    {
        $title = 'Status Keuangan';
        $uang = Keuangan::with('user')->latest()->get();
        $uangNotification = Keuangan::where('status_verifikasi', 'Menunggu')->get();

        // dd($uang);
        return view('masterAdmin.keuangan.menu', compact('uang', 'uangNotification', 'title'));
    }

    //untuk menghitung jumlah notif yang status menunggu
    public function getNotifications()
    {
        $uangNotification = Keuangan::where('status_verifikasi', 'Menunggu')->count();

        return response()->json([
            'count' => $uangNotification,
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
        $buktiTransaksi = $uang->buktiTransaksi; //jangan lupa atur modelnya dgn id_keuangan

        // dd($buktiTransaksi->pluck('gambar_bukti'));

        return view('masterAdmin.keuangan.show', compact('uang', 'buktiTransaksi', 'title'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal' => 'required|date',
            'income' => 'required|string',
            'outcome' => 'required|string',
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
