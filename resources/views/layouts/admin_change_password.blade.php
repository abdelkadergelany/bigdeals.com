<!DOCTYPE html>
<html>
<head>
<title>Admin/password </title>
@include('layouts/partials/_linkedfiles')
 <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
<div class="wrapper">
@include('layouts/partials/_admin_sidebar')
<div id="content">
@include('layouts/partials/_admin_navbar')

@include('layouts/partials/_change_password')

</div>

</div>
@include('layouts/partials/_admin_footer')
</body>
</html>