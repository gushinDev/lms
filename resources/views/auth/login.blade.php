<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="bg-body-tertiary">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                                   name="username"
                                   value="{{ old('username') }}"
                            >
                            @error('username')
                            <div id="usernameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password"
                                   name="password"
                            >
                            <a href="{{route('password.request')}}">Forgot password ?</a>
                        </div>
                        <div class="form-group form-check mt-3 mb-3">
                            <input type="checkbox" class="form-check-input" id="remember-me" name="remember">
                            <label class="form-check-label" for="remember-me">Remember me</label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mb-1" disabled>Login</button>
                        <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                           href="{{route('register.create')}}">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('auth.auth-form-scripts')
</body>
</html>
