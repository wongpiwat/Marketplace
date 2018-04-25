@extends('layouts.master')

@section('content-footer')
<div class="panel panel-default">
    <div class="panel-­heading">
        <h2>{{ $user->username }}</h2>
        <p>[ <i class="fa fa-user-circle"></i> {{ $user->access_level }} ]</p>
    </div>
    <ul class="list-group">
      <li class="list-group-item">Name: {{ $user->name }}</li>
      <li class="list-group-item">Email: {{ $user->email }}</li>
      <li class="list-group-item">Enabled? {!! $user->is_enabled ?'<i class="fa fa-check"></i>': '<i class="fa fa-times"></i>' !!}</li>
      <li class="list-group-item">Joining Date: {{ $user->created_at->diffForHumans() }}</li>
    </ul>
    <div class="panel-footer">
      <a class="btn btn-default" href="{{ url('/users/' . $user->id . '/edit') }}">Edit</a>
    </div>
</div>
@endsection
