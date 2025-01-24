<?php

namespace App\Http\Controllers;

use App\Models\logaktivitas;
use Illuminate\Http\Request;

class LogaktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $logs = Logaktivitas::with('user')->orderBy('tanggal', 'desc')->get();

    return view('masterAdmin.logaktivitas.index', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(logaktivitas $logaktivitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(logaktivitas $logaktivitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, logaktivitas $logaktivitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(logaktivitas $logaktivitas)
    {
        //
    }
}
