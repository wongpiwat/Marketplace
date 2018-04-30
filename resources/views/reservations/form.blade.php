
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reservations</title>
    <style>
      body {
          font-family: "Arial, Arial, Helvetica, sans-serif";
      }
    </style>
  </head>
  <body>

    <table class="table">
      <thead>
        <tr>
          <th style="width: 50px" scope="col">#</th>
          <th style="width: 150px" scope="col">Zone</th>
          <th style="width: 100px" scope="col">Number</th>
          <th style="width: 200px" scope="col">Reserved By</th>
          <th style="width: 100px" scope="col">Paid</th>
        </tr>
      </thead>
    <tbody>
      @foreach($reservations as $reservation)
        <tr>
          <th scope = "row" >{{ $loop->iteration }}</th>
          @foreach($zones as $zone)
          @if($reservation->zone_id == $zone->id)
          <td>{{ $zone->name }}</td>
          @endif
          @endforeach
          <td>{{ $reservation->number }}</td>
          @foreach($users as $user)
          @if($reservation->reserved_by == $user->id)
          <td>{{ $user->first_name }} {{ $user->last_name }}</td>
          @endif
          @endforeach
          <td>{!! $reservation->is_paid ? '<img width="20px" src="images/check.png"></img>' : '<img width="20px" src="images/x-mark.png"></i>' !!}</td>
        </tr>
      @endforeach
    </tbody>
    </table>

  </body>
</html>
