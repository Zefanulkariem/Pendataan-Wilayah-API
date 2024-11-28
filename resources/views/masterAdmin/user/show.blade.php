@extends('layouts.masterAdmin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Data Pengguna</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                <form action="{{ route('Adminuser.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <tr>
                                        {{-- daftar pengguna --}}
                                        <td>
                                            <div class="d-flex px-5 py-1">
                                                <div class="row w-100">
                                                    {{-- nama --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama
                                                                Pengguna</label>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" aria-label="Masukkan Nama"
                                                                value="{{ $user->name }}" readonly>
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- email --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Alamat
                                                                Email</label>
                                                            <input type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" aria-label="Masukkan Email"
                                                                value="{{ $user->email }}" readonly>
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- password --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kata
                                                                Sandi</label>
                                                            <input type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" aria-label="Password" value="••••••••"
                                                                readonly>
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- daftar role --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Role</label>
                                                            <input type="text"
                                                                class="form-control @error('role') is-invalid @enderror"
                                                                name="role" aria-label="Role"
                                                                value="{{ $user->getRoleNames()->first() }}"
                                                                readonly="readonly">
                                                        </div>
                                                    </div>
                                                    {{-- gender --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Jenis
                                                                Kelamin:</label>
                                                            <input type="text"
                                                                class="form-control @error('gender') is-invalid @enderror"
                                                                name="gender"
                                                                value="{{ $user->gender ?? 'Tidak ingin memberitahu' }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    {{-- no_telp --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nomor
                                                                Telepon:</label>
                                                            <input type="text"
                                                                class="form-control @error('no_telp') is-invalid @enderror"
                                                                name="no_telp"
                                                                value="{{ $user->no_telp ?? 'Tidak ingin memberitahu' }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    {{-- alamat --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Alamat:</label>
                                                            <textarea readonly class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="7">{{ $user->alamat ?? 'Tidak ingin memberitahu' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-4 py-1">
                                                <a href="{{ route('Master Adminuser.index') }}" class="btn btn-danger">
                                                    <i class="fa fa-sharp fa-light fa-arrow-left"></i> Kembali
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
