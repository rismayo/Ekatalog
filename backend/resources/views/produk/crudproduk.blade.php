@extends('layouts.superadmin')

<link href="{{asset('superadmin/css/style.css')}}" rel="stylesheet">

@section('content')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Data Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <main class="container">
       <!-- START FORM --> 
       <form action='' method='post'>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">Id Produk</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='nim' id="nim">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Id User</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Id Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jurusan' id="jurusan">
                </div>
            </div>
            <div class="mb-3 row">
              <label for="jurusan" class="col-sm-2 col-form-label">Id UMKM</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name='jurusan' id="jurusan">
              </div>
          </div>
          <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jurusan' id="jurusan">
            </div>
        </div>
        <div class="mb-3 row">
          <label for="jurusan" class="col-sm-2 col-form-label">Deskripsi Produk</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name='jurusan' id="jurusan">
          </div>
      </div>
      <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Harga Produk</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='jurusan' id="jurusan">
        </div>
    </div>
    <div class="mb-3 row">
      <label for="foto_produk" class="col-sm-2 col-form-label">Foto Produk</label>
      <div class="col-sm-10">
          <input type="file" class="form-control" name='foto_produk' id="foto_produk" accept="image/*">
      </div>
  </div>

    <!-- Status (Aktif/Tidak Aktif) -->
    <div class="mb-3 row">
      <label for="status" class="col-sm-2 col-form-label">Status</label>
      <div class="col-sm-10">
          <select class="form-select" name="status" id="status">
              <option value="aktif">Aktif</option>
              <option value="tidak_aktif">Tidak Aktif</option>
          </select>
      </div>
  </div>
  
<!-- Submit Button -->
<div class="mb-3 row">
  <label for="jurusan" class="col-sm-2 col-form-label"></label>
  <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
</div>
          </form>
        </div>
        <!-- AKHIR FORM -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>

@endsection