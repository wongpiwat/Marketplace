@extends('layouts.master')

@section('content')

<div>
<h1>Webboard<h1>
</div>
<div>
<h2>{{ $nameEvent }}</h2>
</div>


<div>
<form action="/webboard/{{ $id_market }}/create" method="post">
  @csrf
<button  class ="btn btn-danger"> Create</button>
</form>
</div>



<table class="table table-striped">
  <thead class='thead-dark'>
    <tr>
      <th class='bg-primary' scope="col">#</th>
      <th class='bg-primary' scope="col">Topic</th>
      <th class='bg-primary' scope="col">Details</th>
      <th class='bg-primary' scope="col">Create By</th>
    </tr>
  </thead>
  <tbody>
    @foreach($webboards as $web)
    <tr>
     <th scope="row">{{ $loop->iteration }}</th>
      <td> 
        <a href="{{ url('/webboard/' . $id_market . '/reply/' . $web->id ) }}">
          {{ $web->topic }}
        </a>
      </td>
      <td>{{ $web->details }}</td>
      <td>{{ $web->created_by }}</td>
      <td>
      <div>
  <form action="/webboard/{{ $web->id }}" method="post">
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


@endsection