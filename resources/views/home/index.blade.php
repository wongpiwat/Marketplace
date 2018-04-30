@extends('layouts.master')

@section('content')
<?php
use Illuminate\Support\Facades\DB;
   $num_recommend =  count($recommend);
   if($num_recommend>4){
     $num_recommend = 4;
   }
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
          <!-- midcontent -->
          <div class="col-md-9" >
            <div id="demo" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">

                @for($i=0;$i<$num_recommend;$i++)
                <?php
                $screenshot = App\MarketImage::where('market_id',$recommend[$i]->id)->get();
                if(!$screenshot->isEmpty()) {
                  $screenshot = App\MarketImage::where('market_id',$recommend[$i]->id)->where('type','screenshot')->first()->path;
                } else {
                  $screenshot = null;
                }

                ?>
                @if($i == 0)
                <div class="carousel-item active">
                  <a href="{{ url('/markets/page/'.$recommend[$i]->id) }}">
                  <img src="{{ asset('storage/users/'.$recommend[$i]->created_by.'/markets/'.$recommend[$i]->id.'/'.$screenshot ) }}">
                   <div class="carousel-caption slide_description">
                      <div class="slide_description_space">
                        <h3>{{$recommend[$i]->name}}</h3>
                        <p>{{$recommend[$i]->location}}</p>
                      </div>
                   </div>

                   </a>
                </div>
                @else
                <div class="carousel-item">

                  <a href="{{ url('/markets/page/'.$recommend[$i]->id) }}">
                  <img src="{{ asset('storage/users/'.$recommend[$i]->created_by.'/markets/'.$recommend[$i]->id.'/'.$screenshot ) }}">
                  <div class="carousel-caption slide_description ">
                     <div class="slide_description_space">
                       <h3>{{$recommend[$i]->name}}</h3>
                       <p>{{$recommend[$i]->location}}</p>
                     </div>
                  </div>

                  </a>
                </div>
                @endif
                @endfor

              <a class="carousel-control-prev" href="#demo" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a>
              <a class="carousel-control-next" href="#demo" data-slide="next"> <span class="carousel-control-next-icon"></span> </a>
            </div>
            </div>
  <br>
  <!-- recommend -->
  <div class="row">
        <div class="col-md-6">
           <div class="card ">
             <div class="card-header" style="background-color:rgb(122,200,204);height:0px;"></div>
             <div class="card-header" style="color:rgb(122,200,204)"><h6>RECOMMENDED MARKET</h6></div>
             <div class="card-body">

               @for($i=0;$i<$num_recommend;$i++)
               <?php
               $screenshot = App\MarketImage::where('market_id',$recommend[$i]->id)->get();
               if(!$screenshot->isEmpty()) {
                 $screenshot = App\MarketImage::where('market_id',$recommend[$i]->id)->where('type','screenshot')->first()->path;
               } else {
                 $screenshot = null;
               }
               ?>
                  @if($i==0)
                  <div class="recommend "   style="">
                    @if($recommend[$i]->teaser!="")
                    <object width="100%" height="300px" data="http://www.youtube.com/v/{{ $recommend[$i]->teaser }}" type="application/x-shockwave-flash">
                      <param name="src" value="http://www.youtube.com/v/{{ $recommend[$i]->teaser }}" />
                    </object>
                    @else
                    <a href="{{ url('/markets/page/'.$recommend[$i]->id) }}"><img src="{{ asset('storage/users/'.$recommend[$i]->created_by.'/markets/'.$recommend[$i]->id.'/'.$screenshot ) }}" width="100%" height="300px" class="card"></a>

                    @endif
                    <br>

                     <h5 style="color: rgb(122,200,204);"><a href="{{ url('/markets/page/'.$recommend[$i]->id) }}">{{$recommend[$i]->name}}</a></h5>
                     <p>{{$recommend[$i]->location}}</p>

                  </div>
                  <hr>
                  @else
                  <div class="row">
                    <div class="col-md-3">
                        <a href="{{ url('/markets/page/'.$recommend[$i]->id) }}"><img src="{{ asset('storage/users/'.$recommend[$i]->created_by.'/markets/'.$recommend[$i]->id.'/'.$screenshot ) }}" width="90px" height="50px"></a>

                    </div>
                    <div class="col-md-9">
                      <div class="recent_description">
                        <a href="{{ url('/markets/page/'.$recommend[$i]->id) }}">{{$recommend[$i]->name}}</a>
                        <br>
                       <p>{{$recommend[$i]->location}}</p>

                      </div>
                    </div>

                  </div>
                  @if($i!=$num_recommend-1)
                  <hr>
                  @endif
                  @endif
               @endfor

            </div>
           </div>

        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header" style="background-color:rgb(230,84,61);height:0px;"></div>
            <div class="card-header">
           <h6 style="color:rgb(230,84,61)">MARKETS</h6>
            <span>
              <form class="" action="/display" method="get" style="float:right;position:relative;margin-top:-30px;">
                <input type="hidden" name="action" value="all">
                 <button type="submit" name="str" value="" class = "btn btn-info" style="font-size:14px;">All MARKETS</button>

              </form>
            </span>
            </div>
            <div class="card-body">
              <?php
              $lenth = count($markets) ;
              if($lenth>7){
                $lenth = 7;
              }
              ?>
              @for($i = 0; $i<$lenth;$i++)
              <?php
              $screenshot = App\MarketImage::where('market_id',$markets[$i]->id)->get();
              if(!$screenshot->isEmpty()) {
                $screenshot = App\MarketImage::where('market_id',$markets[$i]->id)->where('type','screenshot')->first()->path;
              } else {
                $screenshot = null;
              }
              ?>
              <?php
                $screenshot = DB::table('market_images')->where('market_id', '=', $markets[$i]->id)->where('type', '=','screenshot')->first()->path;
              ?>

              <div class="row">
                <div class="col-md-3">
                  <a href="{{ url('/markets/page/'.$markets[$i]->id) }}">  <img src="{{ asset('storage/users/'.$markets[$i]->created_by.'/markets/'.$markets[$i]->id.'/'.$screenshot ) }}" class="image_markets"></a>

                </div>
                <div class="col-md-9">
                  <div class="recent_description">
                    <a href="{{ url('/markets/page/'.$markets[$i]->id) }}">{{$markets[$i]->name}}</a>
                    <br>
                   <p> {{$markets[$i]->location}}</p>

                  </div>
                </div>

              </div>
              @if($i!=$lenth-1)
              <hr>
              @endif
              @endfor
            </div>

          </div>


        </div>

        <br>

  </div>
  <br>
<!-- markets UPCOMING -->
<div class="card" style="width:100%">
          <div class="card-header" style="background-color:#663399"></div>
          <div class="card-header" style="color:#663399">
            <h6>UPCOMING</h6></div>
          <div class="card-body">
   <!-- ----------------carousel slide-------------- -->
  <div id="demo2" class="carousel slide" data-ride="carousel">
  <!-- The slideshow -->
  <div class="carousel-inner">
      <?php
          $numslide = ceil(count($upcome)/3);
          $numupcome = count($upcome);
          if($numslide>2){
            $numslide = 2;
          }


          $count = 0;

       ?>
       <!-- ------------active------------------ -->
       @for($i=0;$i<$numslide;$i++)

       @if($i==0)
       <div class="carousel-item active">
       @else
       <div class="carousel-item ">
       @endif
         <div class="row">

           @for($j=0;$j<=$numupcome;$j++)
           <?php
           $screenshot = App\MarketImage::where('market_id',$upcome[$i]->id)->get();
           if(!$screenshot->isEmpty()) {
             $screenshot = App\MarketImage::where('market_id',$upcome[$i]->id)->where('type','screenshot')->first()->path;
           } else {
             $screenshot = null;
           }
           ?>
           <div class="col-md-4  ">
                   <a href="{{ url('/markets/page/'.$upcome[$count]->id) }}"><img class="card-img-top" src="{{ asset('storage/users/'.$upcome[$i]->created_by.'/markets/'.$upcome[$i]->id.'/'.$screenshot ) }}" alt="Card image" style="width:100%;height:150px;">
                   <h5 class="card-title" style="margin-top:5px">   {{$upcome[$count]->name}}</h5></a>
                   <p class="card-text" style="margin-top:-10px;">{{DateEng($upcome[$count]->start_day)[0]}}</p>

           </div>
           <?php $count++;
                $numupcome--;
            ?>
           @if($j==2)
             @break
           @endif
           @endfor

         </div>
       </div>
       @endfor
    <!-- -----------------end_active------------------ -->


  </div>
  <!-- -------------end_This_slide_show----------------------------------- -->

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo2" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo2" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!-- ----------------end_carousel slide-------------- -->
</div>
<!-- --------------------end_card_body--------------------- -->


</div>
<!-- end UPCOMING -->



</div>
  <!-- end-midcontent -->
  <br><br><br>

          <!-- right-column -->
          <div class="col-md-3" >

            <form  action="/display" class="form-inline" style="margin-left:-10px; width:110%;" method="get">
              <input class="form-control " name="str" type="text" placeholder="Search.." style="width:110%;">
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
                <a href="/feedbacks/create" class="text-social">Feedback</a></span>


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
                $screenshot = App\MarketImage::where('market_id',$recent[$i]->id)->get();
                if(!$screenshot->isEmpty()) {
                  $screenshot = App\MarketImage::where('market_id',$recent[$i]->id)->where('type','screenshot')->first()->path;

                } else {
                  $screenshot = null;

                }
                ?>
                <div class="row">
                  <div class="col-md-5">
                    <a href="{{ url('/markets/page/'.$recent[$i]->id) }}">  <img src="{{ asset('storage/users/'.$recent[$i]->created_by.'/markets/'.$recent[$i]->id.'/'.$screenshot ) }}" class="image_recent" style="margin-top:3px;" ></a>
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
          <!-- end row -->
        </div>
        <!-- end container -->
</div>
@endsection
