@extends('layouts.umkm')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    {{-- ini namanya library carbon buat ngatur date --}}
                    <h6>Daftar Marketing ({{ \Carbon\Carbon::now()->locale('id')->translatedFormat('F Y') }})</h6>  
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="d-flex justify-content-start px-4">
                            <a href="{{route('Umkmmarketing.create')}}" class="btn btn-primary">Tambah Daftar Marketing <i class="fa fa-sharp fa-light fa-arrow-right"></i></a>
                        </div>
                        <table id="exampleTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bulan & Tahun
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Target Bulanan
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Target Tahunan
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($market as $data)
                                    <tr>
                                        {{-- nomor urut --}}
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-secondary text-sm">{{ $no++ }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- bulan --}}
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->bulan }}</h6>
                                                    <p class="text-xs text-secondary mb-0">Pada Tahun: <b>{{ $data->tahun }}</b></p>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- target bulan --}}
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->target_bulanan }}</h6>
                                                    {{-- <p class="text-xs text-secondary mb-0">{{ $data->target_tahunan }}</p> --}}
                                                </div>
                                            </div>
                                        </td>
                                        {{-- target tahun --}}
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->target_tahunan }}</h6>
                                                    {{-- <p class="text-xs text-secondary mb-0">{{ $data->target_tahunan }}</p> --}}
                                                </div>
                                            </div>
                                        </td>
                                        {{-- logic --}}
                                        <td class="d-flex justify-content-center">
                                            <form id="delete-form-{{ $data->id }}" action="{{ route('Umkmmarketing.destroy', $data->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                {{-- <a href="{{route('Adminuser.edit', $data->id)}}" class="btn btn-warning">
                                                <i class="ni ni-ruler-pencil"></i>
                                                </a> --}}
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
            title: 'Hapus Data Marketing ini!',
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

{{-- element datatable --}}
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

<script>
    new DataTable('#exampleTable');
</script> --}}
@endsection
