@extends('home.management')

@section('content')
<div>
  <a href="/markets/page/{{ $market->id }}">Market</a> > <span> Q&A {{ $market->name }}</span>
</div>

<img src=" {{ asset('images/support.gif') }}"  class="mr-3 mt-3 rounded-circle" style="width:120px; height:90; border-radius: 25px; ">
  <h1 style="color:#DF6919">Q&A {{ $market->name }}</h1>
<div class="row">
  <div class="col-md-10"></div>
    <div class="col-md-2">
      <a class ="btn" data-toggle="modal" data-target="#myModal" style="background-color:#EA6B5A;float:right ; color:#EDEDEB;"> Create</a>
    </div>
</div>
<hr style="height:4px;background-color:#EA6B5A;">
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

</div>




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
        <a href="{{ url('/support/'.$market->id.'/'.$web->id ) }}">
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
  <form class="delete" action="/support/{{ $web->id }}/{{ $market->id }}" method="post">
   @csrf
   @method('DELETE')
  <button  class ="btn btn-danger"> Delete</button>
  </form>
      </div>


      </td>
    </tr>
    @endforeach
  </tbody>
</table>




<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">

          <h4 class="modal-title">Create Comment</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

    <form action='/webboards/{{ $market->id}}' method="post">

    {{ csrf_field() }}
    {{ $errors->first('name') }}

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
<script src="{{asset('js/app.js')}}"></script>
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
