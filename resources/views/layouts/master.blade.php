<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Marketplace</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/homepage.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
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

            <!-- Authentication Links -->
            @guest
            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
            <li><a class="nav-link" href="{{ url('/markets/create') }}">Create Market</a></li>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->first_name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/management">Management</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>
            @endguest

          </ul>

        </div>
      </div>
    </div>

  <div class="container">
      @yield('content')
  </div>

  <div>
      @yield('content-footer')
  </div>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="/js/app.js" charset="utf-8"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    @stack('script')
  </body>
</html>
