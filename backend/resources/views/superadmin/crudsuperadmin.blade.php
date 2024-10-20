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
            <!-- ID User -->
            <div class="mb-3 row">
                <label for="id_user" class="col-sm-2 col-form-label">ID User</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='id_user' id="id_user">
                </div>
            </div>

            <!-- ID UMKM -->
            <div class="mb-3 row">
                <label for="id_umkm" class="col-sm-2 col-form-label">ID UMKM</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='id_umkm' id="id_umkm">
                </div>
            </div>

            <!-- Nama User -->
            <div class="mb-3 row">
                <label for="nama_user" class="col-sm-2 col-form-label">Nama User</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_user' id="nama_user">
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name='email' id="email">
                </div>
            </div>

            <!-- Password -->
            <div class="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name='password' id="password">
                </div>
            </div>

            <!-- Level (Admin/Superadmin) -->
            <div class="mb-3 row">
                <label for="level" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                    <select class="form-select" name="level" id="level">
                        <option value="admin">Admin</option>
                        <option value="superadmin">Superadmin</option>
                    </select>
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