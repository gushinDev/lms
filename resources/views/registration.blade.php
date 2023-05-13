<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                    <form>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group mt-3 mb-2">
                            <label for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control" id="password-confirm">
                        </div>
                        <a href="{{route('login')}}">Already have an account? Log in</a>
                        <button type="submit" class="btn btn-primary w-100 mt-3">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
