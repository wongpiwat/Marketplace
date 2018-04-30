
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
      <h2>Markets</h2>
    </center>
    <table class="table table-hover">
      <thead>
        <tr>
          <th style="width: 50px" scope="col">#</th>
          <th style="width: 200px" scope="col">Name</th>
          <th style="width: 250px" scope="col">Organizer</th>
          <th style="width: 250px" scope="col">Created By</th>
        </tr>
      </thead>
    <tbody>
      @foreach($markets as $market)
        <tr>
          <th scope = "row" >{{ $loop->iteration }}</th>
          <td>{{ $market->name }}</td>
          <td> {{ $market->organizer_name }}</td>
          @foreach($users as $user)
          @if($market->created_by == $user->id)
          <td>{{ $user->first_name }} {{ $user->last_name }}</td>
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
