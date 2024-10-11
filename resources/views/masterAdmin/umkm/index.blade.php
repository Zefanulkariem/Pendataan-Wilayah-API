@extends('layouts.masterAdmin')
@section('content')

    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Table Umkm</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <div class="d-flex justify-content-end px-4">
                <a href="{{route('Master Adminumkm.create')}}" class="btn btn-primary">Tambahkan Data</a>
              </div>
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pemilik</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Umkm</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Umkm</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kontak</th>
                    {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th> --}}
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    
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
