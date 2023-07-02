<x-main>
    @section('main')
  
    <x-nav :bal="$bal"></x-nav>
<div class="container">
    <div class="card  w-75 mx-auto">
    <div class="card-header text-center">
      Transaction made against you account
    </div>
    <div class="card-body">
        @foreach ($trans as $row)
            @if ($row->action == 'withdraw')
            <div class='alert alert-secondary'>You withdraw Rs.{{$row->debit}} from your account at {{$row->date}}</div>
            @endif
            @if ($row->action == 'deposit')
            <div class='alert alert-success'>You deposit Rs.{{$row->credit}} in your account at {{$row->date}}</div>
            @endif
            @if ($row->action == 'deduction')
            <div class='alert alert-danger'>Deduction have been made for  Rs.{{$row->debit}} from your account at {{$row->date}} in case of {{$row->other}}</div>

            @endif
            @if ($row->action == 'transfer')
            <div class='alert alert-warning'>Transfer have been made for  Rs.{{$row->debit}} from your account at {{$row->date}} in  account no.{{$row->other}}</div> 
            @endif
        @endforeach
    
    </div>
    <div class="card-footer text-muted">
     
    </div>
  </div>
  
  </div>
  @endsection
</x-main>