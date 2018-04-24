@extends('layouts.master')

@section('page­title')
<h3>Market Detail</h3>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-­heading">
        <h1>{{ $market->name }}</h1>
    </div>
    <ul class="list-group">
      <li class="list-group-item">ID: {{ $market->id }}</li>
      <li class="list-group-item">Description: {{ $market->description }}</li>







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
