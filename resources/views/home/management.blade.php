@extends('layouts.master')

@section('content')
  @guest

  @else
  @if(Auth::user()->type === 'administrator')
  <div class="container card">
    <ul class="nav nav-pills nav-fill">
      <li class="nav-item">
        <a class="nav-link" href="/markets">Markets</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/reservation">Reservations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/users">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/webboards">Webboards</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logs">Logs</a>
      </li>
    </ul>
  </div>
  @endif
  @endguest
  @yield('content-more')
@endsection
