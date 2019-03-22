<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
@include('partials.navigation')
<div class="container">
    @yield('content')
</div>
@include('partials.scripts')
</body>
</html>
