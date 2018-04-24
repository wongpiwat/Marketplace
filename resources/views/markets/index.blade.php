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
      <th scope="col">Name</th>
      <th scope="col">Organizer</th>
      <th scope="col">Created By</th>
    </tr>
  </thead>
<tbody>

  @foreach($markets as $market)
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
@endsection
