@extends('layouts.master')

@section('content')
<a href="/users">Users</a><span> > </span><a>{{ $user->first_name }} {{ $user->last_name }}</a><br><br>
<div class="panel panel-default card">
    <div class="panel-­heading card-header">
        <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
    </div>
    <ul class="list-group">
      <li class="list-group-item">Address: {{ $user->address }}</li>
      <li class="list-group-item">Email: {{ $user->email }}</li>
      <li class="list-group-item">Phone: {{ $user->phone }}</li>
      <li class="list-group-item">Account Type: {{ $user->type }}</li>
      <li class="list-group-item">Enabled? {!! $user->is_enabled ?'<i class="fa fa-check"></i>': '<i class="fa fa-times"></i>' !!}</li>
      <li class="list-group-item">Joining Date: {{ $user->created_at->diffForHumans() }}</li>
    </ul>
    <div class="panel-footer">
      <a class="btn btn-warning" href="{{ url('/users/' . $user->id . '/edit') }}">Edit</a>
      <form action="/users/{{$user->id}}" method="post" class="has-confirm" data-message="Delete user?">
        @csrf
        @method('DELETE')
        <button type='submit' class="btn btn-danger">Delete</button>
      </form>
    </div>
</div>
@endsection

@push('script')
<script>
$("form.has-confirm").submit(function (e) {
  var $message = $(this).data('message');
  if(!confirm($message)){
    e.preventDefault();
  }
});
</script>
@endpush
