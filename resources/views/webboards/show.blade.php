@extends('layouts.master')

@push('style')
<style>
.container {
  min-height: 0%;
}
</style>
@endpush
@section('content')
<?php
  $firstnameCreated = DB::table('users')->where('id', $webboard->created_by)->value('first_name');
  $lastnameCreated = DB::table('users')->where('id', $webboard->created_by)->value('last_name');
?>
@foreach($replys as $p)
<?php
  $replyFirstName = DB::table('users')->where('id', $p->created_by)->value('first_name');
  $replyLastName = DB::table('users')->where('id', $p->created_by)->value('last_name');
?>
@endforeach
<p><a href="/webboards">Webboards</a><span> > </span> <span>{{ $webboard->topic }}</span></p>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
  <div class="card-header">
  <h2>{{ $webboard->topic }}</h2>
  </div>
  <div class="media border p-3">
    <?php
    $imgUserTopic = DB::table('users')->where('id', $webboard->created_by)->value('image');
    // dd($imgUserTopic);
    ?>
     @if (   $imgUserTopic   == null ||  $imgUserTopic ==='default' )
     <img src=" {{ asset('images/user.png') }}" alt="Jane Doe" class="mr-3 mt-3 rounded-circle" style="width:60px; border-radius: 25px; ">
     @else
     <img src=" {{ asset('storage/users/'.$webboard->created_by.'/profile/'.$imgUserTopic ) }}" alt="Jane Doe" class="mr-3 mt-3 rounded-circle" style="width:45px; border-radius: 25px;">
     @endif
    <div class="media-body">
      <h4>{{ $firstnameCreated }} {{ $lastnameCreated }} <small style="font-size:15px;"><i>Posted on {{ $webboard->created_at }}</i></small></h4>
      <p> {{ $webboard->details }} </p>
        <button style="border-radius: 25px;" class ="btn btn-warning" name="edit"  class="btn btn-info btn-lg" data-toggle="modal" data-target="#EditTopicModal">Edit</button>
    <div>
      @if(\Auth::user()->id == $webboard->created_by)
      <form action="/webboards/{{ $webboard->id }}" method="post" class="has-confirm" data-message="Delete?">
      @csrf
      @method('DELETE')
      <input type="submit" class ="btn btn-danger"  value="Delete" style="border-radius: 25px;">
      </form>
      @endif
    </div>

      @foreach($replys as $p)
      <?php
      $replyFirstName = DB::table('users')->where('id', $p->created_by)->value('first_name');
      $replyLastName = DB::table('users')->where('id', $p->created_by)->value('last_name');
      $imgUser = DB::table('users')->where('id', $p->created_by)->value('image');
      ?>
      <div class="media p-3">
        @if (   $imgUser   == null ||  $imgUser ==='default')
        <img src=" {{ asset('images/user.png') }}" alt="Jane Doe" class="mr-3 mt-3 rounded-circle" style="width:45px; border-radius: 25px;">
        @else
        <img src=" {{ asset('storage/users/'.$p->created_by.'/profile/'.$imgUser ) }}" alt="Jane Doe" class="mr-3 mt-3 rounded-circle" style="width:45px; border-radius: 25px;">
        @endif
        <div class="media-body">
          <h4>{{ $replyFirstName }} {{ $replyLastName }} <small style="font-size:15px;"><i>Posted on {{ $p->created_at }}</i></small></h4>
          <p>
          {{ $p->comment }}
         </p>
         <button style="border-radius: 25px;" class ="btn btn-warning" name="edit"  class="btn btn-info btn-lg" data-toggle="modal" data-target="#EditmyModal" data-title="{{ $p->comment }}" data-comment="{{ $p->comment }}"  data-id="{{ $p->id}}">Edit</button>
         <form action="/webboards/{{ $webboard->id }}/{{ $p->id }}" method="post" class="has-confirm" data-message="Delete?">
           @csrf
           @method('DELETE')
          <button type="submit" class ="btn btn-danger"  value="Delete" style="border-radius: 25px;">Delete</button>
        </form>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<div>
  <button  style="border-radius: 25px;" class ="btn btn-primary" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"> Reply</button>
</div>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Create Comment</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>


        <div class="modal-body">
        <form action="/webboards/{{ $webboard->id }}/addComment" method="post">
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





<!-- <button  class ="btn btn-warning" class="btn btn-info btn-lg" data-comment="" data-toggle="modal" data-target="#EditmyModal"> Edit</button> -->

<div class="modal fade" id="EditmyModal" role="dialog">

<div class="modal-dialog">
<div class="modal-content">

  <div class="modal-body">
  <form action="/webboards/{{ $webboard->id }}/updateComment" method="post">

    <p>Comment </p>
      <div class="">


      <textarea name="pointComment" style="display:none;" id="objectComment"  style='width:10%' rows="8" col="1200"></textarea>

      <div class="fetched-data"></div>
          <textarea name="commentEdit" id="com"  style='width:100%' rows="8" col="1200"></textarea>
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

<script>
$(function() {
    $('#EditmyModal').on("show.bs.modal", function (e) {
         $("#com").html($(e.relatedTarget).data('comment'));
         $("#objectComment").html($(e.relatedTarget).data('id'));
    });

    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });

    $(".delete btn btn-danger").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
});
</script>
@endsection

<div class="modal fade" id="EditTopicModal" role="dialog">
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


    <form action='/webboards/{{ $webboard->id }}/updateTopic' method="post">
    {{ csrf_field() }}
    {{ $errors->first('name') }}
        <div class="">
        <label> Topic: </label>
        <input type="text" name="topicEdit" value="{{$webboard->topic }}">
        </div>
        <div class="">
        <label>Details:</label>
        <textarea
            name="detailsEdit"
            rows="8"
            col="80">{{$webboard->details }}</textarea>
        </div>
    <button class="btn btn-success" type="submit">Submit</button>
    </form>
        </div>
      </div>
    </div>
  </div>


  @push('script')
  <script>
  $("form.has-confirm").submit(function (e) {
    var $message = $(this).data('message');
    if(!confirm($message)){
      e.preventDefault();
    }
  });
  </script>
  @endpush
