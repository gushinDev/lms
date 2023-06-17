<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMS</title>
    @include('components.head-links')
</head>
<body class="bg-body-tertiary">
@include('components.header')
<main>
    @yield('content')
</main>
@include('components.scripts')
</body>
</html>

