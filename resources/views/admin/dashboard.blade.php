
@extends('layouts/main_dashboard')
@section('contains')
<h1 class="text-center">DASHBOARD</h1>

<div class="container-fluid" style="font-weight: bold!important;font-size: 24px!important;">
	<div class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="{{ route('manageAds') }}"> <i class="fas fa-3x fa-comment-dollar"></i><br> TOTAL ADS ({{$adsCount}})  </a> </li>
      <li class="bg_lb"> <a href="{{route('inactivatedAds')}}"> <i class="far fa-3x fa-clock"></i><br> NEW ADS({{$newAdCount}})</a> </li>
      <li class="bg_ly"> <a href="{{ route('manageUsers') }}"> <i class="fas fa-3x fa-users"></i><br> TOTAL USERS({{$userCount}}) </a> </li>
      <li class="bg_lo"> <a href="{{ route('manageCategories') }}"> <i class="fas fa-3x fa-list-ul"></i><br> CATEGORIES({{$catCount}})</a> </li>
      <li class="bg_ls"> <a href="{{ route('manageSubCategory') }}"> <i class="fas fa-3x fa-bars"></i><br> SUBCATEGORIES({{$subCatCount}})</a> </li>
      
      <li class="bg_ls"> <a href="{{ route('manageCities') }}"> <i class="fas fa-3x fa-map-marker-alt"></i><br> CITIES({{$cityCount}})</a> </li>
      
      

    </ul>
  </div>
</div>

<div class="container">
 <div class="row">
  <div class="col-md-12">
    <div class="widget-box">
      
      <div class="widget-content" >
        <div class="row-fluid">
          <div class="span9">
            <div class="chart"></div>
          </div>
          <div class="span3">
            <ul class="site-stats">
              <li class="bg_lh"><a href="{{route('vipAds')}}"> <i class="fab fa-vimeo-square"></i> <strong>{{$vipValid}}</strong> <small>VIP ADS</small>
              </a></li>
              <li class="bg_lh"><a href="{{route('vipRequest')}}"> <i class="fas fa-praying-hands"></i> <strong>{{$vipRequestCount}}</strong> <small>VIP REQUEST </small></a></li>
              <li class="bg_lh"><a href="{{route('waitCollection')}}"> <i class="fas fa-dolly"></i> <strong>{{$waitCollectionCount}}</strong> <small>VIP WAITING COLLECTION</small></a></li>
              <li class="bg_lh"><a href="{{route('allorders')}}"><i class="fas fa-shopping-cart"></i> <strong>{{$totalOrderCount}}</strong> <small>Total Orders</small></a></li>
              <li class="bg_lh"><a href="{{route('pendingorder')}}"> <i class="fas  fa-cart-arrow-down"></i> <strong>{{$pendingOrderCount}}</strong> <small>Pending Orders</small></a></li>
              <li class="bg_lh"><a href="{{route('deliveredorder')}}"> <i class="fas fa-shipping-fast"></i> <strong>{{$deliveredOrderCount}}</strong> <small>Delivered Orders</small></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@stop