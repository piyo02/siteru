<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITERU | Login</title>

    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container-box">
        <div class="login-box">
            <h2>Selamat Datang!!</h2>
            {{-- @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}
            <div class="login-form">
                <form action="/login" method="post">
                    @csrf
                    <div class="group">
                        <label class="label" for="email"><b>Email</b></label>
                        <input type="email" name="email" id="email" placeholder="Masukkan Email.." autofocus required class="invalid">
                    </div>
                    <div class="group mt-2">
                        <label class="label" for="password"><b>Password</b></label>
                        <input type="password" name="password" id="password" placeholder="Masukkan Password..." required>
                    </div>
                    <div class="group">
                        <button type="submit" class="button text-purple"><b>Masuk</b></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="content-box">
            <img src="{{ asset('assets/images/logo.png') }}" width="50rem">
            <p class="text-purple"><b>DINAS PUPR</b></p>
        </div>
    </div>

    @if (session()->has('danger'))
    <script>
        alert('Email atau Password Salah! Login Gagal')
    </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>