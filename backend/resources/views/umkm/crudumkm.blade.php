@extends('layouts.superadmin')

<link href="{{asset('superadmin/css/style.css')}}" rel="stylesheet">

@section('content')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Data UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <main class="container">
       <!-- START FORM --> 
       <form action='' method='post'>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <!-- ID UMKM -->
            <div class="mb-3 row">
                <label for="id_umkm" class="col-sm-2 col-form-label">ID UMKM</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='id_umkm' id="id_umkm">
                </div>
            </div>

            <!-- Nama UMKM -->
            <div class="mb-3 row">
                <label for="nama_user" class="col-sm-2 col-form-label">Nama UMKM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_user' id="nama_user">
                </div>
            </div>

            <!-- Pemilik -->
            <div class="mb-3 row">
                <label for="nama_umkm" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_umkm' id="nama_umkm">
                </div>
            </div>

            <!-- Alamat -->
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' id="alamat">
                </div>
            </div>
            <!-- NoHP -->
            <div class="mb-3 row">
                <label for="NoHP" class="col-sm-2 col-form-label">Nomor HP</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name='alamat' id="alamat" placeholder="Masukkan nomor HP" required>
                </div>
            </div>
            <!-- Submit Button -->
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>

@endsection