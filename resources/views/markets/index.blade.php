@extends('home.management')

@section('content-more')
<div>

    <h1 style="color:#EA6B5A;">    <img src=" {{ asset('images/reserve.gif') }}" alt="Jane Doe" class="mr-3 mt-3 rounded-circle" style="width:120px; height:90; border-radius: 25px; ">
   Markets <h1>
</div>



<div>
  <a class="btn " href="/markets/create" style="background-color:#EA6B5A;float:right ; color:#EDEDEB;">Create</a>
</div>
<br>
<hr style="height:4px;background-color:#EA6B5A;">
<br>
<div>
  <a class="btn btn-info"  href="/markets/form">Print</a>
  <form  action="/search/market" class="form-inline" style="float:right;" method="get">
  <input class="form-control " name="str" type="text" placeholder="Search...">
</form>
</div>
<br>
<div class="card">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Organizer</th>
      <th scope="col">Created By</th>
    </tr>
  </thead>
<tbody>

  <?php
  $market_used = [];
   ?>

  @foreach($markets as $market)
  <?php
  if (!in_array($market,$market_used)) {
    array_push($market_used,$market);
  } else {
    continue;
  }
   ?>
    <tr>
      <th scope = "row" >{{ $loop->iteration }}</th>
      <td><a href=" {{ url('/markets/' .$market->id) }} "> {{ $market->name }} </a></td>
      <td> {{ $market->organizer_name }} </td>

      @foreach($users as $user)
      @if($market->created_by == $user->id)

      <td><a href=" {{ url('/users/' .$user->id) }} "> {{ $user->first_name }} {{ $user->last_name }} </a></td>
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
      {{$markets->links()}}
    </center>
  </div>
  <div class="col-md-4">
  </div>
</div>
</div>
@endsection
