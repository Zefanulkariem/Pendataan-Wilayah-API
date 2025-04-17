<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logaktivitas;

class LogAktivitasController extends Controller
{
    public function index()
    {
        // Ambil data log terbaru, relasi ke user
        $logs = Logaktivitas::with('user')->latest()->get();

        return view('masterAdmin.logaktivitas.index', compact('logs'));
    }
}
