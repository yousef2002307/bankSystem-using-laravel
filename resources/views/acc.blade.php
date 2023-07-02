<x-main>
    @section('main')
  
    <x-nav :bal="$bal"></x-nav>
  <div class="container">
    <div class="card  w-75 mx-auto">
    <div class="card-header text-center">
      Your account Information
    </div>
    <div class="card-body">
      <table class="table table-striped table-dark w-75 mx-auto">
    <thead>
      <tr>
        <td scope="col">Account No.</td>
        <th scope="col">{{$val1->accountNo}}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Branch</th>
        <td>{{$val2->branchName}}</td>
      </tr>
      <tr>
        <th scope="row">Branch Code</th>
        <td>{{$val2->branchNo}}</td>
      </tr>
      <tr>
        <th scope="row">Account Type</th>
        <td>{{$val1->accountType}}</td>
      </tr>
      <tr>
        <th scope="row">Account Created</th>
        <td>{{$val1->date}}</td>
      </tr>
    </tbody>
  </table>
        
    </div>
    <div class="card-footer text-muted">
   
    </div>
  </div>
  
  </div>
    @endsection
</x-main>