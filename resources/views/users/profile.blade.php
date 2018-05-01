@extends('home.management')

@push('style')

<style>
 .badgescard, .firstinfo {
  display: flex;
  justify-content: center;
  align-items: center;
}

*, *:before, *:after {
  box-sizing: border-box;
}

.content {
  position: relative;
  animation: animatop 0.9s cubic-bezier(0.425, 1.14, 0.47, 1.125) forwards;
}

.card {
  width: 50%;
  min-height: 100px;
  padding: 5%;
  border-radius: 3px;
  background-color: white;
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
  position: relative;
  overflow: hidden;
}
.card:after {
  content: '';
  display: block;
  width: 190px;
  height: 300px;
  background: cadetblue;
  position: absolute;
  animation: rotatemagic 0.75s cubic-bezier(0.425, 1.04, 0.47, 1.105) 1s both;
}

.badgescard {
  padding: 10px 20px;
  border-radius: 3px;
  background-color: #ECECEC;
  width: 50%;
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
  position: absolute;
  z-index: -1;
  left: 25%;
  bottom: 10px;
  animation: animainfos 0.5s cubic-bezier(0.425, 1.04, 0.47, 1.105) 0.75s forwards;
}
.badgescard span {
  font-size: 1.6em;
  margin: 0px 6px;
  opacity: 0.6;
}

.firstinfo {
  flex-direction: row;
  z-index: 2;
  position: relative;
}
.firstinfo img {
  border-radius: 50%;
  width: 120px;
  height: 120px;
}
.firstinfo .profileinfo {
  padding: 0px 20px;
}
.firstinfo .profileinfo h1 {
  font-size: 1.8em;
}
.firstinfo .profileinfo h3 {
  font-size: 1.2em;
  color: #009688;
  font-style: italic;
}
.firstinfo .profileinfo p.bio {
  padding: 10px 0px;
  color: #5A5A5A;
  line-height: 1.2;
  font-style: initial;
}

@keyframes animatop {
  0% {
    opacity: 0;
    bottom: -500px;
  }
  100% {
    opacity: 1;
    bottom: 0px;
  }
}
@keyframes animainfos {
  0% {
    bottom: 10px;
  }
  100% {
    bottom: -42px;
  }
}
@keyframes rotatemagic {
  0% {
    opacity: 0;
    transform: rotate(0deg);
    top: -24px;
    left: -253px;
  }
  100% {
    transform: rotate(-30deg);
    top: -24px;
    left: -78px;
  }
}

</style>

@endpush


@section('content')
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
<form action='/setting/' method="get">
    {{ csrf_field() }}
    {{ $errors->first('name') }}
    <center>
      <div class="content">
        <div class="card">
          <div class="firstinfo">
            <!-- <img src="{{ asset('storage/users/'.Auth::user()->id.'/profile/'.Auth::user()->image ) }}" /> -->
            <img src="{{ asset('/images/user.png' ) }}">
            <div class="profileinfo">
              <h1> {{{ Auth::user()->first_name }}} {{{ Auth::user()->last_name }}} </h1>
              <h3>{{{ Auth::user()->type }}}</h3>
              <p class="bio">{{{ Auth::user()->email }}}</p>
              <p class="bio">{{{  Auth::user()->phone }}}</p>
              <p class="bio">{{{ Auth::user()->birthday  }}}</p>
              <p class="bio">{{{ Auth::user()->address }}}</p>
              <button class="btn btn-warning" type="submit">Edit</button>
            </div>
          </div>
        </div>
        <div class="badgescard">
          <span class="devicons devicons-django"></span>
          <span class="devicons devicons-python"></span>
          <span class="devicons devicons-codepen"></span>
          <span class="devicons devicons-javascript_badge"></span>
          <span class="devicons devicons-gulp"></span>
          <span class="devicons devicons-angular"></span>
          <span class="devicons devicons-sass"> </span>
        </div>
      </div>
    </center>
</form>



@endsection
