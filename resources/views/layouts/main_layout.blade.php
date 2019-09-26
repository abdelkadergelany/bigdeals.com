<!DOCTYPE html>
<html>

<head>
  <title>{{$title ?? 'bigdeals.com'}} </title>
@include('layouts/partials/_linkedfiles')
@yield('style')


</head>

<body>


@include('layouts/partials/_header')

@yield('contains')


@include('layouts/partials/_footer')


</body>

</html>