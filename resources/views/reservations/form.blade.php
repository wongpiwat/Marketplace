
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
          <th style="width:25px" scope="col">#</th>
          <th style="width:50px" scope="col">Zone</th>
          <th style="width:100px" scope="col">Number</th>
          <th style="width:200px" scope="col">Reserved By</th>
          <th style="width:100px" scope="col">Price</th>
          <th style="width:100px" scope="col">Paid</th>
        </tr>
      </thead>
    <tbody>
      @foreach($market->zones as $zone)
        @foreach($zone->reservations as $reservation)
          @if($reservation->reserved_by !== null)
            @if(\Auth::user()->id == $reservation->reserved_by)
              <tr>
                <th scope = "row" >{{ $loop->iteration }}</th>
                <td>{{ $zone->name }}</td>
                <td><a href="{{ url('/reservations/'.$reservation->id )}}">{{ $reservation->number }}</a></td>

                @php
                  $is_reserved = false;
                @endphp
                @foreach($users as $user)
                  @if($reservation->reserved_by == $user->id)
                    <td><a href=" {{ url('/users/' . $user->id) }} ">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                    @php
                      $is_reserved = true;
                    @endphp
                  @endif
                @endforeach
                @if($is_reserved == false)
                  <td>-</td>
                @endif
                <td>{{ $zone->price }}</td>
                <td>{!! $reservation->is_paid ? '<img width="20px" src="images/check.png"></img>' : '<img width="20px" src="images/x-mark.png"></i>' !!}</td>
                @if($reservation->is_paid == true)

                  @if(\Auth::user()->type == 'seller')
                  <td>

                      <form action="{{ url('/markets/'.$market->id.'/'.$reservation->id.'/cancel') }}" method="post" class="has-confirm" data-message="Cancel reservation?">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-danger" type="submit" name="button">Cancel</button>
                      </form>

                  </td>
                  @endif
                  <td>
                    <?php
                      $now = Carbon\Carbon::now();
                      $year = $now->year;
                      $month = $now->month;
                      $day = $now->day;
                      $dayMarketStart = explode("-",$market->start_day);
                      $yearStart = $dayMarketStart[0];
                      $monthStart = $dayMarketStart[1];
                      $dayStart = $dayMarketStart[2];
                      $dayMarketClose = explode("-",$market->close_day);
                      $yearClose = $dayMarketClose[0];
                      $monthClose = $dayMarketClose[1];
                      $dayClose = $dayMarketClose[2];
                     ?>
                    @if($year >= $yearStart && $month >= $monthStart && $day >= $dayStart && $year <= $yearClose && $month <= $monthClose && $day <= $dayClose)
                      <a href="{{ url('/reservations/checkin/'.$market->id.'/'.$reservation->id ) }}" class="btn btn-info">Check In</a>
                    @else
                      <button disabled href="{{ url('/reservations/checkin/'.$market->id.'/'.$reservation->id ) }}" class="btn" style="background-color:gray; color:white">Check In</button>
                    @endif
                  <td>
                @else
                <td>
                  <form action="{{ url('/markets/'.$market->id.'/'.$reservation->id.'/pay') }}" method="post" class="has-confirm" data-message="Confirm to pay for reservation?">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-primary" type="submit" name="button">Pay</button>
                  </form>
                </td>
                <td>
                  <button disabled href="{{ url('/reservations/checkin/'.$market->id.'/'.$reservation->id ) }}" class="btn" style="background-color:gray; color:white">Check In</button>
                <td>
                @endif
              </tr>
            @else
              <tr>
                <th scope = "row" >{{ $loop->iteration }}</th>
                <td>{{ $zone->name }}</td>
                <td><a href="{{ url('/reservations/'.$reservation->id )}}">{{ $reservation->number }}</a></td>

                @php
                  $is_reserved = false;
                @endphp
                @foreach($users as $user)
                  @if($reservation->reserved_by == $user->id)
                    <td><a href=" {{ url('/users/' . $user->id) }} ">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                    @php
                      $is_reserved = true;
                    @endphp
                  @endif
                @endforeach
                @if($is_reserved == false)
                  <td>-</td>
                @endif
                <td>{{ $zone->price }}</td>
                <td>{!! $reservation->is_paid ? '<img width="20px" src="images/check.png"></img>' : '<img width="20px" src="images/x-mark.png"></i>' !!}</td>
                @if($reservation->is_paid == true)
                @if(\Auth::user()->type == 'seller')
                  <td>
                    <form action="{{ url('/markets/'.$market->id.'/'.$reservation->id.'/cancel') }}" method="post" class="has-confirm" data-message="Cancel reservation?">
                      @csrf
                      @method('PUT')
                      <button class="btn btn-danger" type="submit" name="button">Cancel</button>
                    </form>
                  </td>
                  @endif
                @else
                <td>
                  <form action="{{ url('/markets/'.$market->id.'/'.$reservation->id.'/pay') }}" method="post" class="has-confirm" data-message="Confirm to pay for reservation?">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-primary" type="submit" name="button">Pay</button>
                  </form>
                </td>
                @endif
              </tr>
            @endif
          @else
            @if(\Auth::user()->id == $market->created_by || \Auth::user()->type == 'administrator')
              <tr>
                <th scope = "row" >{{ $loop->iteration }}</th>
                <td>{{ $zone->name }}</td>
                <td>{{ $reservation->number }}</td>


                @php
                  $is_reserved = false;
                @endphp
                @foreach($users as $user)
                  @if($reservation->reserved_by == $user->id)
                    <td><a href=" {{ url('/users/' . $user->id) }} ">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                    @php
                      $is_reserved = true;
                    @endphp
                  @endif
                @endforeach
                @if($is_reserved == false)
                  <td>-</td>
                @endif
                <td>{{ $zone->price }}</td>
                <td>{!! $reservation->is_paid ? '<img width="20px" src="images/check.png"></img>' : '<img width="20px" src="images/x-mark.png"></i>' !!}</td>

              </tr>
            @endif
          @endif
        @endforeach
      @endforeach
    </tbody>
    </table>

  </body>
</html>
