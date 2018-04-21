@extends('layouts.master')
@push('style')

<link rel="stylesheet" href="/css/homepageCSS.css">


@endpush


@section('content')

      <br><br><br><br><br>
      <div class="container" style=" width:100%;margin-top:30px;">
        <div class="row">
          <div class="col-md-9" >
            <div id="demo" class="carousel slide" data-ride="carousel" >
  <!-- <ul class="carousel-indicators" >
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul> -->
  <div class="carousel-inner" >
    <div class="carousel-item active">
      <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/fashion-blogger.jpg">
      <div class="carousel-caption slide_description ">
         <div class="slide_description_space">
           <h3>Los Angeles</h3>
           <p>We had such a great time in LA!</p>

         </div>

      </div>
    </div>
    <div class="carousel-item">
      <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/012.jpg" >
      <div class="carousel-caption slide_description " >
        <div class="slide_description_space">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>

        </div>



      </div>
    </div>
    <div class="carousel-item">
      <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/11/flowers.jpg" >
      <div class="carousel-caption slide_description "  >
        <div class="slide_description_space">
          <h3>NEW YORK</h3>
          <p>Thank you, New York!</p>

        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
  </div>


  </div>
  <!-- end-col-8 -->


          <div class="col-md-3" >
            <form class="form-inline" style="margin-left:-10px; width:110%;">
              <input class="form-control " type="text" placeholder="Search.." style="width:110%;">
            </form>
            <br>
            <div class="card " style="width:110%;margin-left:-10px;">
              <div class="card-header color-card"><h6>RECENT POST</h6></div>
              <div class="card-body">

              </div>
            </div>
            <br>

            <div class="card " style="width:110%;margin-left:-10px; ">
              <div class="card-header color-card"><h6>FOLLOW US</h6></div>
              <div class="card-body">
                <img src="https://cdn4.iconfinder.com/data/icons/social-media-icons-the-circle-set/48/facebook_circle-512.png" alt=""class="image-social ">
                <span><a href="#" class="text-social">FACEBOOK</a></span>

                <hr>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/YouTube_social_red_circle_%282017%29.svg/2000px-YouTube_social_red_circle_%282017%29.svg.png" alt="" class="image-social">
                <span>
                <a href="#" class="text-social">YOUTUBE</a></span>
                <hr>
                <img src="https://sguru.org/wp-content/uploads/2018/01/instagram-colourful-icon.png" alt="" class="image-social">
                <span>
                <a href="#" class="text-social">INSTAGRAM</a></span>

              </div>
            </div>


		      </div>


          </div>
          <!-- end row -->

        </div>
        <!-- end container -->

</div>


@endsection
