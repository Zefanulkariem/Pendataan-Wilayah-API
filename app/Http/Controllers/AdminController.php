<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JenisUmkm;
use App\Models\LokasiUmkm;

use Carbon\Carbon;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Dasbor';
        $jmlUser = User::count();

        $jmlUserBulanLalu = User::whereMonth('created_at', Carbon::now()->subMonth()->month)
                        ->whereYear('created_at', Carbon::now()->subMonth()->year)
                        ->count();

        $persen = 0;

        if ($jmlUserBulanLalu > $persen) {
            $persen = (($jmlUser - $jmlUserBulanLalu) / $jmlUserBulanLalu) * 100;
        } else {
            $persen = 100;
        }

        $jmlUserUmkm = User::role('Umkm')->count();
        $jmlUserInvestor = User::role('Investor')->count();
        $jmlUmkm = LokasiUmkm::count();

        $jenisUmkm = JenisUmkm::withcount('lokasi_Umkm')->inRandomOrder()->take(5)->get();

        $lokasis = LokasiUmkm::with('desa.kecamatan', 'user')
            ->get()
            ->map(function ($lokasi) {
                $koordinat = explode(',', $lokasi->koordinat); // Pisahkan latitude dan longitude
                return [
                    'lat' => $koordinat[0],
                    'lon' => $koordinat[1],
                    'desa' => $lokasi->desa->nama_desa ?? 'Tidak diketahui',
                    'kecamatan' => $lokasi->desa->kecamatan->nama_kecamatan ?? 'Tidak diketahui',
                    'img' => $lokasi->image ? asset('upload/spots/' . $lokasi->image) : 'default_image_url',
                    'nama' => $lokasi->user->name,
                    'kelamin' => $lokasi->user->gender,
                    'namaUMKM' => $lokasi->nama_umkm,
                    'jenisUMKM' => $lokasi->jenisUmkm->jenis_umkm,
                    'link' => $lokasi->link,
                ];
            });
            // dd($lokasis);

        // dd($jenisUmkm);
        return view('admin.index', compact('jmlUser', 'persen', 'jmlUserUmkm', 'jmlUserInvestor', 'jmlUmkm', 'jenisUmkm', 'lokasis', 'title'));
    }

    public function user()
    {
        // dd(auth()->user()->getRoleNames());
        // if (auth()->user()->can('view_dashboard')) {
            // }
        $title = 'Manajemen Pengguna';
        return view('admin.user.index', compact('title')); 

        return abort(403);
    }
    
    public function profile()
    {
        // dd(auth()->user()->getRoleNames());
        // if (auth()->user()->can('view_dashboard')) {
            // }
        $title = 'Profil';
        $user = auth()->user();
        return view('admin.profile.index', compact('user', 'title')); 

        return abort(403);
    }
}
