@extends('layouts.superadmin')

@push('styles')
    <link href="{{ asset('superadmin/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
                + Tambah Data
            </button>
        </div>
    <main class="container bg-light mt-3">
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <!-- FORM PENCARIAN -->
            <div class="pb-3">
                <form class="d-flex" action="" method="get">
                    @csrf
                    <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                        placeholder="Masukkan kata kunci" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                </form>
            </div>

            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataModal">
                    + Tambah Data
                </button>
            </div>

        <!-- TABEL PRODUK -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Id User</th>
                        <th>Id UMKM</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($superadmin as $index => $superadmin)
                    <tr class="text-center align-middle">
                        <td>{{ $superadmin->id_user }}</td>
                        <td>{{ $superadmin->id_umkm }}</td>
                        <td>{{ $superadmin->nama_user }}</td>
                        <td>{{ $superadmin->email }}</td>
                        <td>{{ $superadmin->level }}</td>
                        <td>{{ $superadmin->status}}</td>
                        <td>
                            <a href="{{ route('superadmin.edit', $superadmin->id_user) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('superadmin.delete', $superadmin->id_user) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
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
    <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- START FORM --> 
                    <form id="addDataForm" action='{{ route('superadmin.store') }}' method='post' onsubmit="showSuccessModal(event)">
                        @csrf
                        <!-- ID User -->
                        <div class="mb-3 row">
                            <label for="id_user" class="col-sm-4 col-form-label">ID User</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name='id_user' id="id_user" required>
                            </div>
                        </div>

                        <!-- ID UMKM -->
                        <div class="mb-3 row">
                            <label for="id_umkm" class="col-sm-4 col-form-label">ID UMKM</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name='id_umkm' id="id_umkm" required>
                            </div>
                        </div>

                        <!-- Nama User -->
                        <div class="mb-3 row">
                            <label for="nama_user" class="col-sm-4 col-form-label">Nama User</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name='nama_user' id="nama_user" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name='email' id="email" required>
                            </div>
                        </div>

                        <!-- Level (Admin/Superadmin) -->
                        <div class="mb-3 row">
                            <label for="level" class="col-sm-4 col-form-label">Level</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="level" id="level" required>
                                    <option value="admin">Pengelola</option>
                                    <option value="superadmin">Superadmin</option>
                                    <option value="superadmin">Pemilik</option>
                                </select>
                            </div>
                        </div>

                        <!-- Status (Aktif/Tidak Aktif) -->
                        <div class="mb-3 row">
                            <label for="status" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="status" id="status" required>
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
                    <!-- AKHIR FORM -->
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Tambah Data -->

        <!-- Modal Konfirmasi Batal -->
        <div class="modal fade" id="confirmCancelModal" tabindex="-1" aria-labelledby="confirmCancelModalLabel"
            aria-hidden="true">
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
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="resetForm()">Ya,
                            Batalkan</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Konfirmasi Batal -->

        <!-- Modal Berhasil -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Berhasil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Data berhasil disimpan!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Berhasil -->

    </main>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
        <script>
            function showSuccessModal(event) {
                event.preventDefault(); // Mencegah form dari pengiriman secara langsung
                var form = document.getElementById('addDataForm');

                // Submit form data (AJAX atau cara lain tergantung server-side)
                // Lalu tampilkan modal success setelah form berhasil diproses
                form.reset(); // Reset form jika perlu
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            }

            function resetForm() {
                document.getElementById('addDataForm').reset();
            }
        </script>
    @endpush
@endsection
