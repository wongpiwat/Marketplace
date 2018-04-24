@extends('layouts.master')

@section('page­button')
<a class='btn btn-primary' href='markets/create'>Create Category</a>
@endsection

@section('content')
<br>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Market Name</th>
    </tr>
  </thead>
<tbody>

  @foreach($markets as $market)
    <tr>
      <th scope = "row" >{{ $loop->iteration }}</th>
      <td><a href=" {{ url('/markets/' .$market->id) }} "> {{ $market->name }} </a></td>



    </tr>
  @endforeach

</tbody>
</table>
@endsection
