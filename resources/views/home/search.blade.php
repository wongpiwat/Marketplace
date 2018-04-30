@extends('layouts.master')
@section('content')
<?php
use Illuminate\Support\Facades\DB;
function DateEng($strDate){
  $strYear = date("Y",strtotime($strDate));
  $strMonth= date("n",strtotime($strDate));
  $strDay= date("j",strtotime($strDate));
  $strHour= date("H",strtotime($strDate));
  $strMinute= date("i",strtotime($strDate));
  $strSeconds= date("s",strtotime($strDate));
  $strMonthCut = Array("","JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC");
  $strMonthEng=$strMonthCut[$strMonth];
  return array("$strMonthEng $strDay, $strYear ","$strHour:$strMinute");
}

?>
<div class="container">
  <div class="row">
    <div class="col-md-9" style="height:auto">

      @if($action=='search')
        @if($text=="")
        <h4>{{"SEARCH RESULT FOR: ' '"}}</h4>
        @else

        <h4 style=""> {{"SEARCH RESULT FOR: ".$text}}</h4>
        @endif
      @elseif($action=='all')
        <h3>All MARKETS</h3>

      @endif
      <div class="card" style="width:100%;height:auto">
        <div class="card-header" style="background-color:#FF6666;height:0px"></div>
        <div class="card-body">
          @if(count($search)==0)
            <h6>SORRY, NO POSTS FOUND</h6>
          @else
            <?php $count = count($search); ?>
             @for($i=0;$i<$count;$i++)
             <?php
             $screenshot = DB::table('market_images')->where('market_id',$search[$i]->id)->get();
             if(!$screenshot->isEmpty()) {
               $screenshot = DB::table('market_images')->where('market_id',$search[$i]->id)->where('type','screenshot')->first()->path;
             } else {
               $screenshot = null;
             }

             ?>
             <div class="row">
               <div class="col-md-6">
                  <a href="{{ url('/markets/page/'.$search[$i]->id) }}">
                  <img src="{{ asset('storage/users/'.$search[$i]->created_by.'/markets/'.$search[$i]->id.'/'.$screenshot ) }}" alt="" style="width:100%;height:250px;">
                  </a>
                 <br>

               </div>
               <div class="col-md-6">
                <?php
                    $user  = \App\User::where('id',$search[$i]->created_by)->first();
                 ?>
               <a href="{{ url('/markets/page/'.$search[$i]->id) }}"><h5 style="color:rgb(122,200,204);">{{$search[$i]->name}}</h5></a>


                <p style="color:gray;font-size:12px;">{{'Posted By '.$user->first_name.' '.$user->last_name.' | '.DateEng($search[$i]->created_at)[0]}}</p>
                <p style="color:gray;font-size:12px;">{{$search[$i]->description}}</p>
                <a class="btn btn-info" href="{{ url('/markets/page/'.$search[$i]->id) }}"><b>READ MORE</b></a>

               </div>

             </div>
             <hr>

             @endfor


                 <div class="" style="float:right">
                   {{$search->links()}}

                 </div>






          @endif

        </div>

      </div>











    </div>
    <div class="col-md-3">
      <form  action="/display" class="form-inline" style="margin-left:-10px; width:110%;" method="get">
        <input class="form-control " name="str" type="text" value="{{ old($text) }}" placeholder="Search.." style="width:110%;">
        <input type="hidden" name="action" value="search">

      </form>
      <br>

      <!-- follow us -->
      <div class="card " style="width:110%;margin-left:-10px; ">
        <div class="card-header color-card"><h6>LINKS</h6></div>
        <div class="card-body">
          <img src="{{ asset('images/webboards.png') }}" class="image-social">
          <span><a href="/webboards" class="text-social">Webboards</a></span>

          <hr>
          <img src="{{ asset('images/feedback.png') }}" class="image-social">
          <span>
          <a href="/feedback" class="text-social">Feedback</a></span>


        </div>
      </div>
      <br>

      <!-- recent post -->
      <div class="card " style="width:110%;margin-left:-10px;">
        <div class="card-header color-card"><h6>RECENT MARKETS</h6></div>
        <div class="card-body">
          <?php
            $num_recentpost = count($recent);
            if($num_recentpost>4){
              $num_recentpost = 4;
            }

          ?>
          @for($i=0;$i<$num_recentpost;$i++)
          <?php
          $screenshot = DB::table('market_images')->where('market_id',$recent[$i]->id)->get();
          if(!$screenshot->isEmpty()) {
            $screenshot = DB::table('market_images')->where('market_id',$recent[$i]->id)->where('type','screenshot')->first()->path;
          } else {
            $screenshot = null;
          }
          ?>
          <div class="row">
            <div class="col-md-5">
              <a href="{{ url('/markets/page/'.$recent[$i]->id) }}">
              <img src="{{ asset('storage/users/'.$recent[$i]->created_by.'/markets/'.$recent[$i]->id.'/'.$screenshot ) }}" alt="" class="image_recent" style="margin-top:3px;" >
              </a>
            </div>
            <div class="col-md-7">
              <div class="recent_description">
                <a href="{{ url('/markets/page/'.$recent[$i]->id) }}">{{$recent[$i]->name}}</a>
                <br>
               <p>{{$recent[$i]->location}}</p>

              </div>
            </div>
            </div>
            @if($i!=$num_recentpost-1)
            <hr>
            @endif
          @endfor
        </div>
      </div>
      <br>

      <!-- webboard last -->
      <div class="card" style="width:110%;margin-left:-10px; ">
        <div class="card-header color-card"><h6>RECENT WEBOARD</h6></div>
        <div class="card-body">

          <?php
             $numBoard = count($webboard);
             if($numBoard>4){
               $numBoard = 4;

             }

           ?>
           @for($i=0;$i<$numBoard;$i++)
           <?php
              $user =  \App\User::where('id',$webboard[$i]->created_by)->first();

            ?>
           <div class="row">
             <div class="col-md-3">
               @if (   $user->image   == null ||  $user->image ==='default' )
               <img src=" {{ asset('images/user.png') }}"  class="rounded-circle" style="width:60px;height: 60px;margin-top: 3px;">
               @else
               <img src="{{ asset('storage/users/'.$webboard[$i]->created_by.'/profile/'.$user->image ) }}" alt="" class="rounded-circle" style="margin-top:3px;width:60px;height: 60px;" >
               @endif
             </div>
             <div class="col-md-9">
               <div class="recent_description">
                 <a href="{{ url('/webboards/'.$webboard[$i]->id) }}">{{$webboard[$i]->topic}}</a>
                 <br>
                 <p>{{'Posted By '.$user->first_name.' '.$user->last_name.' | '.DateEng($webboard[$i]->created_at)[0]}}</p>

               </div>
             </div>
             </div>
             @if($i!=$numBoard-1)
             <hr>
             @endif
           @endfor

        </div>

      </div>


    </div>

  </div>

</div>

@endsection
