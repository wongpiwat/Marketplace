@extends('layouts.master')

@section('content')
<a href="/logs">Logs</a><span> > </span>{{ $log->topic }}<br><br>
<div class="panel panel-default card">
    <div class="panel-­heading card-header">
        <h2>{{ $log->topic }}</h2>
    </div>
    <ul class="list-group">
      <li class="list-group-item">Event: {{ $log->event }}</li>
      @foreach($users as $user)
      @if($log->created_by == $user->id)
      <li class="list-group-item">Created By: {{ $user->first_name }} {{ $user->last_name }}</li>
      @endif
      @endforeach
    </ul>
    <div class="card-footer">
    </div>
</div>
@endsection
