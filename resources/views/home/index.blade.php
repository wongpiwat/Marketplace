@extends('layouts.master')
@push('style')

@endpush


@section('content')

{{ $markets[0]->description }}


      <div class="container">
        <div class="row">
          <!-- midcontent -->
          <div class="col-md-9" >
            <div id="demo" class="carousel slide" data-ride="carousel" >

  <div class="carousel-inner" >
    <div class="carousel-item active">
      <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/fashion-blogger.jpg">
      <div class="carousel-caption slide_description ">
         <div class="slide_description_space">
           <h3>มินs</h3>
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
  <br>
  <!-- recommend -->
  <div class="row">
        <div class="col-md-6">
           <div class="card">
             <div class="card-header" style="background-color:rgb(122,200,204);height:0px;"></div>
             <div class="card-header">RECOMMEND</div>
             <div class="card-body">
               <div class="recommend">
                 <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/012.jpg" alt="" style="width:100%;height:100%">
                 <br>
                 <br>
                  <h6 style="color: rgb(122,200,204);"><a href="#">NULLA QUIS LACUS TURPIS</a></h6>
                  <p> NOV 18,2015</p>

               </div>
               <hr>
               <div class="row">
                 <div class="col-md-3">
                   <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/fashion-blogger.jpg" alt="" class="image_recent" >

                 </div>
                 <div class="col-md-9">
                   <div class="recent_description">
                     <a href="#">Blogging For Fashion</a>
                     <br>
                    <p> DEC 2,2015</p>

                   </div>
                 </div>

               </div>
               <hr>
               <div class="row">
                 <div class="col-md-3">
                   <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/012.jpg" alt="" class="image_recent" >

                 </div>
                 <div class="col-md-9">
                   <div class="recent_description">
                     <a href="#">Blogging For Fuji</a>
                     <br>
                    <p> NOV 18,2015</p>

                   </div>
                 </div>

               </div>
               <hr>
               <div class="row">
                 <div class="col-md-3">
                   <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/11/flowers.jpg" alt="" class="image_recent" >

                 </div>
                 <div class="col-md-9">
                   <div class="recent_description">
                     <a href="#">Blogging For Flowers</a>
                     <br>
                    <p> MAY 22,2015</p>

                   </div>
                 </div>

               </div>


             </div>

           </div>

        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header" style="background-color:rgb(230,84,61);height:0px;"></div>
            <div class="card-header">Markets</div>
            <div class="card-body">

              <div class="row">
                <div class="col-md-3">
                  <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/11/flowers.jpg" alt="" class="image_recent" >

                </div>
                <div class="col-md-9">
                  <div class="recent_description">
                    <a href="#">Blogging For Flowers</a>
                    <br>
                   <p> MAY 22,2015</p>

                  </div>
                </div>

              </div>
              <hr>
              <div class="row">
                <div class="col-md-3">
                  <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/11/flowers.jpg" alt="" class="image_recent" >

                </div>
                <div class="col-md-9">
                  <div class="recent_description">
                    <a href="#">Blogging For Flowers</a>
                    <br>
                   <p> MAY 22,2015</p>

                  </div>
                </div>

              </div>


            </div>

          </div>

        </div>

  </div>


  </div>
  <!-- end-midcontent -->
  <br><br><br>

          <!-- right-column -->
          <div class="col-md-3" >
            <form class="form-inline" style="margin-left:-10px; width:110%;">
              <input class="form-control " type="text" placeholder="Search.." style="width:110%;">
            </form>
            <br>
            <!-- recent post -->
            <div class="card " style="width:110%;margin-left:-10px;">
              <div class="card-header color-card"><h6>RECENT POST</h6></div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/fashion-blogger.jpg" alt="" class="image_recent" >

                  </div>
                  <div class="col-md-9">
                    <div class="recent_description">
                      <a href="#">Blogging For Fashion</a>
                      <br>
                     <p> DEC 2,2015</p>

                    </div>
                  </div>

                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/12/012.jpg" alt="" class="image_recent" >

                  </div>
                  <div class="col-md-9">
                    <div class="recent_description">
                      <a href="#">Blogging For Fuji</a>
                      <br>
                     <p> NOV 18,2015</p>

                    </div>
                  </div>

                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <img src="https://www.elegantthemes.com/preview/Extra/wp-content/uploads/2015/11/flowers.jpg" alt="" class="image_recent" >

                  </div>
                  <div class="col-md-9">
                    <div class="recent_description">
                      <a href="#">Blogging For Flowers</a>
                      <br>
                     <p> MAY 22,2015</p>

                    </div>
                  </div>

                </div>

              </div>
            </div>
            <br>
            <!-- follow us -->
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
