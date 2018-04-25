@extends('home.management')

@section('content-more')
<div>
  <h1>Users<h1>
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
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Type</th>
      <th scope="col">Enabled</th>
    </tr>
  </thead>
<tbody>

  @foreach($users as $user)
    <tr>
      <th scope = "row" >{{ $loop->iteration }}</th>
      <td><a href=" {{ url('/users/' . $user->id) }} ">{{ $user->first_name }} {{ $user->last_name }}</a></td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->type }}</td>
      <td>{!! $user->is_enabled ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' !!}</td>
    </tr>
  @endforeach

</tbody>
</table>
</div>
@endsection
