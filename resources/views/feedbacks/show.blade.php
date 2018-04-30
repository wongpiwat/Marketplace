@extends('layouts.master')

@section('content')
<a href="/feedbacks">Feedbacks</a><span> > </span>{{ $feedback->topic }}<br><br>
<div class="panel panel-default card">
    <div class="panel-­heading card-header">
        <h2>{{ $feedback->topic }}</h2>
    </div>
    <ul class="list-group">
      <li class="list-group-item">Comment: {{ $feedback->comment }}</li>
      @foreach($users as $user)
      @if($feedback->created_by == $user->id)
      <li class="list-group-item">Created By: {{ $user->first_name }} {{ $user->last_name }}</li>
      @endif
      @endforeach
    </ul>
    <div class="card-footer">
      <form action="/feedbacks/{{$feedback->id}}" method="post" class="has-confirm" data-message="Delete feedback?">
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
