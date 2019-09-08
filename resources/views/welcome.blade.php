@extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop

@section('contains')
@include('layouts/partials/_map')
@include('layouts/partials/_searchcontainer')
@include('layouts/partials/_maincategory')


 <script type="text/javascript">

$(document).ready(function(){
        $(function () {

        $('#cameroon-map').JSMaps({
            map: 'cameroon'
        });

        });
        
        });

    </script>
@stop