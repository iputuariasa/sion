<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="/css/login.css" rel="stylesheet">

  </head>
  <body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form action="/login" method="post" class="py-4 px-4 shadow rounded">
            @csrf
            <img class="mb-4" src="/img/logoSMKTI.png" alt="" width="120px">
  
            <div class="form-floating">
                <input type="text" class="form-control @error('kode_login') is-invalid @enderror" id="inputKode_login" placeholder="kode_login" name="kode_login" value="{{ old('kode_login') }}" required autofocus>
                <label for="inputkode_login">NIS/NIP</label>
                @error('kode_login')
                <div class="invalid-feedback text-start">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary mb-2" type="submit">Login</button>
            <small class="mt-5 mb-3 text-muted">&copy; 2022 Pusat Komputer dan Jaringan SMK TI Bali Global Karangasem</small>
            @if (session()->has('loginError'))
                <div class="alert alert-danger mt-2" role="alert">
                {{ session('loginError') }}
                </div>
            @endif
        </form>
    </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
