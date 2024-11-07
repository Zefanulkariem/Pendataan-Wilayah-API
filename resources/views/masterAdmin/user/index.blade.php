@extends('layouts.masterAdmin')
@section('content')

    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Table Pengguna</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <div class="d-flex justify-content-end px-4">
                <a href="{{route('Master Adminuser.create')}}" class="btn btn-primary">Tambahkan Data</a>
              </div>
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengguna</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($user as $data)
                    <tr>
                      {{-- nomor urut --}}
                      <td>
                          <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-secondary text-sm">{{$no++}}</h6>
                              </div>
                          </div>
                      </td>
                      {{-- daftar pengguna --}}
                      <td>
                          <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{$data->name}}</h6>
                                  <p class="text-xs text-secondary mb-0">{{$data->email}}</p>
                              </div>
                          </div>
                      </td>
                      {{-- daftar role --}}
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$data->getRoleNames()->first()}}</p>
                      </td>
                      @if(!$data->hasRole('Master Admin'))
                      <td class="d-flex justify-content-center">
                        <form id="delete-form-{{ $data->id }}" action="{{ route('Master Adminuser.destroy', $data->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <a href="{{route('Master Adminuser.edit', $data->id)}}" class="btn btn-warning">
                            <i class="ni ni-ruler-pencil"></i>
                          </a>
                          <button type="button" onclick="confirmDelete({{ $data->id }})" class="btn btn-danger">
                            <i class="fa fa-ban"></i>
                          </button>                    
                        </form>
                      </td>
                      @endif
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
            title: 'Hapus Akun User!',
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
