@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Table Pengguna</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                <form action="{{ route('Master Adminuser.update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data"> {{-- //postnya badag! --}}
                                    @csrf
                                    @method('PUT')
                                    <tr>
                                        {{-- daftar pengguna --}}
                                        <div class="d-flex px-2 py-1 justify-content-center">
                                            <div class="row w-100">
                                                {{-- nama --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label
                                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan
                                                            Username</label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" value="{{ $user->name }}" disabled>
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
                                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan
                                                            Email</label>
                                                        <input type="text"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" value="{{ $user->email }}" disabled>
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
                                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Masukkan
                                                            Password</label>
                                                        <input type="text"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" placeholder="(Opsional)" disabled>
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
                                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pilih
                                                            Role</label>
                                                        <input type="text"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" value="{{ $user->getRoleNames()->first() }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-1">
                                            <a href="{{ route('Adminuser.index') }}" class="btn btn-danger">
                                                <i class="fa fa-sharp fa-light fa-arrow-left"></i> Kembali
                                            </a>
                                        </div>
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
