  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
           <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
          <!--  <i class="d-inline-block  fa fa-building fa-fw"></i> -->
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
       
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">
             <li class="nav-item ">
               <a class="nav-link {{url("/") === url()->current() ? 'active' : ''}}" href="{{route("welcome")}}">Home <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item  ">  <a class="nav-link {{url("/acc") === url()->current() ? 'active' : ''}}" href="{{route("acc")}}">Accounts</a></li>
             <li class="nav-item ">  <a class="nav-link {{url("/accsta") === url()->current() ? 'active' : ''}}" href="{{route("accsta")}}">Account Statements</a></li>
             <li class="nav-item ">  <a class="nav-link {{url("/fund") === url()->current() ? 'active' : ''}}" href="{{route("fund")}}">Funds Transfer</a></li>
             <!-- <li class="nav-item ">  <a class="nav-link" href="profile.php">Profile</a></li> -->
       
       
           </ul>
           <form class="form-inline my-2 my-lg-0">
               <a href="" class="btn btn-outline-success" data-toggle="tooltip" title="Your current Account Balance">Acount Balance : {{isset($bal)?$bal:''}} Rs.</a>  
               <a href="{{route("acc")}}" data-toggle="tooltip" title="Account Summary" class="btn btn-outline-primary mx-1" ><i class="fa fa-book fa-fw"></i></a> 
               <a href="{{route("notify")}}" data-toggle="tooltip" title="View Notice" class="btn btn-outline-primary mx-1" ><i class="fa fa-envelope fa-fw"></i></a> 
               <a href="{{route("feedback")}}" data-toggle="tooltip" title="Help?" class="btn btn-outline-info mx-1" ><i class="fa fa-question fa-fw"></i></a> 
               <a href="{{route("logout")}}" data-toggle="tooltip" title="Logout" class="btn btn-outline-danger mx-1" ><i class="fa fa-sign-out fa-fw"></i></a>    
       </form>
           
         </div>
       </nav><br><br><br>