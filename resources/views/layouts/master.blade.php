<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>The Marketplace</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/homepageTheme.css" type="text/css" media="all">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    @stack('style')
  </head>
  <body>

    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
        <a href="../" class="navbar-brand">The Marketplace</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="nav navbar-nav ml-auto">
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search">
            </form>

            <li class="nav-item">
              <span class="nav-link">|</span>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/login">Log in</a>
            </li>

            <li class="nav-item">
              <span class="nav-link"> </span>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
            </li>
          </ul>

        </div>
      </div>
    </div>


      @yield('content')


  <div class="container">
      @yield('content-bottom')
  </div>

  <script src="/js/app.js" charset="utf-8"></script>
    @stack('script')
  </body>
</html>
