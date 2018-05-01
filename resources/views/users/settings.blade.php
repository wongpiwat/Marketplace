@extends('home.management')

@push('style')
<style>
 .badgescard, .firstinfo {
  display: flex;
  justify-content: center;
  align-items: center;
}

.container {
    min-height: 0%;
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

<form action='/setting/' method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}
    {{ $errors->first('name') }}
<center>
<div class="content">
  <div class="card">
    <div class="firstinfo">
      <img id="profileNew"  src="{{ asset('storage/users/'.Auth::user()->id.'/profile/'.Auth::user()->image ) }}"  />
      <div class="profileinfo">
        <label>Name</label><input  name="first_name" type='text' class='form-control'  value=' {{{ Auth::user()->first_name }}}'  >
        <label>Last name  </label><input name="last_name" type='text' class='form-control'  value='{{{ Auth::user()->last_name }}} ' >
        <label>BirthDay  </label><input name="birthday" type='date' class='form-control'  value='{{{ Auth::user()->birthday }}}' >
        <label>Address  </label><textarea rows="4" name="address" type='text' class='form-control'  >{{ Auth::user()->address }}</textarea>
        <label>Email </label><label name="email"  type='text' class='form-control'>{{ Auth::user()->email }}</label>
        <label>Number telephone </label><input name="phone" type='text' class='form-control'  value='{{{ Auth::user()->phone }}}' >
        <input type="file" name="img_files" onchange="previewFile()"  ><br>
        <br>
        <button class="btn btn-warning" type="submit">Edit</button>
        <br>
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
    <span class="devicons devicons-sass"></span>
  </div>
</div>
</center>
</form>
@endsection

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#profileNew').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }


function previewFile() {
  var preview = document.querySelector('#profileNew');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);
  if (file) {
    reader.readAsDataURL(file);
  }
}
</script>
@endpush
