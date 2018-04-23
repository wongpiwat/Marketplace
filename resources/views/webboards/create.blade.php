@extends('layouts.master')

@section('content')
<div>
<h1>Create Webboard<h1>
</div>

<div>
<h2>{{ $nameEvent }}</h2>
</div>





@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action='/webboard/{{$id_market}}' method="post">
{{ csrf_field() }}
{{ $errors->first('name') }}
    <div class="">
    <label> Topic: </label>
    <input type="text" name="name" value="{{old('name')}}">
    </div>
    <input name="id" type="hidden" value="{{$id_market}}">
    <div class="">
    <label>Details:</label>
    <textarea
        name="description"
        rows="8"
        col="80">{{ old('description')}}</textarea>
    </div>
<button type="submit">Submit</button>
</form>

@endsection