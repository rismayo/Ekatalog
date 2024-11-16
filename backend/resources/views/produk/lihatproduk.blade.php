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
                        <th>Id Produk</th>
                        <th>Id User</th>
                        <th>Id Kategori</th>
                        <th>Id UMKM</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi Produk</th>
                        <th>Harga Produk</th>
                        <th>Foto Produk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($produk as $index => $produk)
                <tr class="text-center align-middle">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->id_produk }}</td>
                    <td>{{ $product->id_user }}</td>
                    <td>{{ $product->id_kategori }}</td>
                    <td>{{ $product->id_umkm }}</td>
                    <td>{{ $product->nama_produk }}</td>
                    <td>{{ $product->deskripsi_produk }}</td>
                    <td>{{ number_format($product->harga_produk, 0, ',', '.') }}</td>
                    <td>
                        @if ($product->foto_produk)
                                <img src="{{ asset('storage/' . $product->foto_produk) }}" alt="Foto Produk" width="50">
                            @else
                                Tidak ada foto
                            @endif
                            <td>
                                <a href="{{ route('produk.edit', $product->id_produk) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('produk.destroy', $product->id_produk) }}" method="POST" style="display:inline;">
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
                    <form id="addDataForm" action="{{ route('produk.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="id_produk" class="col-sm-4 col-form-label">Id Produk</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="id_produk" id="id_produk">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="id_user" class="col-sm-4 col-form-label">Id User</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_user" id="id_user">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="id_kategori" class="col-sm-4 col-form-label">Id Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_kategori" id="id_kategori">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="id_umkm" class="col-sm-4 col-form-label">Id UMKM</label>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script>
    function resetForm() {
        document.getElementById('addDataForm').reset();
    }
</script>
@endpush
@endsection
