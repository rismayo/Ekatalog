@extends('layouts.superadmin')

@push('styles')
<link href="{{ asset('superadmin/css/style.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/TYkiZhlZB6+fzT" crossorigin="anonymous">
@endpush

@section('content')
<main class="container bg-light mt-3">
    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="" method="get">
                @csrf
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
                + Tambah Data
            </button>
        </div>

        <!-- TABEL PRODUK -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Id UMKM</th>
                        <th>Nama UMKM</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($umkms as $index => $umkm)
                <tr>
                    <td>{{ $index + 1}}</td>   
                    <td>{{ $umkm->nama_umkm }}</td>
                    <td>{{ $umkm->pemilik }}</td>
                    <td>{{ $umkm->alamat_umkm }}</td>
                    <td>{{ $umkm->no_hp }}</td>
                    <td>
                        <a href="{{ route('umkm.edit', $umkm->id_umkm) }}" class="btn btn-warning btn-sm" data-bs-toggle="modal" method= "POST" data-bs-target="#editDataModal" >Edit</a>
                        @csrf
                        @method('POST')
                        <a href="{{ route('umkm.delete', $umkm->id_umkm) }}" method="POST" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Del</a>
                        @csrf
                        @method('DELETE')
                    </td>
                </tr>
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- AKHIR DATA -->

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data UMKM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- FORM TAMBAH DATA -->
                    <form id="addDataForm" action="{{ route('umkm.store') }}" method="POST">
                        @csrf
                        <!-- ID UMKM -->
                        <div class="mb-3 row">
                            <label for="id_umkm" class="col-sm-4 col-form-label">ID UMKM</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name='id_umkm' id="id_umkm" required>
                            </div>
                        </div>
                        <!-- Nama UMKM -->
                        <div class="mb-3 row">
                            <label for="nama_user" class="col-sm-4 col-form-label">Nama UMKM</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_umkm" id="nama_umkm" required>
                            </div>
                        </div>
                        <!-- Nama UMKM -->
                        <div class="mb-3 row">
                            <label for="nama_user" class="col-sm-4 col-form-label">Pemilik</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pemilik" id="pemilik" required>
                            </div>
                        </div>
                       
                        <!-- Alamat -->
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="alamat" id="alamat_umkm" required>
                            </div>
                        </div>
                        <!-- NoHP -->
                        <div class="mb-3 row">
                            <label for="NoHP" class="col-sm-4 col-form-label">Nomor HP</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan nomor HP" required>
                            </div>
                        </div>
                        <!-- Submit Buttons -->
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-default me-2" data-bs-toggle="modal" data-bs-target="#confirmCancelModal">BATAL</button>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </form>
                    <!-- AKHIR FORM -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EDIT Data -->
    <div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Edit Data UMKM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- FORM TAMBAH DATA -->
                    <form id="editDataForm" action="{{ route('umkm.update', $umkm->id_umkm) }}" method="PUT">
                        @csrf
                        <!-- ID UMKM -->
                        <div class="mb-3 row">
                            <label for="id_umkm" class="col-sm-4 col-form-label">ID UMKM</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name='id_umkm' id="id_umkm" value="{{ $umkm->id_umkm }}" required>
                            </div>
                        </div>
                        <!-- Nama UMKM -->
                        <div class="mb-3 row">
                            <label for="nama_user" class="col-sm-4 col-form-label">Nama UMKM</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_umkm" id="nama_umkm" value="{{ $umkm->nama_umkm }}" required>
                            </div>
                        </div>
                        <!-- Nama UMKM -->
                        <div class="mb-3 row">
                            <label for="nama_user" class="col-sm-4 col-form-label">Pemilik</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pemilik" id="pemilik"value="{{ $umkm->pemilik }}" required>
                            </div>
                        </div>
                       
                        <!-- Alamat -->
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $umkm->alamat_umkm }}" required>
                            </div>
                        </div>
                        <!-- NoHP -->
                        <div class="mb-3 row">
                            <label for="NoHP" class="col-sm-4 col-form-label">Nomor HP</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan nomor HP" value="{{ $umkm->no_hp }}" required>
                            </div>
                        </div>
                        <!-- Submit Buttons -->
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-default me-2" data-bs-toggle="modal" data-bs-target="#confirmCancelModal">BATAL</button>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </form>
                    <!-- AKHIR FORM -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Batal -->
    <div class="modal fade" id="confirmCancelModal" tabindex="-1" aria-labelledby="confirmCancelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmCancelModalLabel">Konfirmasi Batal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin membatalkan penambahan data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="resetForm()">Ya, Batalkan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Konfirmasi Batal -->

</main>

<!-- JavaScript untuk Memicu Modal Jika `$showModal` True -->
@if (isset($showModal) && $showModal)
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var editDataModal = new bootstrap.Modal(document.getElementById("tambahDataModal"));
        editDataModal.show();
    });
</script>
@endif

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script>
    function resetForm() {
        document.getElementById('addDataForm').reset();
    }
</script>
@endpush
@endsection
