@extends('layouts.master')

@section('content')

<a href="/markets/{{ $market->id }}">Reservations</a><span> > </span>{{ $reservation->id }}<br><br>
<div class="panel panel-default card">
    <div class="panel-­heading card-header">
        <h2>{{ $reservation->id }}</h2>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Date</th>
          <th scope="col">Image</th>
        </tr>
      </thead>
    <tbody>
      @foreach($reservation->checkIns as $image)
        <tr>
          <th scope = "row" >{{ $loop->iteration }}</th>
          <td>Date:{{ $image->created_at }}</td>
          <td><img src="{{ $image->path }}" ></td>
        </tr>
      @endforeach
    </tbody>
    </table>

    <div class="card-footer">
    </div>
</div>

@endsection
