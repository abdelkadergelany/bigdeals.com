<!DOCTYPE html>
<html>
<head>
<title>Admin </title>
@include('layouts/partials/_linkedfiles')
 <link rel="stylesheet" href="{{asset('css/admin.css')}}">
 <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>
<div class="wrapper">
@include('layouts/partials/_admin_sidebar')
<div id="content">
@include('layouts/partials/_admin_navbar')

@yield('contains')

</div>

</div>
@include('layouts/partials/_admin_footer')
</body>
</html>