@extends('layouts.master')

@section('content')
<div class="container">
    <div style="background-color:#ECF0F5;">
    <center>
      <img src=" {{ asset('images/error.gif') }}" class="mr-3 mt-3 " style="width:400px; height:400; border-radius: 10px; "></center>
        <div class="text-center">
          <i class="fa fa-5x fa-frown-o" style="color:#d9534f;"></i>
        </div>
        <h1 class="text-center"><small class="text-center"> You don't have privilege</small></h1>
        <p class="text-center">Try pressing the back button or clicking on this button.</p>
        <p class="text-center"><a class="btn btn-primary" href="/"><i class="fa fa-home"></i> Take Me Home</a></p>
    </div>
</div>
@endsection
