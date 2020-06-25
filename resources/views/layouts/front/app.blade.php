<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        var base_url = "{{url('')}}";
    </script>
    <title> Ibuy | @yield('title')</title>
    <meta name="description" content="ibuy Home">
    <link  href="{{asset('front_files')}}/file/ibuy.png" rel="shortcut icon">
    <link  href="{{asset('front_files')}}/css/bootstrap.min.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">    
    <link  href="{{asset('front_files')}}/css/stely.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f339a7c60b.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div class="container">
        <header class="component-header">
        @include('layouts.front._top')
        @yield('content')
        @include('partials._session')
        @include('layouts.front._footer')
    </div>

   
    <!--jav-script-stert-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{asset('front_files')}}/js/peper.js"></script>
    <script src="{{asset('front_files')}}/js/bootstrap.min.js" ></script>
    <script src="{{asset('front_files')}}/js/hieght.js"></script>
    <script src="{{asset('front_files')}}/js/button-link.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
    $(document).ready(function () {
        
        $("#new_pwd").click(function(){
            var current_pwd = $("#current_pwd").val();
            $.ajax({
                type:'get',
                url:base_url+'/admin/check-pwd',
                data:{current_pwd:current_pwd},
                success:function(resp){
                    //alert(resp);
                    if(resp=="false"){
                        $("#chkPwd").html("<font color='red'>The current password is Incorrect</font>");
                    }else if(resp=="true"){
                        $("#chkPwd").html("<font color='green'>The current password is correct</font>");
                    }
                },error:function(){
                    alert("Error");
                }
            });
        });
    });//end of document ready
</script>

<script>
$(document).ready(function(){
 
 var _token = $('input[name="_token"]').val();

 load_data('', _token);

 function load_data(id="", _token)
 {
  $.ajax({
   url:"{{ route('loadmore.load_data') }}",
   method:"POST",
   data:{id:id, _token:_token},
   success:function(data)
   {
    $('#load_more_button').remove();
    $('#post_data').append(data);
   }
  })
 }

 $(document).on('click', '#load_more_button', function(){
  var id = $(this).data('id');
  $('#load_more_button').html('<b><i class="fa fa-spin fa-spinner hidden"></i></b>');
  load_data(id, _token);
 });

});
</script>

<script>
$(document).ready(function(){
 
 var _token = $('input[name="_token"]').val();

 brand_load_data('', _token);

 function brand_load_data(id="", _token)
 {
  $.ajax({
   url:"{{ route('brands.load_data') }}",
   method:"POST",
   data:{id:id, _token:_token},
   success:function(data)
   {
    $('#brand_load_more_button').remove();
    $('#post_brand_data').append(data);
   }
  })
 }

 $(document).on('click', '#brand_load_more_button', function(){
  var id = $(this).data('id');
  $('#brand_load_more_button').html('<b><i class="fa fa-spin fa-spinner hidden"></i></b>');
  brand_load_data(id, _token);
 });

});
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click','.save_and_continue',function() {
      var form_data = $('#contact-form').serialize();
      $.ajax({
        url:'{{ url('contacts') }}',
        dataType:'json',
        type:'post',
        data:form_data,
        beforeSend:function(){
       $('.loading').removeClass('hidden');
      },success:function(data) {
          if (data.status == true) {
            $('.loading').addClass('hidden');
            toastr.success(data.message, data.title);
            document.getElementById("contact-form").reset();
          }
        },error(response){
          var error_li = '';
          $.each(response.responseJSON.errors,function(index,value) {
            error_li +='<li>'+value+'</li>';
          });
          toastr.error(error_li,'Error',{
                  closeButton:true,
                  progressBar:true,
               });
          $('.error_message').removeClass('hidden');
        }
      });
      return false;
    });
  });
</script>
<script>
  // Firefox 64 - 20190102
// If you see wobbly dots spinning very slowly move your mouse around over the overlay to see the real behavior
// Seems to be a quirk/bug specific to codepen...
</script>
</body>
</html>