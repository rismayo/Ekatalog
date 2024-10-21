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
            <a href="{{ url('/umkm/crudumkm') }}" class="btn btn-primary">+ Tambah Data</a>
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
                    <tr class="text-center align-middle">
                        <td>1</td>
                        <td>Dina Catring</td>
                        <td>dina@gmail.com</td>
                        <td>Magetam</td>
                        <td>0853425262</td>
                        <td>
                            <a href="{{ url('/produk/edit/1') }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ url('/produk/delete/1') }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Del</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- AKHIR DATA -->
</main>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
@endpush
@endsection
