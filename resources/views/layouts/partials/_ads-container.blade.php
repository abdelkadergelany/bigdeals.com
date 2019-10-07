   



   @if($ads->buyNow != "3")
    <a href="{{route('product-details')}}?id={{$ads->id}}" class="border_all_categories">
      <div class="row">
        <div class="col-sm-4">
          <img src="publication/{{$ads->pict1}}" class="img-thumbnail" alt="images" width="100"
          height="100">
        </div>
        <div class="col-sm-8">
          <h5><b>{{reduceString($ads->title)}}...(@if($ads->isUsed==0){{"New"}}@else{{"Used"}}@endif)     
         </b></h5>

          <span>{{$ads->subCategoryName}}</span><br>
           <span style="color: #7B1FA2;text-transform: capitalize;">{{$ads->cityName}}&nbsp;&nbsp;</span><span style="text-transform: capitalize;">{{$ads->address}}</span><br>
          <span class="price_all_categories">TK {{$ads->price}}</span>
          
        </div>
      </div>
      <span class="time_all_categories">{{$ads->created_at->diffForHumans()}}</span><br>
    </a><hr>
    @endif

    @if($ads->buyNow =="3")

    <div class="offer offer-info">
          <div class="shape">
            <div class="shape-text">
              VIP             
            </div>
          </div>
          <a href="{{route('product-details')}}?id={{$ads->id}}" class="border_all_categories">
            <div class="offer-content">

              
              <div class="row">
                <div class="col-sm-4">
                  <img src="publication/{{$ads->pict1}}" class="img-thumbnail" alt="images" width="100" height="100">
                                 
                </div>
                <div class="col-sm-8">
                  <h5><b>{{reduceString($ads->title)}}...(@if($ads->isUsed==0){{"New"}}@else{{"Used"}}@endif)     
                  </b></h5>

                  <span>{{$ads->subCategoryName}}</span><br>
                  <span style="color: #7B1FA2;text-transform: capitalize;">{{$ads->cityName}}&nbsp;&nbsp;</span><span style="text-transform: capitalize;">{{$ads->address}}</span><br>
                  <span class="price_all_categories">TK {{$ads->price}}</span>
                  
                </div>
              </div>
              <span class="time_all_categories">{{$ads->created_at->diffForHumans()}}</span><br>
              


            </div>
          </a>
        </div><hr>
    @endif