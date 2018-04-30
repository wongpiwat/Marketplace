@extends('home.management')
@section('content')

@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<section id="contact">
  <form action="/feedbacks" method="post">
    @csrf
    <div class="card">
      <div class="card-header">
        <h1>Feedback</h1>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-6">
              <label class="col-md-2 text-md-right" style="margin-left:12%">Topic</label>
              <input type="text" name="topic"><br><br>
            </div>
        </div>
        <label class="col-md-2 text-md-right">Message</label>
        <center><textarea class="form-control" rows="5" name="comment" style="width:80%">{{ old('description') }}</textarea></center>
      </div>

      <div class="card-footer">
         <button type="submit" class="btn btn-primary" style="float:none"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Message</button>
      </div>
    </div>
  </form>
</section>
@endsection
