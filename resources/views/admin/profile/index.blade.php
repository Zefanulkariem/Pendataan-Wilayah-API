@extends('layouts.admin')
@section('content')

<div class="card shadow-lg mx-4">
    <div class="card-body p-3">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="{{asset('admin/assets/img/user.png')}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
                {{Auth::user()->name}}
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
                {{ Auth::user()->getRoleNames()->first() }}
            </p>
          </div>
        </div>
        <div class="col-lg-2    my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
          <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                  <i class="ni ni-settings-gear-65"></i>
                  <span class="ms-2">Pengaturan</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <h5 class="mb-0">Edit Profil</h5>
              <button class="btn btn-primary btn-sm ms-auto">Simpan</button>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Informasi Pengguna</p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Nama</label>
                  <input class="form-control" type="text" value="{{ $user->name }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Alamat Email</label>
                  <input class="form-control" type="email" value="{{ $user->email }}">
                </div>
              </div>
              {{-- <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">First name</label>
                  <input class="form-control" type="text" value="Jesse">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Last name</label>
                  <input class="form-control" type="text" value="Lucky">
                </div>
              </div> --}}
            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Informasi Kontak</p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Alamat</label>
                  <input class="form-control" type="text" value="Jl. Raya Soreang No.Km 17, Pamekaran, Kec. Soreang, Kabupaten Bandung, Jawa Barat">
                </div>
              </div>
              {{-- <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Kota</label>
                  <input class="form-control" type="text" value="Kab. Bandung">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Negara</label>
                  <input class="form-control" type="text" value="Indonesia" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Kode Pos</label>
                  <input class="form-control" type="text" value="40912">
                </div>
              </div> --}}
            </div>
            {{-- <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Tentang</p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">About me</label>
                  <input class="form-control" type="text" value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.">
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <img src="{{asset('admin/assets/img/bg-profile.jpg')}}" alt="Image placeholder" class="card-img-top">
          <div class="row justify-content-center">
            <div class="col-4 col-lg-4 order-lg-2">
              <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                <a href="javascript:;">
                  <img src="{{asset('admin/assets/img/team-2.jpg')}}" class="rounded-circle img-fluid border-2 border-white">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
            <div class="d-flex justify-content-between">
              <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
              <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
              <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
              <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col">
                <div class="d-flex justify-content-center">
                  <div class="d-grid text-center">
                    <span class="text-lg font-weight-bolder">22</span>
                    <span class="text-sm opacity-8">Friends</span>
                  </div>
                  <div class="d-grid text-center mx-4">
                    <span class="text-lg font-weight-bolder">10</span>
                    <span class="text-sm opacity-8">Photos</span>
                  </div>
                  <div class="d-grid text-center">
                    <span class="text-lg font-weight-bolder">89</span>
                    <span class="text-sm opacity-8">Comments</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center mt-4">
              <h5>
                Mark Davis<span class="font-weight-light">, 35</span>
              </h5>
              <div class="h6 font-weight-300">
                <i class="ni location_pin mr-2"></i>Bucharest, Romania
              </div>
              <div class="h6 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>University of Computer Science
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>

@endsection