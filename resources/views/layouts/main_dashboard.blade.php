<!DOCTYPE html>
<html>
<head>
<title>Admin/login </title>
@include('layouts/partials/_linkedfiles')
 <link rel="stylesheet" href="{{asset('css/admin.css')}}">
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