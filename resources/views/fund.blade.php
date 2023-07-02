<x-main>
    @section('main')
  
    <x-nav :bal="$bal"></x-nav>




  <div class="container">
    <div class="card  w-75 mx-auto">
    <div class="card-header text-center">
      Funds Transfer
    </div>
    <div class="card-body ajax-full">
        
            <div class="alert alert-success w-50 mx-auto">
              <h5>New Transfer</h5>
              <input type="text" name="otherNo" class="form-control " placeholder="Enter Receiver Account number" required>
              <button  name="get" class="btn btn-primary btn-bloc btn1 btn-sm my-1">Get Account Info</button>
             
            </div>
            <div class="alerting">
              {{  session('message') }}
            </div>
          
       
      <br>
     
      @foreach ($trans as $row)
      <div class='alert alert-warning'>Transfer have been made for  {{$row->debit}} from your account at {{$row->date}} in  account no.{{$row->other}}</div>
      @endforeach
    </div>

    <div class="card-footer text-muted">
    
    </div>
  </div>
  
  </div>













    @endsection
</x-main>