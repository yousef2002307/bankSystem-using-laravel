<!doctype html>
<html>

<head>

  <title>bankSystem</title>
  <meta charset="UTF-8" />
  <meta name="robots" description='unfollow' />
  <!--عشان تخليه ريسبونسيف ويشتغل الانترننت الاكسبلولر-->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">




    <!--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zen+Antique+Soft&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/animate.css">
    -->

</head>
<!--change the body tage based on url-->

@if (strpos(url()->current(),"/acc") || strpos(url()->current(),"/notify") || strpos(url()->current(),"/feedback"))
  <body style="background:#96D678;background-size: 100%">
  @endif
@if (strpos(url()->current(),"/login"))

<body style="background: url(images/bg-login2.jpg);background-size: 100%">
   
    
@endif
@csrf
 
    @yield('main')

  <!--لازم تخلي لينك ال جيكويري بعد لينكات الجافاسكريبت بتاعة ال بوتستراب-->

  <!-- DO NOT USE SLIM VERSION OF JQUERY -->
  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src='{{asset("js/popper.min.js")}}'></script>
<script src='{{asset("js/bootstrap.min.js")}}'></script>
    <!--
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>

    -->
 <script>
  $(".ajax-full button.btn1").click(function (e) { 
    e.preventDefault();
    
 
    $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
            }
    });
//the above code sends a header with the request containg the crsf token
       $.ajax({
        method: "post",
        url: "{{url('/ajax')}}", // that is blade function to go to specific route
        data : {name:$("input[type='text']").val()}, //the data you sed to index method
        success: function (response) {
          console.log(response)
           if(response.bool === "no"){
            $(".alerting").html(` <div class='alert alert-success w-50 mx-auto'>Account No. ${$("input[type='text']").val()} Does not exist</div>`)
           }else if(response.bool === "ok"){
            $(".alerting").html(` 
            <div class='alert alert-success w-50 mx-auto'>
                  <form method='POST' action="{{url('/ajax2')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                   
                    Account No.
                    <input type='text' value='${response.accountNo}' name='otherNo' class='form-control ' readonly required>
                    Account Holder Name.
                    <input type='text' class='form-control' value='${response.holderName}' readonly required>
                    Account Holder Bank Name.
                    <input type='text' class='form-control' value='${response.bankName}' readonly required>
                    Enter Amount for tranfer.
                    <input type='number' name='amount' class='form-control' min='1' max='${response.balance}' required>
                    <button type='submit' name='transfer' class='btn byn-fund1 btn-primary btn-bloc btn-sm my-1'>Tranfer</button>
                  </form>
                </div>
                `)
           }
        }
       });
      });

 </script>
  

</body>

</html>