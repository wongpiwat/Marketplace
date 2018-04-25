@extends('layouts.master')

@section('content')
<?php
   $num_recommend =  count($recommend);
   if($num_recommend>4){
     $num_recommend = 4;
   }
?>
      <div class="container">
        <div class="row">
          <!-- midcontent -->
          <div class="col-md-9" >
            <div id="demo" class="carousel slide" data-ride="carousel" >

  <div class="carousel-inner" >
      @for($i=0;$i<$num_recommend;$i++)
      @if($i==0)
      <div class="carousel-item active">
        <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/fashion-blogger.jpg">
        <div class="carousel-caption slide_description ">
           <div class="slide_description_space">
             <h3>{{$recommend[$i]->name}}</h3>
             <p>{{$recommend[$i]->location}}</p>

           </div>

        </div>
      </div>
      @else

      <div class="carousel-item">
        <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/012.jpg" >
        <div class="carousel-caption slide_description " >
          <div class="slide_description_space">
            <h3>{{$recommend[$i]->name}}</h3>
            <p>{{$recommend[$i]->location}}</p>

          </div>
        </div>
      </div>
      @endif
      @endfor







  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
  </div>
  <br>
  <!-- recommend -->
  <div class="row">
        <div class="col-md-6">
           <div class="card ">
             <div class="card-header" style="background-color:rgb(122,200,204);height:0px;"></div>
             <div class="card-header">RECOMMENDED MARKET</div>
             <div class="card-body">

               @for($i=0;$i<$num_recommend;$i++)
                  @if($i==0)
                  <div class="recommend "   style="">
                    <img class=""src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/012.jpg" alt=""  style="width:100%;">
                    <br>
                    <br>
                     <h6 style="color: rgb(122,200,204);"><a href="#">{{$recommend[$i]->name}}</a></h6>
                     <p>{{$recommend[$i]->location}}</p>

                  </div>
                  <hr>
                  @else
                  <div class="row">
                    <div class="col-md-3">
                      <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/fashion-blogger.jpg" alt="" class="image_recent" style="width:75px; margin-top:5px;" >

                    </div>
                    <div class="col-md-9">
                      <div class="recent_description">
                        <a href="#">{{$recommend[$i]->name}}</a>
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
            <div class="card-header">MARKETS</div>
            <div class="card-body">
              <?php
              $lenth = count($markets) ;
              if($lenth>6){
                $lenth = 6;
              }


              ?>
              @for($i = 0; $i<$lenth;$i++)

              <div class="row">
                <div class="col-md-3">
                  <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/11/flowers.jpg" alt="" class="image_recent" style="width:75px; margin-top:5px;" >

                </div>
                <div class="col-md-9">
                  <div class="recent_description">
                    <a href="#">{{$markets[$i]->name}}</a>
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
          <div class="card" style="background-color:rgb(247,247,247);" >
            <div class="card-header" style="height:43px;">
                <center><a href="#" style="color:rgb(230,84,61);" class="">More</a></center>

            </div>


          </div>

        </div>

        <br>

  </div>
  <br>
<!-- markets Today -->
<div class="card" style="width:100%">
          <div class="card-header" style="background-color:#663399"></div>
          <div class="card-header">UPCOMING</div>
          <div class="card-body">

  <div id="demo2" class="carousel slide" data-ride="carousel">


  <!-- The slideshow -->
  <div class="carousel-inner">

    <div class="carousel-item active">
      <div class="row">
        <div class="col-md-4  ">
              <div class="card img-fluid">
                <img class="card-img-top" src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/fashion-blogger.jpg" alt="Card image" style="width:100%;height:150px;">
                <h4 class="card-title">John Doe</h4>
                <p class="card-text">่ก่ก่</p>


              </div>




        </div>
        <div class="col-md-4">
              <div class="card img-fluid">
                <img class="card-img-top" src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/fashion-blogger.jpg" alt="Card image" style="width:100%;height:150px;">
                <h4 class="card-title">John Doe</h4>
                <p class="card-text">่ก่ก่</p>

              </div>

        </div>
        <div class="col-md-4">
              <div class="card img-fluid">
                <img class="card-img-top" src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/fashion-blogger.jpg" alt="Card image" style="width:100%;height:150px;">
                <h4 class="card-title">John Doe</h4>
                <p class="card-text">่ก่ก่</p>

              </div>


        </div>
      </div>


    </div>
    <div class="carousel-item ">

      <div class="row">
            <div class="col-md-4  ">
              <div class="card img-fluid" style="">
                  <img class="card-img-top" src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/11/flowers.jpg" alt="Card image" style="width:100%;height:150px;">

                  <h4 class="card-title">John Doe</h4>
                  <p class="card-text">่ก่ก่</p>


                </div>

            </div>
            <div class="col-md-4">
              <div class="card img-fluid" style="">
                  <img class="card-img-top" src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/11/flowers.jpg" alt="Card image" style="width:100%;height:150px;">

                  <h4 class="card-title">John Doe</h4>
                  <p class="card-text">่ก่ก่</p>


                </div>

            </div>
            <div class="col-md-4">
              <div class="card img-fluid" style="">
                  <img class="card-img-top" src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/11/flowers.jpg" alt="Card image" style="width:100%;height:150px;">

                  <h4 class="card-title">John Doe</h4>
                  <p class="card-text">่ก่ก่</p>


                </div>

            </div>
          </div>

    </div>

  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo2" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo2" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
          </div>

</div>
<!-- endmarketToday -->




  </div>
  <!-- end-midcontent -->
  <br><br><br>

          <!-- right-column -->
          <div class="col-md-3" >

            <form class="form-inline" style="margin-left:-10px; width:110%;">
              <input class="form-control " type="text" placeholder="Search.." style="width:110%;">
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
                <hr>

              </div>
            </div>
            <br>

            <!-- recent post -->
            <div class="card " style="width:110%;margin-left:-10px;">
              <div class="card-header color-card"><h6>RECENT POST</h6></div>
              <div class="card-body">
                <?php
                  $num_recentpost = count($markets);
                  if($num_recentpost>4){
                    $num_recentpost = 4;
                  }

                ?>
                @for($i=$num_recentpost;$i>0;$i--)
                <div class="row">
                  <div class="col-md-3">
                    <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/fashion-blogger.jpg" alt="" class="image_recent" style="margin-top:3px;" >

                  </div>
                  <div class="col-md-9">
                    <div class="recent_description">
                      <a href="#">{{$markets[$i]->name}}</a>
                      <br>
                     <p>{{$markets[$i]->location}}</p>

                    </div>
                  </div>
                  </div>
                  @if($i!=0)
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

              </div>

            </div>



		      </div>


          </div>
          <!-- end row -->

        </div>
        <!-- end container -->

</div>


@endsection

@section('content-footer')
<footer class="card-footer">
  <div class="container">
    <p>Marketplace Corporation</p>
    <p>302, Ngamwongwan Road, Lat Yao Sub-district</p>
    <p>Chatuchak District, Bangkok, Thailand, 10900</p>
    <hr>
    <span>© Marketplace 2018</span>
  </div>
</footer>
@endsection
