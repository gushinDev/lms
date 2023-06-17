<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMS</title>
   @include('components.head-links')
</head>
<body>
<div class="container-fluid">
    <div class="row">
        @include('admin.navigation-panel')
        <main class="col-lg-10">
            @yield('content')
        </main>
    </div>
    @include('admin.tools.pomodoro')
    @include('admin.tools.pomodoro-script')
</div>
</body>
</html>
