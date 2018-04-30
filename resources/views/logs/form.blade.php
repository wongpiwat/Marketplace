<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Logs</title>
    <style>
      body {
          font-family: "Arial, Arial, Helvetica, sans-serif";
      }
    </style>
  </head>
  <body>
    <center>
      <h1>Marketplace</h1>
      <h2>Logs</h2>
    </center>
    <table class="table table-hover">
      <thead>
        <tr>
          <th style="width: 25px" scope="col">#</th>
          <th style="width: 160px" scope="col">Date</th>
          <th style="width: 160px" scope="col">User</th>
          <th style="width: 120px" scope="col">Topic</th>
          <th scope="col">Event</th>
        </tr>
      </thead>
    <tbody>
      @foreach($logs as $log)
        <tr>
          <th scope = "row" >{{ $loop->iteration }}</th>
          <td>{{ $log->created_at }}</td>
            @foreach($users as $user)
            @if($log->created_by == $user->id)
            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            @endif
            @endforeach
          <td> {{ $log->topic }}</td>
          <td> {{ $log->event }}</td>
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
