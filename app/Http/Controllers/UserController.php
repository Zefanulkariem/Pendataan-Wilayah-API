<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $userMa = auth()->user();

        if ($userMa->hasRole('Master Admin')) {
            return view('masterAdmin.user.index', compact('user')); //
        } else if ($userMa->hasRole('Admin')) {
            return view('admin.user.index', compact('user')); //
        } else if ($userMa->hasRole('Umkm')) {
            return '/umkm';
        } else if ($userMa->hasRole('Investor')) {
            return '/investor';
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('masterAdmin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,',
            'password' => 'required|min:8',
            'role' => 'required',
            'gender' => 'required|in:pria,wanita,lainnya',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
        ]);

        $user->assignRole($request->role);

        $user->save();

        // return response()->json([
        //     'data' => $user,
        //     'success' => true,
        //     'message' => 'user berhasil dibuat',
        // ]);
        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Master Adminuser.index')->with('success', 'User updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        $userRole = $user->getRoleNames()->first();
        return view('masterAdmin.user.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'role' => 'required',
            'gender' => 'required|in:pria,wanita,lainnya',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->syncRoles($request->input('role'));
        $user->save();

        Alert::success('Success Title', "Data Berhasil Di Edit")->autoClose(1000);
        return redirect()->route('Master Adminuser.index')->with('success', 'User updated successfully.');
        // return response()->json([
        //     'data' => $user,
        //     'success' => true,
        //     'message' => 'user berhasil di edit',
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('Master Adminuser.index')->with('success', 'User deleted successfully.');
    }
}
