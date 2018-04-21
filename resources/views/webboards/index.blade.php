
<h1>Webboard<h1>
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
        <a href="{{ url('/webboard/' . $web->id) }}">
          {{ $web->topic }}
        </a>
      </td>
      <td>{{ $web->details }}</td>
      <td>{{ $web->created_by }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
