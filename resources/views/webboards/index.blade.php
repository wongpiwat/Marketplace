@extends('home.management')

@section('content-more')
<div>
  <h1>Webboards<h1>
</div>
<hr>
<div>
  <button  class ="btn btn-primary" data-toggle="modal" data-target="#myModal"> Create</button>
</div>
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
  <form action="/webboards/{{ $web->id }}" method="post">
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
