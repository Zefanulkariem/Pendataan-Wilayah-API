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
    $logs = Logaktivitas::with('user');

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
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        ActivityLogger::log('Tambah User', "User {$user->name} ditambahkan oleh " . auth()->user()->name);
    
        return redirect()->route('Master Adminlogaktivitas.index')->with('success', 'User berhasil ditambahkan');
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
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

    Logaktivitas::log('Edit User', "User {$user->name} diedit oleh " . auth()->user()->name);

    return redirect()->route('Master Adminlogaktivitas.index')->with('success', 'User berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

    Logaktivitas::log('Hapus User', "User {$user->name} dihapus oleh " . auth()->user()->name);

    return redirect()->route('Master Adminlogaktivitas.index')->with('success', 'User berhasil dihapus');
    }
}
