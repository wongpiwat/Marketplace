@extends('layouts.master')

@push('style')
<style>
  label {
    margin-right: 0.5%;
  }
</style>
@endpush

@section('content')
<!-- {{ $errors }} -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<a href="/users">Users</a><span> > </span><a>{{ $user->first_name }} {{ $user->last_name }}</a><br><br>
<div class="panel panel-default card">
    <div class="panel-­heading card-header">
        <h2>Edit User</h2>
    </div>
    <form action='/users/{{ $user->id }}' method='post'>
      @csrf
      @method('PUT')
    <div class="card-body">

        <div>
          <label>E-mail: </label>
          <label type='text'>{{ $user->email }}</label>
        </div>

        <div>
          <label>First Name: </label>
          <input type='text' name='first_name' value='{{ old('first_name') ?? $user->first_name }}'>
        </div>

        <div>
          <label>Last Name: </label>
          <input type='text' name='last_name' value='{{ old('last_name') ?? $user->last_name }}'>
        </div>

        <div>
          <label>Address: </label>
          <input type='text' name='address' value='{{ old('address') ?? $user->address }}'>
        </div>

        <div>
          <label>Phone: </label>
          <input type='text' name='phone' value='{{ old('phone') ?? $user->phone }}'>
        </div>

        <div>
          <label>Account Type: </label>
            @foreach($type as $key => $value)
             @if((old('type') ?? $user->type) == $key)
               <label>{{ $value }}</label>
             @endif
            @endforeach
        </div>



    </div>
    <div class="card-footer">
      <button class='btn btn-primary' type='submit'>Submit</button>

    </div>
    </form>
</div>

@endsection
