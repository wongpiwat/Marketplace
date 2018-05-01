@extends('layouts.master')

@section('content')
<a href="/users">Users</a><span> > </span>{{ $user->first_name }} {{ $user->last_name }}<br><br>
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
    <div class="card-footer">
      @if(\Auth::user()->id == $user->id)
      <a class="btn btn-warning" href="{{ url('/users/' . $user->id . '/edit') }}" style="float: left;">Edit</a>
      @endif
      @if($user->is_enabled)
        @if(\Auth::user()->id !== $user->id)
        <form action="/users/{{$user->id}}" method="post" class="has-confirm" data-message="Ban user?">
          @csrf
          @method('DELETE')
          <button type='submit' class="btn btn-danger" style="float: right;">Ban</button>
        </form>
        @endif
      @else
        <form action="/users/{{$user->id}}" method="post" class="has-confirm" data-message="Unban user?">
          @csrf
          @method('DELETE')
          <button type='submit' class="btn btn-danger" style="float: right;">Unban</button>
        </form>
      @endif
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
