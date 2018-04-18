@extends('layouts.master')

@section('page­title')
All Users
@endsection

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Name</th>
      <th scope="col">Access Level</th>
      <th scope="col">Enabled</th>
    </tr>
  </thead>
<tbody>

  @foreach($users as $user)
    <tr>
      <th scope = "row" >{{ $loop->iteration }}</th>
      <td><a href=" {{ url('/users/' . $user->id) }} ">{{ $user->username }}</a></td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->access_level }}</td>
      <td>{!! $user->is_enabled ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' !!}</td>
    </tr>
  @endforeach

</tbody>
</table>
@endsection
