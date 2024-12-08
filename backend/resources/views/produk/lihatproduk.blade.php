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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDataModal">+ Tambah Data</button>
        </div>

        <!-- TABEL PRODUK -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>NO</th>
                        <th>Pemilik</th>
                        <th>Kategori</th>
                        <th>UMKM</th>
                        <th>Produk</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $index => $produk)
                <tr class="text-center align-middle">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $produk->id_user }}</td>
                    <td>{{ $produk->kategori->id_kategori }}</td>
                    <td>{{ $produk->id_umkm }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->deskripsi_produk }}</td>
                    <td>{{ $produk->status }}</td>
                    <td>{{ number_format($produk->harga_produk, 0, ',', '.') }}</td>
                    <td>
                        @if ($produk->foto_produk)
                            <img src="{{ asset('storage/' . $produk->foto_produk) }}" alt="Foto Produk" width="50">
                        @else
                            Tidak ada foto
                        @endif
                            <td>
                                <a href="{{ route('produk.edit', $produk->id_produk) }}" class="btn btn-warning btn-sm" data-bs-toggle="modal" method= "POST" data-bs-target="#editProdukModal-{{$produk->id_produk}}" >Edit</a>
                                @csrf 
                                @method('PUT')
                                <!-- Modal Edit Produk -->
                                <div class="modal fade" id="editProdukModal-{{$produk->id_produk}}" tabindex="-1" aria-labelledby="editProdukModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editProdukModalLabel">Edit Data Produk</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editDataForm" action="{{ route('produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row mb-3">
                                                        <div class="col-md-3">
                                                            <label for="id_user" class="form-label">Pemilik</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="id_user" name="id_user" value="{{ $produk->id_produk }}" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row mb-3">
                                                        <div class="col-md-3">
                                                            <label for="id_kategori" class="form-label">Kategori</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="{{ $produk->id_kategori }}" required>
                                                        </div>
                                                    </div>
                                            
                                                    <div class="row mb-3">
                                                        <div class="col-md-3">
                                                            <label for="id_umkm" class="form-label">UMKM</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="id_umkm" name="id_umkm" value="{{ $produk->id_umkm }}" required>
                                                        </div>
                                                    </div>
                                            
                                                    <div class="row mb-3">
                                                        <div class="col-md-3">
                                                            <label for="edit_nama_produk" class="form-label">Nama Produk</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="edit_nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}" required>
                                                        </div>
                                                    </div>
                                            
                                                    <div class="row mb-3">
                                                        <div class="col-md-3">
                                                            <label for="edit_deskripsi_produk" class="form-label">Deskripsi Produk</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="edit_deskripsi_produk" name="deskripsi_produk" value="{{ $produk->deskripsi_produk }}" required>
                                                        </div>
                                                    </div>
                                            
                                                    <div class="row mb-3">
                                                        <div class="col-md-3">
                                                            <label for="edit_harga_produk" class="form-label">Harga Produk</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="edit_harga_produk" name="harga_produk" value="{{ $produk->harga_produk }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <div class="col-md-3">
                                                            <label for="foto_produk" class="form-label">Foto Produk</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control" name="foto_produk" id="foto_produk" accept="image/*" value="{{ $produk->foto_produk }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-3">
                                                            <label for="edit_status" class="form-label">Status</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <select class="form-select" id="edit_status" name="status" value="{{ $produk->status }}" required>
                                                                <option value="aktif">Aktif</option>
                                                                <option value="tidakaktif">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" class="btn btn-default me-2" data-bs-toggle="modal" data-bs-target="#confirmCancelModal">BATAL</button>
                                                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('produk.destroy', $produk->id_produk) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Del</button>
                                </form>
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
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addDataForm" action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="id_user" class="col-sm-4 col-form-label">Pemilik</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_user" id="id_user">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="id_kategori" class="col-sm-4 col-form-label">Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_kategori" id="id_kategori">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="id_umkm" class="col-sm-4 col-form-label">UMKM</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_umkm" id="id_umkm">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="deskripsi_produk" class="col-sm-4 col-form-label">Deskripsi Produk</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="deskripsi_produk" id="deskripsi_produk">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="harga_produk" class="col-sm-4 col-form-label">Harga Produk</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="harga_produk" id="harga_produk">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="foto_produk" class="col-sm-4 col-form-label">Foto Produk</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="foto_produk" id="foto_produk" accept="image/*">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="status" id="status">
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak_aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <!-- Submit Buttons -->
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-default me-2" data-bs-toggle="modal" data-bs-target="#confirmCancelModal">BATAL</button>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah Data -->
    
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
        var editProdukModal = new bootstrap.Modal(document.getElementById("tambahDataModal"));
        editProdukModal.show();
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
