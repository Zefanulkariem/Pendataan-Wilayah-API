@extends('layouts.masterAdmin')
@section('content')

    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Daftar Kepemilikan Umkm</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <div class="d-flex justify-content-end px-4">
                <a href="{{route('Master Adminkepemilikan-umkm.create')}}" class="btn btn-primary">Tambahkan Data</a>
              </div>
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pemilik Umkm</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Desa</th>
                    {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Desa</th> --}}
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($pk as $data)
                    <tr>
                      {{-- nomor urut --}}
                      <td>
                          <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-secondary text-sm">{{$no++}}</h6>
                              </div>
                          </div>
                      </td>
                      {{-- pemilik umkm --}}
                      <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$data->user->name}}</h6>
                                <p class="text-xs text-secondary mb-0">No. Telp: <b>{{$data->kontak}}</b></p>
                              </div>
                            </div>
                          </td>
                          {{-- desa --}}
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$data->desa->nama_desa}}</h6>
                                <p class="text-xs text-secondary mb-0">Kecamatan <b>{{$data->desa->kecamatan->nama_kecamatan}}</b></p>
                              </div>
                            </div>
                          </td>
                          <td class="d-flex justify-content-center">
                            <form id="delete-form-{{ $data->id }}" action="{{ route('Master Adminkepemilikan-umkm.destroy', $data->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <a href="{{route('Master Adminkepemilikan-umkm.edit', $data->id)}}" class="btn btn-warning">
                                <i class="ni ni-ruler-pencil"></i>
                              </a>
                              <button type="button" onclick="confirmDelete({{ $data->id }})" class="btn btn-danger">
                                <i class="fa fa-ban"></i>
                              </button>                    
                            </form>
                          </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- Script SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Hapus Jenis Umkm ini!',
            text: "Apakah kamu yakin ingin menghapusnya?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + userId).submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
              Swal.fire(
                'Dibatalkan',
                'Penghapusan user dibatalkan',
                'error'
              );
            }
        });
    }
</script>

@endsection
