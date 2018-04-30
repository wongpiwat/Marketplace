@extends('home.management')

@section('content-more')
<div>

    <h1 style="color:#E75D30;">    <img src=" {{ asset('images/logs.gif') }}" class="mr-3 mt-3 rounded-circle" alt="Jane Doe"  style="width:120px; height:90; border-radius: 10px; ">
   Logs<h1>
</div>
<hr style="height:4px;background-color:#E75D30;">
<div>
  <a class="btn btn-info" href="/logs/form">Print</a>
  <form  action="/search/logs" class="form-inline" style="float:right;" method="get">
  <input class="form-control " name="str" type="text" placeholder="Search...">
  </form>
</div>
<br>
<div class="card">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Topic</th>
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
        <td><a href=" {{ url('/logs/' . $log->id) }} ">{{ $log->topic }}</a></td>
        <td>{{ $log->created_at }}</td>
        @endif
        @endforeach
    </tr>
  @endforeach

</tbody>
</table>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4 ">
    <center>
    {{$logs->links()}}
    </center>
  </div>
  <div class="col-md-4">
  </div>
</div>
</div>


@endsection
