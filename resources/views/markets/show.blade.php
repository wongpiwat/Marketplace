@extends('layouts.master')

@section('content')
<a href="/markets">Markets</a><span> > </span><a>{{ $market->name }}</a><br><br>
<div class="panel panel-default card">
    <div class="panel-­heading card-header">
        <h1>{{ $market->name }}</h1>
    </div>
    <ul class="list-group">
      <li class="list-group-item">ID: {{ $market->id }}</li>
      <li class="list-group-item">Location: {{ $market->location }}</li>
      <li class="list-group-item">Start Time: {{ $market->start_time }}</li>
      <li class="list-group-item">Close Time: {{ $market->close_time }}</li>
      <li class="list-group-item">Organizer name: {{ $market->organizer_name }}</li>
      <li class="list-group-item">Contact Name: {{ $market->contact_name }}</li>
      <li class="list-group-item">E-mail: {{ $market->email }}</li>
      <li class="list-group-item">Phone: {{ $market->phone }}</li>
      <li class="list-group-item">Description: {{ $market->description }}</li>
      <li class="list-group-item">Youtube Video Teaser: {{ $market->teaser }}</li>

    </ul>
    <div class="panel-footer">
      <a class="btn btn-warning" href="{{ url('/markets/' . $market->id . '/edit') }}">Edit</a>
      <form action="/markets/{{$market->id}}" method="post" class="has-confirm" data-message="Delete market?">
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
