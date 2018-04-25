@extends('home.management')

@section('content-more')
<div>
  <h1>Reservations<h1>
</div>
<hr>
<div>
  <a class="btn btn-primary" href="">Create</a>
</div>
<br>
<div class="card">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Market</th>
          <th scope="col">Zone</th>
          <th scope="col">No.</th>
          <th scope="col">Reserved By</th>
          <th scope="col">Paid</th>
        </tr>
      </thead>
    <tbody>

      @foreach($reservations as $reservation)
        <tr>
          <th scope = "row" >{{ $loop->iteration }}</th>
          @foreach($markets as $market)
          @if($reservation->market_id == $market->id)
          <td><a href=" {{ url('/markets/' . $market->id) }} ">{{ $market->name }}</a></td>
          @endif
          @endforeach
          <td>{{ $reservation->zone }}</td>
          <td>{{ $reservation->number }}</td>
          @foreach($users as $user)
          @if($reservation->reserved_by == $user->id)
          <td><a href=" {{ url('/users/' . $user->id) }} ">{{ $user->first_name }} {{ $user->last_name }}</a></td>
          @endif
          @endforeach
          <td>{!! $reservation->is_paid ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' !!}</td>

        </tr>
      @endforeach

    </tbody>
    </table>
</div>

@endsection
