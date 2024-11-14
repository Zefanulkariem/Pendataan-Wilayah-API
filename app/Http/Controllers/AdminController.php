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

        // dd($jenisUmkm);
        return view('admin.index', compact('jmlUser', 'persen', 'jmlUserUmkm', 'jmlUserInvestor', 'jmlUmkm', 'jenisUmkm'));
    }

    public function user()
    {
        // dd(auth()->user()->getRoleNames());
        // if (auth()->user()->can('view_dashboard')) {
            // }
        return view('admin.user.index'); 

        return abort(403);
    }
    
    public function profile()
    {
        // dd(auth()->user()->getRoleNames());
        // if (auth()->user()->can('view_dashboard')) {
            // }
        $user = auth()->user();
        return view('admin.profile.index', compact('user')); 

        return abort(403);
    }
}
