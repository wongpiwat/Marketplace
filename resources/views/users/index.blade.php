@extends('home.management')

@section('content-more')
<div>
  <h1 style="color:#8AC560;">    <img src=" {{ asset('images/users.gif') }}" class="mr-3 mt-3 " style="width:150px; height:110; border-radius: 500px; ">
 Users <h1>

</div>

<div>
  <a class="btn " style="float:right; background-color:#8AC560; color:white; "href="/users/create">Create</a>
  <br>
</div>
<hr style="height:4px;background-color:#8AC560;">
<div>
  <a class="btn btn-info"  href="/users/form">Print</a>
  <form  action="/search/user" class="form-inline" method="get" style="float:right">
  <input class="form-control " name="str" type="text" placeholder="Search...">
  </form>
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
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4 ">
    <center>
    {{$users->links()}}
    </center>
  </div>
  <div class="col-md-4">
  </div>
</div>
</div>
@endsection
