<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>The Marketplace</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/homepage.css">
    @stack('style')
  </head>
  <body>

    <div class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <img src="{{ asset('images/M.jpg') }}" href="../" style="width:60px;height:60px;">
        <span><a href="../" class="navbar-brand"><h1> ARKETPLACE</h1></a></span>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="nav navbar-nav ml-auto">


            <li class="nav-item">
              <span class="nav-link">|</span>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/login">Log in</a>
            </li>

            <li class="nav-item">
              <span class="nav-link">|</span>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
            </li>
          </ul>

        </div>
      </div>
    </div>

    @if (\Request::is('markets') or \Request::is('reserves') or \Request::is('users') or \Request::is('logs'))
    <div class="container }}">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('markets') ? 'active' : '' }}" href="/markets">All Markets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('reserves') ? 'active' : '' }}" href="/reserves">All Reserves</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="/users">All Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('logs') ? 'active' : '' }}" href="/logs">All Logs</a>
        </li>
      </ul>
    </div>
    @endif


  <div class="container">
      @yield('content')
  </div>

  <div>
      @yield('content-footer')
  </div>

  <script src="/js/app.js" charset="utf-8"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    @stack('script')
  </body>
</html>
