@extends('home.management')

@section('content-more')
<div>
  <h1>Logs<h1>
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
      <th scope="col">User</th>
      <th scope="col">Event</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
<tbody>

  @foreach($logs as $log)
    <tr>
      <th scope = "row" >{{ $loop->iteration }}</th>
        @foreach($users as $user)
        @if($log->created_by == $user->id)
        <td><a href=" {{ url('/users/' . $user->id) }} ">{{ $user->first_name }} {{ $user->last_name }}</a></td>
        <td>{{ $log->event }}</td>
        <td>{{ $log->created_at }}</td>
        @endif
        @endforeach
    </tr>
  @endforeach

</tbody>
</table>
</div>
@endsection
