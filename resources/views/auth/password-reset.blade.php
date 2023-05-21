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
                    <h4>Password reset</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('password.email')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email')is-invalid @enderror" id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                            >
                            @error('email')
                            <div id="emailFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mb-1 mt-3 w-100" disabled>Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('auth.auth-form-scripts')
</body>
</html>
