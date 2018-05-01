@extends('layouts.master')

@section('content')
<p><a href="/markets">Markets</a><span> > </span> <span>{{ $market->name }}</span></p>
<div class="panel panel-default card">
    <div class="panel-­heading card-header">
        <h1>{{ $market->name }}</h1>
    </div>
    <ul class="list-group">
      <li class="list-group-item">ID: {{ $market->id }}</li>
      <li class="list-group-item">Location: {{ $market->location }}</li>
      <li class="list-group-item">Start Time: {{ $market->start_time }}</li>
      <li class="list-group-item">Close Time: {{ $market->close_time }}</li>
      <li class="list-group-item">Start Day: {{ $market->start_day }}</li>
      <li class="list-group-item">Close Day: {{ $market->close_day }}</li>
      <li class="list-group-item">Organizer name: {{ $market->organizer_name }}</li>
      <li class="list-group-item">Contact Name: {{ $market->contact_name }}</li>
      <li class="list-group-item">E-mail: {{ $market->email }}</li>
      <li class="list-group-item">Phone: {{ $market->phone }}</li>
      <li class="list-group-item">Description: {{ $market->description }}</li>
      <li class="list-group-item">Youtube Video Teaser: {{ $market->teaser }}</li>

    </ul>
    <div class="card-footer">
      <a class="btn btn-warning" href="{{ url('/markets/' . $market->id . '/edit') }}" style="float: left;">Edit</a>
      <a class="btn btn-primary" href="{{ url('/markets/page/' . $market->id . '') }}" style="float: right;">Market</a>

      <center>
      <form action="/markets/{{$market->id}}" method="post" class="has-confirm" data-message="Delete market?">
        @csrf
        @method('DELETE')
        <button type='submit' class="btn btn-danger">Delete</button>
      </form>
      </center>
    </div>
</div>

<br>
@if($reservations != null)
<div class="card">
  <div class="card-header">
    <h2>Reservations</h2>
  </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Zone</th>
          <th scope="col">Number</th>
          <th scope="col">Reserved By</th>
          <th scope="col">Price</th>
          <th scope="col">Paid</th>
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
                <td>{!! $reservation->is_paid ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' !!}</td>
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
                <td>{!! $reservation->is_paid ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' !!}</td>
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
                <td><a href="{{ url('/reservations/'.$reservation->id ) }}">{{ $reservation->number }}</a></td>


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
                <td>{!! $reservation->is_paid ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' !!}</td>

              </tr>
            @endif
          @endif
        @endforeach
      @endforeach
    </tbody>
    </table>
    <div class="card-footer">
      <a class="btn btn-info"  href="/markets/reservations/form/{{$market->id}}">Print</a>
    </div>
</div>
    @endif
@endsection

@push('script')
<script>
$("form.has-confirm").submit(function (e) {
  var $message = $(this).data('message');
  if(!confirm($message)){
    e.preventDefault();
  }
});
</script>
@endpush
