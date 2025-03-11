<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use Alert;

class UserAdminController extends Controller
{
    public function index()
    {
        $title = 'Manajemen Pengguna';
        $user = User::all();
        $userMa = auth()->user();
        return view('admin.user.index', compact('user', 'title'));
    }
    public function create()
    {
        $title = 'Tambahkan Pengguna';
        $roles = Role::all();
        return view('admin.user.create', compact('roles', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,',
            'password' => 'required|min:8',
            'role' => 'required',
            'gender' => 'required|in:pria,wanita,lainnya',
            'no_telp' => 'required|numeric|max_digits:12',
            'alamat' => 'required|string|min:10',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        $user->assignRole($request->role);

        // buat email verifikasi
        $user->sendEmailVerificationNotification();

        $user->save();
        Alert::success('Success Title', "Data Berhasil Di Tambah")->autoClose(1000);
        return redirect()->route('Adminuser.index')->with('success', 'Data Berhasil di Tambah');
    }

    public function show($id)
    {
        $title = 'Detail Pengguna';
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user', 'title')); 
    }

    public function edit($id)
    {
        $title = 'Perbarui Data Pengguna';
        $roles = Role::all();
        $user = User::findOrFail($id);
        $userRole = $user->getRoleNames()->first();
        return view('admin.user.edit', compact('user', 'roles', 'userRole', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'role' => 'required',
            'gender' => 'required|in:pria,wanita,lainnya',
            'no_telp' => 'required|numeric|max_digits:12',
            'alamat' => 'required|string|min:10',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->no_telp = $request->no_telp;
        $user->alamat = $request->alamat;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->syncRoles($request->input('role'));
        $user->save();
        Alert::success('Success Title', "Data Berhasil Di Edit")->autoClose(1000);
        return redirect()->route('Adminuser.index')->with('success', 'Data Berhasil di Edit');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        Alert::success('Success Title', "Data Berhasil Di Hapus")->autoClose(1000);
        return redirect()->back()->with('success', 'Data Berhasil di Hapus');
    }
}
