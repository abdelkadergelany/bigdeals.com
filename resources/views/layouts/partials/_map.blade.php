
  <div class="container border-green">
    <div class="row">
      <div class="col-lg-7 col-md-4">
        <h1>Welcome to Bigdeals.com - the biggest market in Cameroon !!</h1>
        <br>
        <p>Buy and sell everything from mobile phones to used computers and cars to finding real estate, jobs and more
          in Cameroon!
          <br> at unbeatable prices and near you.<br> <span style="color: red;">choose the Region where the city and
            category and get in 1 second what you are looking for.</span> </p>
        <a href=" {{ route('postadd')}}"><button type="button" class="btn btn-outline-secondary " style="color: white;background-color: #512DA8;">
          <span class="sr-only">Post your add</span>Post your add</button></a>
      </div>
      <div class="col-lg-3 col-md-4">

        <div class="jsmaps-wrapper" id="cameroon-map"></div>
      </div>
      <div class="col-lg-2 col-md-4">
        <ul id="region">

          <li><a style="color: green" id="Adamaoua" href="{{route('displayAds')}}?action=Region&type=one&val=Adamawa">Adamawa</a></li>
          <li><a style="color: green" id="Centre" href="{{route('displayAds')}}?action=Region&type=one&val=Centre">Centre</a></li>
          <li><a style="color: green" id="Est" href="{{route('displayAds')}}?action=Region&type=one&val=East">East</a></li>
          <li> <a style="color: green" id="Extrême-Nord" href="{{route('displayAds')}}?action=Region&type=one&val=Far North">Far North</a></li>
          <li> <a style="color: green" id="Littoral" href="{{route('displayAds')}}?action=Region&type=one&val=Littoral">Littoral</a></li>
          <li><a style="color: green" id="Nord" href="{{route('displayAds')}}?action=Region&type=one&val=North">North</a></li>
          <li><a style="color: green" id="Nord-Ouest" href="{{route('displayAds')}}?action=Region&type=one&val=North West">North West</a></li>
          <li> <a style="color: green" id="Ouest" href="{{route('displayAds')}}?action=Region&type=one&val=West"> West</a></li>
          <li><a style="color: green" id="Sud" href="{{route('displayAds')}}?action=Region&type=one&val=South">South</a></li>
          <li><a style="color: green" id="Sud-Ouest" href="{{route('displayAds')}}?action=Region&type=one&val=South West"> South West</a></li>
        </ul>
      </div>

    </div>
  </div>