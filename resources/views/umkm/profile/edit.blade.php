@extends('layouts.umkm')

@section('content')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header">
                <h4>Edit Profil</h4>
            </div>
            <div class="card-body">
                {{-- Tampilkan pesan sukses jika ada --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Form edit profil --}}
                <form action="{{ route('Umkmprofile.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Input Nama --}}
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" 
                               value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Input Email --}}
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" 
                               value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Input Password --}}
                    <div class="form-group mb-3">
                        <label for="password">Password Baru (opsional)</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    </div>

                    {{-- Tombol Submit --}}
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
