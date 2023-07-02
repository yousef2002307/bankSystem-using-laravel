<x-main>
    @section('main')
  
    <x-nav :bal="$bal"></x-nav>
  <div class="container">
    <div class="card  w-75 mx-auto">
    <div class="card-header text-center">
      Notification from Bank
    </div>
    <div class="card-body">
      
      @if (count($notify) <= 0)
      <div class='alert alert-info'>Notice box empty</div>
      @else
       @foreach ($notify as $item)
        <div class='alert alert-success'>{{$item->notice}}</div>
       @endforeach
      @endif
      <?php 
      /*
        $array = $con->query("select * from notice where userId = '$_SESSION[userId]' order by date desc");
        if ($array->num_rows > 0)
        {
          while ($row = $array->fetch_assoc())
          {
            echo "<div class='alert alert-success'>$row[notice]</div>";
          }
        }
        else
          echo "<div class='alert alert-info'>Notice box empty</div>";
          */
       ?>
    </div>
    <div class="card-footer text-muted">
     
    </div>
  </div>
  
  </div>
    @endsection
</x-main>