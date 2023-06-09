<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMS</title>
    @include('components.head-links')
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Registration Form</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('register.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username')is-invalid @enderror" id="username"
                                   name="username"
                                   value="{{ old('username') }}"
                            >
                            @error('username')
                            <div id="usernameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" aria-describedby="emailHelp"
                                   value="{{ old('email') }}">

                            @error('email')
                            <div id="usernameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password">
                            @error('password')
                            <div id="passwordFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3 mb-2">
                            <label for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control" id="password-confirm"
                                   name="password_confirmation">
                        </div>
                        <a href="{{route('login')}}">Already have an account? Log in</a>
                        <button type="submit" class="btn btn-primary w-100 mt-3" disabled>Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('auth.auth-form-scripts')
</body>
</html>
