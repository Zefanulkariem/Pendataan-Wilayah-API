@extends('layouts.masterAdmin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Titik Koordinat Umkm</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive p-5 pt-0">
                        <div class="d-flex justify-content-start p-0">
                            <a href="{{ route('Master Adminspot.create') }}" class="btn btn-primary">Tambah Lokasi Umkm <i class="fa fa-sharp fa-light fa-arrow-right"></i></a>
                        </div>
                        <table id="myTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                        Umkm</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kategori Umkm</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Lokasi Umkm</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Logo Perusahaan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                    {{-- <th class="text-secondary opacity-7"></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($lk as $data)
                                    <tr>
                                        {{-- nomor urut --}}
                                        <td>
                                            <div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-secondary text-sm">{{ $no++ }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- koordinat umkm --}}
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->nama_umkm }}</h6>

                                                    <p class="text-xs text-secondary mb-0">Pemilik:
                                                        <b>{{ $data->user->name }}</b></p>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- koordinat umkm --}}
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->jenisUmkm->jenis_umkm ?? 'Tidak Tersedia'}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- desa umkm --}}
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$data->desa->nama_desa}}</h6>
                                                    <p class="text-xs text-secondary mb-0">Kecamatan <b>{{$data->desa->kecamatan->nama_kecamatan}}</b></p>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- image --}}
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <img src="{{ asset('upload/spots/' . $data->image) }}" width="50" class="img-thumbnail"
                                                        style="border-radius: 50%">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <form id="delete-form-{{ $data->id }}"
                                                action="{{ route('Master Adminspot.destroy', $data->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('Master Adminspot.edit', $data->id) }}"
                                                    class="btn btn-warning">
                                                    <i class="ni ni-ruler-pencil"></i>
                                                </a>
                                                <button type="button" onclick="confirmDelete({{ $data->id }})"
                                                    class="btn btn-danger">
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
@endsection



@push('javascript')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        let table = new DataTable('#myTable');
    </script>

    <script>
        $(function() {
            $('#dataCenterPoint').DataTable({
                processing: true,
                serverSide: true,
                responisve: true,
                lengthChange: true,
                autoWidth: false,
                ajax: '{{ route('centre-point.data') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    }, {
                        data: 'koordinat'
                    },
                    {
                        data: 'action'
                    }
                ]
            })
        })
    </script>

    <!-- Script SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: 'Hapus Set Center Point ini!',
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
@endpush
