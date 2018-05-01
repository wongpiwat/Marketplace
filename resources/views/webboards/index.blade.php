@extends('home.management')

@section('content-more')
<div>
  <h1 style="color:#2084BD;">    <img src=" {{ asset('images/webboard2.gif') }}" class="mr-3 mt-3 rounded-circle" alt="Jane Doe"  style="width:120px; height:90; border-radius: 10px; ">
 Webboards<h1>

</div>
<div class="row">
  <div class="col-md-10"></div>
    <div class="col-md-2">
      <a class ="btn btn-" data-toggle="modal" data-target="#myModal" style="float:right;background-color:#2084BD;color:#EDF2F9 "> Create</a>
    </div>
</div>
<hr style="height:4px;background-color:#2084BD;">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
  <form  action="/search/webboard" class="form-inline" style="float:right" method="get">
  <input class="form-control " name="str" type="text" placeholder="Search...">
  </form>
</div>



<ul class="nav nav-tabs">
 @if(  $pointType == "all")
  <li class="nav-item">
    <a class="nav-link active"   href="{{ url('/webboards/' ) }}">All</a>
  </li>
  @else
  <li class="nav-item">
    <a class="nav-link "   href="{{ url('/webboards/' ) }}">All</a>
  </li>
  @endif
  @if($pointType=='general')
  <li class="nav-item">
    <a class="nav-link active" href="{{ url('/webboards/general' ) }}">General</a>
  </li>
  @else
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/webboards/general' ) }}">General</a>
  </li>
  @endif
  @if($pointType=='markets')
  <li class="nav-item">
    <a class="nav-link active"  href="{{ url('/webboards/markets' ) }}">Markets</a>
  </li>
  @else
  <li class="nav-item">
    <a class="nav-link"  href="{{ url('/webboards/markets' ) }}">Markets</a>
  </li>
  @endif
  @if($pointType=='problems')
  <li class="nav-item">
    <a class="nav-link active " href="{{ url('/webboards/problems' ) }}">Problems</a>
  </li>
  @else
  <li class="nav-item">
    <a class="nav-link " href="{{ url('/webboards/problems' ) }}">Problems</a>
  </li>
  @endif


</ul>

<br>
<div class="card">
<table class="table">
  <thead class='thead'>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Topic</th>
      <th scope="col">Details</th>
      <th scope="col">Create By</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($webboards as $web)
    <tr>
     <th scope="row">{{ $loop->iteration }}</th>
      <td>
        <a href="{{ url('/webboards/'.$web->id ) }}">
          {{ $web->topic }}
        </a>
      </td>
      <td>{{ $web->details }}</td>
      <?php
      $firstNameCreate = App\User::where('id', $web->created_by)->value('first_name');
      $lastNameCreate = App\User::where('id', $web->created_by)->value('last_name');
      ?>
      <td>{{ $firstNameCreate }} {{  $lastNameCreate }}</td>
      <td>
      <div>
        @if(\Auth::user()->id == $web->created_by || \Auth::user()->type == 'administrator')
  <form class="delete" action="/webboards/{{ $web->id }}" method="post">
   @csrf
   @method('DELETE')
  <button  class ="btn btn-danger"> Delete</button>
  </form>
  @endif
      </div>


      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4 ">
    <center>
    {{$webboards->links()}}
    </center>
  </div>
  <div class="col-md-4">
  </div>
</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">

          <h4 class="modal-title">Create Comment</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>


        <div class="modal-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action='/webboards/' method="post">
    {{ csrf_field() }}
    {{ $errors->first('name') }}
    <div class=''>
      <label>Type: </label>
      <select style="margin-left:20px" name="type">
      @foreach($type as $key => $value)
          @if(old('type')==$key)
          <option value="{{$key}}" selected>{{ $value }}</option>
          @else
          <option value="{{$key}}">{{ $value}}</option>
          @endif
      @endforeach
      </select>
    </div>
        <div class="">
        <label> Topic: </label>
        <input type="text" name="name" value="{{old('name')}}">
        </div>
        <div class="">
        <label>Details:</label>
        <textarea
            name="description"
            rows="8"
            col="80">{{ old('description')}}</textarea>
        </div>
    <button class="btn btn-success" type="submit">Submit</button>
    </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('script')
<script>
$(function() {

    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });

    $(".delete btn btn-danger").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
});
</script>
@endpush
