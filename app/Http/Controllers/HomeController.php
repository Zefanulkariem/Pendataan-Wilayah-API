<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JenisUmkm;
use App\Models\LokasiUmkm;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
// use Illuminate\Support\Facades\Validator;

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

        // $pengguna = DB::table('users')
        //     ->select(DB::raw('MONTHNAME(created_at) as month'), DB::raw('COUNT(*) as total'))
        //     ->groupBy('month')
        //     ->orderBy(DB::raw('MONTH(created_at)'))
        //     ->get();

        // $label = $pengguna->pluck('month');
        // $data = $pengguna->pluck('total');

        // dd($jenisUmkm);
        return view('masterAdmin.index', compact('jmlUser', 'persen', 'jmlUserUmkm', 'jmlUserInvestor', 'jmlUmkm', 'jenisUmkm'));
    }


    public function user()
    {
        // dd(auth()->user()->getRoleNames());
        // if (auth()->user()->can('view_dashboard')) {
            // }
        $user = User::all();
        return view('masterAdmin.user.index', compact('user')); 

        return abort(403);
    }

    public function profile()
    {
        // dd(auth()->user()->getRoleNames());
        // if (auth()->user()->can('view_dashboard')) {
            // }
        return view('masterAdmin.profile.index'); 

        return abort(403);
    }

    public function simple_map()
    {
        // dd(auth()->user()->getRoleNames());
        // if (auth()->user()->can('view_dashboard')) {
            // }
        return view('masterAdmin.spot.index'); 

        return abort(403);
    }

}
