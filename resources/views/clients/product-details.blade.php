@extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<!-- <link rel="stylesheet" href="{{asset('css/chat.css')}}"> -->
<link rel="stylesheet" href="{{asset('css/latest-product.css')}}">
@stop
@section('contains')

<!-- mon produit debut -->

<div class="container container_produit">
  <div class="card">
    <div class="card-body">
      <div class="row row_produit">
        <div class="col-md-1"></div>
        <div class="col-md-6">
          <h2 style="text-align:center;text-transform: uppercase;">{{$ads->title}}</h2>
          <p style="text-align:center;"> <span>For sale by</span><span style="text-transform: uppercase;font-weight: bold;color: green;"> {{returnName($ads->userId)}} </span> <span> {{$ads->created_at}} 
          </span></p>


          @if($ads->pict1 != null)
          <div class="mySlides_produit">
            <img class="img_produits"  src="publication/{{$ads->pict1}}" alt="" style="width:100%;">
          </div>
          @endif
          @if($ads->pict2 != null)
          <div class="mySlides_produit">
            <img class="img_produits"  src="publication/{{$ads->pict2}}" alt="" style="width:100% ;">
          </div>
          @endif
          @if($ads->pict3 != null)
          <div class="mySlides_produit">
            <img class="img_produits"  src="publication/{{$ads->pict3}}" alt="" style="width:100% ">
          </div>
          @endif
          @if($ads->pict4 != null)
          <div class="mySlides_produit">
            <img class="img_produits"  src="publication/{{$ads->pict4}}" alt="" style="width:100% ">
          </div>
          @endif
          @if($ads->pict5 != null)
          <div class="mySlides_produit">
            <img class="img_produits"  src="publication/{{$ads->pict5}}" alt="" style="width:100% ">
          </div>
          @endif

          <a class="prev" onclick="plusSlides(-1)">❮</a>
          <a class="next" onclick="plusSlides(1)">❯</a>



          <div class="row row_produit">
           @if($ads->pict1 != null)
           <div class="column_produit">
            <img class="demo_produit cursor_produit img_produit"  src="publication/{{$ads->pict1}}"
            style="width:100%;" onclick="currentSlide(1)">
          </div>
          @endif

          @if($ads->pict2 != null)

          <div class="column_produit">
            <img class="demo_produit cursor_produit img_produit"  src="publication/{{$ads->pict2}}"
            style="width:100% " onclick="currentSlide(2)">
          </div>
          @endif
          @if($ads->pict3 != null)
          <div class="column_produit">
            <img class="demo_produit cursor_produit img_produit" src="publication/{{$ads->pict3}}"
            style="width:100% ;" onclick="currentSlide(3)">
          </div>
          @endif
          @if($ads->pict4 != null)
          <div class="column_produit">
            <img class="demo_produit cursor_produit img_produit" src="publication/{{$ads->pict4}}"
            style="width:100% ;" onclick="currentSlide(4)">
          </div>
          @endif
          @if($ads->pict5 != null)
          <div class="column_produit">
            <img class="demo_produit cursor_produit img_produit" src="publication/{{$ads->pict5}}"
            style="width:100% ;" onclick="currentSlide(4)">
          </div>
          @endif

        </div><br><hr>
        <p><pre>{{$ads->description}}</pre></p>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-4"><br><br><br><br>
        <hr>

        <span class="tag_price_product">{{$ads->price}} tk </span>
        <span><em>
         @if($ads->negociable =="1")
         <span class="alert-dark">Negociable</span> 
         @else
         <span class="alert-dark">Fixed Price</span>
         @endif

       </em></span>
       <hr>
       <span><b>condition:</b></span>
       <span>
        @if($ads->isUsed =="1")
        <span class="alert-dark">Used</span> 
        @else
        <span class="alert-dark">New</span>
        @endif
        And
      </span> 
      @if($ads->authenticity =="1")
      <span class="alert-dark">Original</span> 
      @else
      <span class="alert-dark">Refurbished</span>
      @endif

      <hr>
      @if($ads->categoryName == "fashion and clothing")
      <span><b>Size: </b></span><span>{{$ads->size}}</span><hr>
      @endif


      @if($ads->categoryName == 'electronic' || $ads->categoryName =='mobile phones' || $ads->categoryName =='automotive')



      <span><b>Brand: </b></span><span>{{$ads->brand}}</span><hr>
      <span><b>Model: </b></span><span>{{$ads->model}}</span><hr>

      @endif

      <span><b>City: </b></span>
      <span>{{$ads->cityName}}</span>
      <hr>
      <span><b>Address:</b> </span>
      <span>{{$ads->address}}</span>
      <hr>
       @auth
      <div class="like_button">
        <!--  <i class="i_like_button"></i> -->
        <a href="{{ route('addFavorite')}}?id={{$ads->id}}" id="submitFavorite">
         <!--  <i style="color: red;" class="fas fa-heart"></i> -->
        <img src="img/coeur.png" alt="add as favorite" width="20px"  height="20px">
          <span>Save ad as Favorite</span>
        </a>
      </div><div id="feedback"></div>
      <hr>
      <form action="{{ route('rating') }}" method="GET" >
        <input type="hidden" name="_token" id="token-messageF" value="{{csrf_token()}}"> 
        <input type="hidden" name="user" id="user" value="{{$ads->userId}}">     
    
        <div class="rate">
          <input type="radio" id="star5" name="rate" value="5" />
          <label for="star5" title="text">5 stars</label>
          <input type="radio" id="star4" name="rate" value="4" />
          <label for="star4" title="text">4 stars</label>
          <input type="radio" id="star3" name="rate" value="3" />
          <label for="star3" title="text">3 stars</label>
          <input type="radio" id="star2" name="rate" value="2" />
          <label for="star2" title="text">2 stars</label>
          <input type="radio" id="star1" name="rate" value="1" />
          <label for="star1" title="text">1 star</label> 
        </div> <button type="submit" class="btn-sm alert-info" id="rating">Rate</button>
      </form><div id="feedRating"></div>
       @endauth
      <br><hr>

      @if($ads->phone1 != null)
      <img src="img/call_product.png" alt="call_product" width="15%" style="clear: both;">
      <span><b>{{$ads->phone1}}</b></span>
      @endif
      @if($ads->phone2 != null)
      <img src="img/call_product.png" alt="call_product" width="15%" style="clear: both;">
      <span><b>{{$ads->phone2}}</b></span>
      @endif
      @if($ads->phone3 != null)
      <img src="img/call_product.png" alt="call_product" width="15%" style="clear: both;">
      <span><b>{{$ads->phon3}}</b></span>
      @endif


      <hr>
      <a class="fa_product" data-title="Add" data-toggle="modal" data-target="#add" > <img src="img/Chat_product.png" alt="Chat_product"
        width="15%"><span><b>Chat</b></span></a>


       <!--   <button  class="btn btn-success btn-sm" data-title="Add" data-toggle="modal" data-target="#add" ><i class="fas fa-plus-circle"></i>Post new Ads<div class="spinner-grow text-primary"></div></button> -->

        
        <hr>
        <a class="fa_product" href="#"> <img src="img/facebook_product.jpg" alt="facebook_product"
          width="20%"></a>
          <a class="fa_product" href="#"> <img src="img/twitter_product.jpg" alt="twitter_product"
            width="20%"></a>
            <hr><br><br><br>


          </div>


        </div>
      </div>
    </div>

  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" action="{{route('startConversation')}}?recever={{$ads->userId}}">
                        @csrf
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title text-left" >start Conversation with the seller</h4>
                     </div>
                     <div class="modal-body">
                          <div class="form-group">
                              <label for="message"><b>message</b>: </label><br>
                              <textarea class=" form-control" autofocus required="true" cols="30" rows="5" name="message"></textarea>
                        </div>

                      
                     </div>
                     <div class="modal-footer ">
                        <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Send"><span class="glyphicon glyphicon-ok-sign" ></span> 
                     </div>
                     </form>
                  </div> 
               </div>
             
            </div>



<br>
    <div class="card">
      <div class="card-body">
       <h4><b>Similar Product</b></h4><hr>
       <div class="row">


          @forelse ($similar as $sim)
        <div class="col-md-3">
         <a style="text-decoration: none;" href="{{route('product-details')}}?id={{$sim->id}}"><img src="publication/{{$sim->pict1}}" class="mx-auto d-block" width="100%" height="200px"> 
           <h4 style="text-align: center;">{{reduceString($sim->title)}}</h4></a>
           <p class="price_similar_product" style="text-align: center;">TK {{$sim->price}}</p>
         </div>
         @empty
         <div class="alert alert-danger " role="alert">No similar ads found</div>

         @endforelse
    

       </div>
     </div>
   </div>
<br><br>






 </div>


 <!-- mon produit fin -->
 <script type="text/javascript">


  //  <!-- mon produit debut javascript -->
  $(function() {
    $( "i" ).click(function() {
     $( "i" ).toggleClass( "press", 1000 );
   });
  });


  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides_produit");
    var dots = document.getElementsByClassName("demo_produit");
           if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex - 1].style.display = "block";
              dots[slideIndex - 1].className += " active";
         }

        //  <!-- mon produit fin javascript -->


         //start of favorite ajax

        $('#submitFavorite').click(function(e){
         e.preventDefault();

         var  href = $(this).attr("href");

         $.ajax({
          url:href,
          method:"GET",
          data:{},
          success:function(result)
          {

            $('#feedback').html(result);


          }

        })

       });
      //end of favorite ajax

      //start of rating ajax

    $('#rating').click(function(e){
         //
          e.preventDefault();
         var rated = $('#user').val();
          var _token = $('input[name="_token"]').val();
         var val = $("input[name='rate']:checked").val();

          

         $.ajax({
          url:"/rating",
          method:"GET",
          data:{val:val,ratedUser:rated,_token:_token},
          success:function(result)
          {

            $('#feedRating').html(result);


          }

        })

       });

      //end of rating ajax


        

     </script>
     @stop



