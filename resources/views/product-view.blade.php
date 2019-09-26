@extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/chat.css')}}">
<link rel="stylesheet" href="{{asset('css/latest-product.css')}}">
@stop
@section('contains')

<div class="container ">
  <div class="card">
    <div class="card-body">
      @include('layouts/partials/_searchcontainer')

      <hr>
      <div class="row ">
        <div class="col-md-1"></div>
        <div class="col-md-3">
          @include('layouts/partials/_filter')




          @include('layouts/partials/_categoryFilter')


        </div>

        <div class="col-md-1"></div>

        <div class="col-md-5" id="mother">

         @forelse ($ad as $ads)
         @include('layouts/partials/_ads-container')
         @empty
         <div class="alert alert-danger " role="alert">oops! no ad was found matching your search try again!!!</div>

         @endforelse
         {{ $ad->appends(['action' => $action,'val' => $val])->links() }}

       </div>

     </div>

   </div>
 </div>
</div><br><br>



<script type="text/javascript">  

  $(document).ready(function(){

   $('#search').submit(function(e){

     e.preventDefault();
   //console.log($('#first-disabled').val());

   if($('#first-disabled').val()==''  && $('#second-disabled').val()==''  && $('#inlineFormInputGroup').val()=='')
   {
     console.log('allo aloo');
     return false;

     
   } 

   var city = $('#first-disabled').val();
   var subCat = $('#second-disabled').val();
   var input = $('#inlineFormInputGroup').val();
   console.log(input);

   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"/search",
    method:"GET",
    data:{city:city, subCat:subCat, _token:_token, input:input},
    success:function(result)
    {
      console.log(result);

      if(result=='')
      {
        $('#mother').html("<div class='alert alert-danger' role='alert'>oops! no ad was found matching your search try again!!!</div>");

      }
      else{
       $('#mother').html(result);


       $("a.page-link").click(function(e){

         e.preventDefault();
         console.log( $(this).parent());
         
         $( ".active" ).removeClass( "active");
         $(this).parent().addClass('active');
         var  href = $(this).attr("href");
         pagination(this.innerHTML,href);




       });
     }

   }

 })

 });




   $('#filter').submit(function(e){

     e.preventDefault();
   //console.log($('#first-disabled').val());

// var city = $('#cityFilter').val();
//    var subCat = $('#subCatFilter').val();
//    var input = $('#inputFilter').val();

var action="";
var city = $('#first-disabled').val();
var subCat = $('#second-disabled').val();
var input = $('#inlineFormInputGroup').val();

if(city==''  && subCat==''  && input=='')
{

 return false;


} 

action = getAction(city,subCat,input);

var min =$('#min').val();
var max =$('#max').val();
console.log(min);

if(min=="" && max=="")
{

  return false;
}


if(min=="" && max!="")
{
  min=1;

}

if(min!="" && max=="")
{
  max= 999999999;

}


var _token = $('#token-messageF').val();

var type ="minmax";
$.ajax({
  url:"/filter",
  method:"GET",
  data:{action:action, type:"minmax", min:min, max:max,city:city,subCat:subCat,input:input},
  success:function(result)
  {
    console.log(result);

    if(result=='')
    {
      $('#mother').html("<div class='alert alert-danger' role='alert'>oops! no ad was found matching your search try again!!!</div>");

    }
    else{
     $('#mother').html(result);


     $("a.page-link").click(function(e){

       e.preventDefault();
       console.log( $(this).parent());

       $( ".active" ).removeClass( "active");
       $(this).parent().addClass('active');
       var  href = $(this).attr("href");
       paginationFilter(this.innerHTML,href,min,max,type,action);




     });
   }

 }

})

});





 //nav-links for handling pagination
 function pagination(page,href)

 {
  $.ajax({
    url:href,
    method:"GET",
    data:{},
    success:function(result)
    {
      console.log(result);

      if(result=='')
      {
        $('#mother').html("<div class='alert alert-danger' role='alert'>oops! no ad was found matching your search try again!!!</div>");

      }
      else{
       $('#mother').html(result);
       $("a.page-link").click(function(e){

         e.preventDefault();
         console.log( $(this).parent());
         
         $( ".active" ).removeClass( "active");
         $(this).parent().addClass('active');
         var  href = $(this).attr("href");
         pagination(this.innerHTML,href);




       });

     }

   }

 })


}




function paginationFilter(page,href,min,max,type,action)

{
  $.ajax({
    url:href,
    method:"GET",
    data:{min:min,max:max,type:type,action:action},
    success:function(result)
    {
      console.log(result);

      if(result=='')
      {
        $('#mother').html("<div class='alert alert-danger' role='alert'>oops! no ad was found matching your search try again!!!</div>");

      }
      else{
       $('#mother').html(result);
       $("a.page-link").click(function(e){

         e.preventDefault();
         var min =$('#min').val();
         var max =$('#max').val();
         
         $( ".active" ).removeClass( "active");
         $(this).parent().addClass('active');
         var  href = $(this).attr("href");
         paginationFilter(this.innerHTML,href,min,max,"minmax",action);




       });

     }

   }

 })


}





$(".condition").click(function(e){

 var value = this.value;
 var action="";
 var city = $('#first-disabled').val();
 var subCat = $('#second-disabled').val();
 var input = $('#inlineFormInputGroup').val();
 var type ="condition";
 action = getAction(city,subCat,input);
        //console.log( );

        $.ajax({
          url:"/filter",
          method:"GET",
          data:{val:value,type:type,action:action,city:city,subCat:subCat,input:input},
          success:function(result)
          {
            console.log(result);

            if(result=='')
            {
              $('#mother').html("<div class='alert alert-danger' role='alert'>oops! no ad was found matching your search try again!!!</div>");

            }
            else{
             $('#mother').html(result);
             $("a.page-link").click(function(e){

               e.preventDefault();
               

               $( ".active" ).removeClass( "active");
               $(this).parent().addClass('active');
               var  href = $(this).attr("href");
               paginationCondition(href,value,type,action,city,subCat,input);




             });

           }

         }

       })

      });



function paginationCondition(href,value,type,action,city,subCat,input)

{
  $.ajax({
    url:href,
    method:"GET",
    data:{val:value,type:type,action:action,city:city,subCat:subCat,input:input},
    success:function(result)
    {
      console.log(result);

      if(result=='')
      {
        $('#mother').html("<div class='alert alert-danger' role='alert'>oops! no ad was found matching your search try again!!!</div>");

      }
      else{
       $('#mother').html(result);
       $("a.page-link").click(function(e){

         e.preventDefault();
         
         
         $( ".active" ).removeClass( "active");
         $(this).parent().addClass('active');
         var  href = $(this).attr("href");
         paginationCondition(href,value,"condition",action,city,subCat,input);




       });

     }

   }

 })


}






function  getAction(city,subCat,input){


  if(city==''  && subCat==''  && input!='')
  {

    $('#inputFilter').val(input);
    return "001";


  } 
  if(city==''  && subCat!=''  && input=='')
  {

    $('#subCatFilter').val(subCat);
    return "010";


  } 

  if(city==''  && subCat!=''  && input!='')
  {

    $('#subCatFilter').val(subCat);
    $('#inputFilter').val(input);
    return "011";



  } 

  if(city!=''  && subCat==''  && input=='')
  {

    $('#cityFilter').val(city);
        //$('#inputFilter').val(input);
        return "100";



      } 


      if(city!=''  && subCat==''  && input!='')
      {

        $('#cityFilter').val(city);
        $('#inputFilter').val(input);
        return "101";



      } 

      if(city!=''  && subCat!=''  && input=='')
      {

        $('#cityFilter').val(city);
        $('#subCatFilter').val(subCat);
        return "110";



      } 

      if(city!=''  && subCat!=''  && input!='')
      {

        $('#cityFilter').val(city);
        $('#subCatFilter').val(subCat);
        $('#inputFilter').val(input);
        return "111";



      } 


    }




$(".pricing").click(function(e){

 var value = this.value;
 var action="";
 var city = $('#first-disabled').val();
 var subCat = $('#second-disabled').val();
 var input = $('#inlineFormInputGroup').val();
 var type ="pricing";
 action = getAction(city,subCat,input);
        //console.log( );

        $.ajax({
          url:"/filter",
          method:"GET",
          data:{val:value,type:type,action:action,city:city,subCat:subCat,input:input},
          success:function(result)
          {
            console.log(result);

            if(result=='')
            {
              $('#mother').html("<div class='alert alert-danger' role='alert'>oops! no ad was found matching your search try again!!!</div>");

            }
            else{
             $('#mother').html(result);
             $("a.page-link").click(function(e){

               e.preventDefault();
               

               $( ".active" ).removeClass( "active");
               $(this).parent().addClass('active');
               var  href = $(this).attr("href");
              paginationPricing(href,value,type,action,city,subCat,input);




             });

           }

         }

       })

      });


function paginationPricing(href,value,type,action,city,subCat,input)

{
  $.ajax({
    url:href,
    method:"GET",
    data:{val:value,type:type,action:action,city:city,subCat:subCat,input:input},
    success:function(result)
    {
      console.log(result);

      if(result=='')
      {
        $('#mother').html("<div class='alert alert-danger' role='alert'>oops! no ad was found matching your search try again!!!</div>");

      }
      else{
       $('#mother').html(result);
       $("a.page-link").click(function(e){

         e.preventDefault();
         
         
         $( ".active" ).removeClass( "active");
         $(this).parent().addClass('active');
         var  href = $(this).attr("href");
         paginationPricing(href,value,"pricing",action,city,subCat,input);




       });

     }

   }

 })


}




  });

</script>

@stop



