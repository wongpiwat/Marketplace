
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
      <h2>Users</h2>
    </center>
    <table class="table">
      <thead>
        <tr>
          <th style="width: 50px" scope="col">#</th>
          <th style="width: 200px" scope="col">Name</th>
          <th style="width: 250px" scope="col">E-mail</th>
          <th scope="col">Type</th>
          <th scope="col">Enabled</th>
        </tr>
      </thead>
    <tbody>

      @foreach($users as $user)
        <tr>
          <th scope = "row" >{{ $loop->iteration }}</th>
          <td>{{ $user->first_name }} {{ $user->last_name }}</td>
          <td>{{ $user->email }}</td>
          <td style="width: 120px">{{ $user->type }}</td>
          <td>{!! $user->is_enabled ? '<img width="20px" src="images/check.png"></img>' : '<img width="20px" src="images/x-mark.png"></i>' !!}</td>
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
