<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="{{ asset('assets/login-bootstrap.min.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .login-form {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="login-form">
            <h2 class="text-center">Login</h2>
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                        value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                        value="{{ old('password') }}">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                <a href="{{ '/register' }}" class="text-bg-primary" class="m-3">Tidak punya akun?</a>
            </form>
        </div>
    </div>

</body>

</html>
