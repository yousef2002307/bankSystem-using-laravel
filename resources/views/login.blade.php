<x-main>
    @section('main')
  
    
  
    <h1 class="alert alert-success rounded-0"><small class="float-right text-muted" style="font-size: 12pt;"><kbd>Presented by:Tariq Fareed</kbd></small></h1>
    <br>
    
    <br>
    <div id="accordion" role="tablist" class="w-25 float-right shadowBlack" style="margin-right: 222px">
        <br><h4 class="text-center text-white">Select Your Session</h4>
      <div class="card rounded-0">
        <div class="card-header" role="tab" id="headingOne">
          <h5 class="mb-0">
            <a style="text-decoration: none;" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
             <button class="btn btn-outline-success btn-block">User Login</button>
            </a>
          </h5>
        </div>
    
        <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
           <form method="POST" action={{route("userlogin")}}>
            @csrf
            @method("post")
               <input type="email" value="some@gmail.com" name="email" class="form-control" required placeholder="Enter Email">
               <input type="password" name="password" value="some" class="form-control" required placeholder="Enter Password">
               <button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="userLogin">Enter </button>
           </form>
          </div>
        </div>
      </div>
      <div class="card rounded-0">
        <div class="card-header" role="tab" id="headingTwo">
          <h5 class="mb-0">
            <a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Manager Login
            </a>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
             <form method="POST">
               <input type="email" value="manager@manager.com" name="email" class="form-control" required placeholder="Enter Email">
               <input type="password" name="password" value="manager" class="form-control" required placeholder="Enter Password">
               <button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="managerLogin">Enter </button>
           </form>
          </div>
        </div>
      </div>
      <div class="card rounded-0">
        <div class="card-header" role="tab" id="headingThree">
          <h5 class="mb-0">
            <a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
             Cashier Login
            </a>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
            <form method="POST">
               <input type="email" value="cashier@cashier.com" name="email" class="form-control" required placeholder="Enter Email">
               <input type="password" name="password" value="cashier" class="form-control" required placeholder="Enter Password">
               <button type="submit"  class="btn btn-primary btn-block btn-sm my-1" name="cashierLogin">Enter </button>
           </form>
          </div>
        </div>
      </div>
    </div>
    

    @endsection
</x-main>