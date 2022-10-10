<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login to Zeus</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');
    </style>
    <link rel="stylesheet" href="{{ asset('css/zeus-app.css') }}">
</head>
<body>
    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
        <form action="{{ route('zeus.auth.login') }}" class="card form-group col-lg-4 p-3" method="post">
            @csrf
            <h3 class="text-center mb-5">Login Form</h3>
            <div class="input-group mb-4 mx-2">
                <span class="input-group-text"><i class="fas fa-at"></i></span>
                <input type="text" required class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="input your email">
            </div>
            <div class="input-group mb-4 mx-2">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" required class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="input your password">
            </div>
            <div class="input-group mb-4 mx-2 justify-content-center">
                <button type="submit" class="btn btn-secondary float-end">Login</button>
            </div>
        </form>
    </div>
</body>
</html>