@extends('layouts.admin')
@section('content')

    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pengguna</p>
                  <h5 class="font-weight-bolder">
                    {{ $jmlUser }} Pengguna
                  </h5>
                  {{-- <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder">+{{ number_format($persen) }}%</span>
                    sejak bulan lalu
                  </p> --}}
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                  <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Investor</p>
                  <h5 class="font-weight-bolder">
                    {{ $jmlUserInvestor }} Investor
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Pelaku Umkm</p>
                  <h5 class="font-weight-bolder">
                    {{ $jmlUserUmkm }} Pelaku
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                  <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Lokasi Umkm Terdaftar</p>
                  <h5 class="font-weight-bolder">
                    {{ number_format($jmlUmkm) }} Terdaftar
                  </h5>
                  {{-- <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                  </p> --}}
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-7">
        <div class="card">
          <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize">Sales overview</h6>
            <p class="text-sm mb-0">
              <i class="fa fa-arrow-up text-success"></i>
              <span class="font-weight-bold">4% more</span> in 2021
            </p>
          </div>
          <div class="card-body p-3">
            <div class="chart">
              <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
            </div>
          </div>
        </div>
        {{-- <div class="card mt-4">
          <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
              <h6 class="mb-2">Sales by Country</h6>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center ">
              <tbody>
                <tr>
                  <td class="w-30">
                    <div class="d-flex px-2 py-1 align-items-center">
                      <div>
                        <img src="{{asset('admin/assets/img/icons/flags/US.png0')}}" alt="Country flag">
                      </div>
                      <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">Country:</p>
                        <h6 class="text-sm mb-0">United States</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Sales:</p>
                      <h6 class="text-sm mb-0">2500</h6>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Value:</p>
                      <h6 class="text-sm mb-0">$230,900</h6>
                    </div>
                  </td>
                  <td class="align-middle text-sm">
                    <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                      <h6 class="text-sm mb-0">29.9%</h6>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="w-30">
                    <div class="d-flex px-2 py-1 align-items-center">
                      <div>
                        <img src="{{asset('admin/assets/img/icons/flags/DE.png0')}}" alt="Country flag">
                      </div>
                      <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">Country:</p>
                        <h6 class="text-sm mb-0">Germany</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Sales:</p>
                      <h6 class="text-sm mb-0">3.900</h6>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Value:</p>
                      <h6 class="text-sm mb-0">$440,000</h6>
                    </div>
                  </td>
                  <td class="align-middle text-sm">
                    <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                      <h6 class="text-sm mb-0">40.22%</h6>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="w-30">
                    <div class="d-flex px-2 py-1 align-items-center">
                      <div>
                        <img src="{{asset('admin/assets/img/icons/flags/GB.png0')}}" alt="Country flag">
                      </div>
                      <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">Country:</p>
                        <h6 class="text-sm mb-0">Great Britain</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Sales:</p>
                      <h6 class="text-sm mb-0">1.400</h6>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Value:</p>
                      <h6 class="text-sm mb-0">$190,700</h6>
                    </div>
                  </td>
                  <td class="align-middle text-sm">
                    <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                      <h6 class="text-sm mb-0">23.44%</h6>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="w-30">
                    <div class="d-flex px-2 py-1 align-items-center">
                      <div>
                        <img src="{{asset('admin/assets/img/icons/flags/BR.png0')}}" alt="Country flag">
                      </div>
                      <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">Country:</p>
                        <h6 class="text-sm mb-0">Brasil</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Sales:</p>
                      <h6 class="text-sm mb-0">562</h6>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Value:</p>
                      <h6 class="text-sm mb-0">$143,960</h6>
                    </div>
                  </td>
                  <td class="align-middle text-sm">
                    <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                      <h6 class="text-sm mb-0">32.14%</h6>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div> --}}
      </div>
      <div class="col-lg-5">
        <div class="card">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Kategori</h6>
          </div>
          <div class="card-body p-3">
            <ul class="list-group px-3">
              @foreach($jenisUmkm as $data)
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">{{ $data->jenis_umkm }}</h6>
                    <span class="text-xs">{{ $data->lokasi__umkm_count ?? '0' }} <span class="font-weight-bold">Umkm</span></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <a class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto" href="{{ route('Adminspot.index') }}"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>

@endsection