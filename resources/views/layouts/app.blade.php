<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>developeRReminder</title>

    <!-- Include Vite CSS -->
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

  <!-- Custom Styles -->
  <link rel="stylesheet" href="{{asset('/../resources/css/app.css')}}">
  @yield('styles')
</head>
<body>
  @if ( session()->has('success') )
    <h2>{{ session('success') }}</h2>
  @endif

  @yield('content')


</body>
</html>