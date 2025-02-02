@extends('layouts.umkm')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Data Keuangan{{-- ({{ \Carbon\Carbon::now()->locale('id')->translatedFormat('F Y') }})--}}</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive p-5 pt-0">
                        <div class="d-flex justify-content-start p-0">
                            <a href="{{ route('Umkmkeuangan.create') }}" class="btn btn-primary">Tambah Daftar Keuangan <i
                                    class="fa fa-sharp fa-light fa-arrow-right"></i></a>
                        </div>
                        <table id="myTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Input</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pemasukkan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengeluaran</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keuntungan/Kerugian</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Verifikasi</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($uang as $data)
                                    <tr>
                                        <td>
                                            <div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-secondary text-sm">{{ $no++ }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->tanggal }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Rp
                                                        {{ number_format($data->income, 0, ',', '.') }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Rp
                                                        {{ number_format($data->outcome, 0, ',', '.') }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- kolom profit/loss --}}
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        Rp {{ number_format($data->income - $data->outcome, 0, ',', '.') }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="color: black;">
                                            @if ($data->status_verifikasi === 'Disetujui')
                                                <span class="badge bg-info text-dark" style="font-weight: bold;">
                                                    Diterima </span>
                                            @elseif ($data->status_verifikasi === 'Ditolak')
                                                <span class="badge bg-danger text-white" style="font-weight: bold;">
                                                    Ditolak </span>
                                            @else
                                                <span class="badge bg-dark text-white" style="font-weight: 600;">
                                                    Menunggu Konfirmasi </span>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <form id="delete-form-{{ $data->id }}"
                                                action="{{ route('Umkmkeuangan.destroy', $data->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
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

<!-- Script SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Hapus Data Keuangan ini!',
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