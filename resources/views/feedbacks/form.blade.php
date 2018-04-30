
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Market</title>
    <style>
      body {
          font-family: "Arial, Arial, Helvetica, sans-serif";
      }
    </style>
  </head>
  <body>
    <center>
      <h1>Marketplace</h1>
      <h2>Feedbacks</h2>
    </center>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">User</th>
          <th scope="col">Comment</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
    <tbody>

      @foreach($feedbacks as $feedback)
        <tr>
          <th scope = "row" >{{ $loop->iteration }}</th>
            @foreach($users as $user)
            @if($feedback->created_by == $user->id)
            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            <td>{{ $feedback->comment }}</td>
            <td>{{ $feedback->created_at }}</td>
            @endif
            @endforeach
        </tr>
      @endforeach

    </tbody>
    </table>
    <center>
      <h4>{{ $create_by->first_name }} {{ $create_by->last_name }}</h4>
      <?php
      echo date("Y/m/d");
      ?>
  </center>
  </body>
</html>
