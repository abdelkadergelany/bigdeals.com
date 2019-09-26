@extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/latest-product.css')}}">

@stop

@section('contains')
@include('layouts/partials/_map')
@include('layouts/partials/_maincategory')



   <div class="container ">
<div class="row">
  <div class="col-md-5"></div>
                  <div class="col-md-2">
                                    <h1><span class="badge badge-secondary"> Latest  Ads </span></h1>

                  </div>

                  <div class="col-md-5"></div>


</div>
        <div class="card">
            <div class="card-body">
                <hr>
                <div class="row ">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                   
                       
                      @include('layouts/partials/_categoryFilter')



                    </div>

                    <div class="col-md-1"></div>

                    <div class="col-md-5">
                          


                              @foreach($ad as $ads)

                       @include('layouts/partials/_ads-container')

                             @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>



<br>

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