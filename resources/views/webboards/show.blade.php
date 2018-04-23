@extends('layouts.master')
@section('content')
<div>
<h1>Webboard Reply<h1>
</div>


<div>
<form action="/webboard/" method="post">
@csrf
@method('DELETE')
<button type="submit" class ="btn btn-danger"> DELETE</button>
</form>
</div>

<div>
<form action="/webboard/" method="post">
  @csrf
<button  class ="btn btn-danger"> Edit</button>
</form>
</div>

<div>
<button  class ="btn btn-warning" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"> Comment</button>
</div>

<table class="table table-striped">
  <thead class='thead-dark'>
    <tr>
      <th class='bg-primary' scope="col">#</th>
      <th class='bg-primary' scope="col">Topic</th>
      <th class='bg-primary' scope="col">Details</th>
    </tr>
  </thead>
  <tbody>

  <td>{{ $webboard->topic }}</td>
    @foreach($reply as $p)
    <tr>
     <th scope="row">{{ $loop->iteration }}</th>
      <td>
      {{ $p->comment }}
      <div>
      <?php
      $reply = DB::table('users')->where('id', $p->created_by)->value('username'); 
      ?>
      By: {{ $reply }}
      </div>
      <div>
      Date: {{ $p->created_at }}
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
        
        <form action="/webboard/{{ $id }}/reply/{{ $webboard->id }}" method="post">
          <p>Comment </p>
            <div class="">
                <textarea name="comment" style='width:100%' rows="8" col="1200"></textarea>
             </div>

        </div>

        <div class="modal-footer">

      
            @csrf
                 <button  class ="btn btn-success"> Submit</button>
        </form>

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>


@endsection