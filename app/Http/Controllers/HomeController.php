<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JenisUmkm;
use App\Models\LokasiUmkm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Dasbor';

        // panggil & hitung semua jumlah user
        $jmlUser = User::count();

        // panggil & hitung jumlah pengguna umkm
        $jmlUserUmkm = User::role('Umkm')->count();

        // panggil & hitung jumlah investor
        $jmlUserInvestor = User::role('Investor')->count();

        //panggil & hitung jumlah umkm
        $jmlUmkm = LokasiUmkm::count();

        //panggil data jenis umkm 5 buah
        $jenisUmkm = JenisUmkm::withcount('lokasi_Umkm')->inRandomOrder()->take(5)->get();

        //panggil data lokasi umkm
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
        return view('masterAdmin.index', compact('jmlUser', 'jmlUserUmkm', 'jmlUserInvestor', 'jmlUmkm', 'jenisUmkm', 'lokasis', 'title'));
    }


    public function user()
    {
        // dd(auth()->user()->getRoleNames());
        // if (auth()->user()->can('view_dashboard')) {
            // }
        $title = 'Manajemen Pengguna';
        $user = User::all();
        return view('masterAdmin.user.index', compact('user', 'title')); 

        return abort(403);
    }

    public function profile()
    {
        // dd(auth()->user()->getRoleNames());
        // if (auth()->user()->can('view_dashboard')) {
            // }
        $title = 'Profil';
        return view('masterAdmin.profile.index', compact('title')); 

        return abort(403);
    }
    public function editProfile()
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang login
        return view('masterAdmin.profile.edit', compact('user')); // Mengarahkan ke view edit profile
    }

    // Menyimpan perubahan profil
    public function updateProfile(Request $request, $id)
{
    $user = User::findOrFail($id); // Mencari pengguna berdasarkan ID
    
    // Validasi data yang di-submit
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:8|confirmed', // Password opsional
    ]);
    
    // Memperbarui data pengguna
    $user->name = $request->name;
    $user->email = $request->email;

    // Jika password ada, perbarui password
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password); // Meng-hash password
    }

    // Simpan perubahan
    $user->save();
    
    // Redirect ke halaman edit profil dengan pesan sukses
    return redirect()->route('Master Adminprofile.index', ['id' => $user->id])->with('success', 'Profil berhasil diperbarui.');
}

}
