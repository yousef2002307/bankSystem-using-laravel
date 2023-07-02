<x-main>
    @section('main')
  
    <x-nav></x-nav>
  <div class="container">
    <div class="card  w-75 mx-auto">
    <div class="card-header text-center">
      Help Card
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('feedbackRes')}}">
            @method("post")
            @csrf
            <div class="alert alert-success w-50 mx-auto">
              <h5>Enter your message</h5>
              <textarea class="form-control" name="msg" required placeholder="Write your message"></textarea>
              <button type="submit" name="send" class="btn btn-primary btn-block btn-sm my-1">Send</button>
            </div>
        </form>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <br>
    
      <?php
      /*
      if (isset($_POST['send']))
      {
        if ($con->query("insert into feedback (message,userId) values ('$_POST[msg]','$_SESSION[userId]')")) {
          echo "<div class='alert alert-success'>Successfully send</div>";
        }else
        echo "<div class='alert alert-danger'>Not sent Error is:".$con->error."</div>";
      }
      */
      ?>  
    </div>
    <div class="card-footer text-muted">
   
    </div>
  </div>
  
  </div>
    @endsection
</x-main>