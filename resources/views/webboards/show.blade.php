@extends('layouts.master')
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
<form action="/webboard/" method="post">
  @csrf
<button  class ="btn btn-danger"> Comment</button>
</form>
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
