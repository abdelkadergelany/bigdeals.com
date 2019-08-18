

$(document).ready(function(){


/*handling phone event*/

$('#span1').click(function(event) {
  /* Act on the event */
  $('#ph2').css({
    display: 'block',
    
  });

});

$('#del1').click(function(event) {
  /* Act on the event */
   $('#phone2').val('');
  $('#ph2').css({
    display: 'none',
    
  });

});

$('#del2').click(function(event) {
  /* Act on the event */
   $('#phone3').val('');
  $('#ph3').css({
    display: 'none',
    
  });

});

$('#span2').click(function(event) {
  /* Act on the event */
  $('#ph3').css({
    display: 'block',
    
  });

});

/* end handling phone event*/



 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
 //console.log('dynamicdependent.fetch');
    

   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"dynamic_dependent/fetch",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
      console.log(result);
     $('#'+dependent).html(result);
     console.log(result);
    

    }

   })
  }
 });

 $('#RegionName').change(function(){
  $('#cityName').val('');
 });

  $('#category').change(function(){
  $('#subCategoryName').val('');
 });

  $('#brandName').change(function(){
  $('#modelName').val('');
 });


  /*edit sub category*/
    $(".buttonEdit").click(function(){
   var tr = $(this).parent().parent().parent();
       
        $("#nameUpdate").val(tr.children().eq(1).text());
        $("#descriptionUpdate").val(tr.children().eq(2).text());
         $("#idUpdate").val(tr.children().eq(0).text());
         $("#descriptionUpdate").val(tr.children().eq(3).text());

  });
    /*end edit sub-category*/

/*client Ui my account*/
$('.counter-count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 5000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

/* end client Ui my account*/





});





