@extends('layouts.master')

@push('style')
    <style>
    #map {
    height: 400px;

    border-radius: 5px;
    border: 1px solid silver;
    }
    </style>
@endpush

@section('content')
<?php
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
  <p><a href="/">Marketplace</a><span> > </span> <a href="/display?action=all&str=">All Markets</a><span> > </span><span>{{ $market->name }}</span></p>
  <h1>{{ $market->name }}</h1>
  <div class="row">

    <div class="col-md-9" >
      <div id="demo" class="carousel slide" data-ride="carousel" >
        <div class="carousel-inner" >
          @if(!$screenshots->isEmpty())
          @foreach($screenshots as $screenshot)
          @if($count == 0)
          <div class="carousel-item active">
             <img src="{{ asset('storage/users/'.$market->created_by.'/markets/'.$market->id.'/'.$screenshot->path ) }}">
          </div>
          {{!! $count++ }}
          @else
          <div class="carousel-item">
            <img src="{{ asset('storage/users/'.$market->created_by.'/markets/'.$market->id.'/'.$screenshot->path ) }}">
          </div>
          @endif
          @endforeach
          @endif
        <a class="carousel-control-prev" href="#demo" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a>
        <a class="carousel-control-next" href="#demo" data-slide="next"> <span class="carousel-control-next-icon"></span> </a>
      </div>
      <br>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header" style="background-color:#006cd8">
            </div>
            <div class="card-body">
              <span style="font-size:26px">{{ $market->name }}</span>
              @php
                $has_empty = false;
              @endphp
              @foreach($market->zones as $zone)
                @foreach($zone->reservations as $reservaion)
                  @if($reservaion->reserved_by == null)
                    @php
                      $has_empty = true;
                    @endphp
                  @endif
                @endforeach
              @endforeach
              @if($has_empty)
                @if(\Auth::user()->type == 'seller')
                  <?php
                    $now = Carbon\Carbon::now();
                    $year = $now->year;
                    $month = $now->month;
                    $day = $now->day;
                    $dayMarketStart = explode("-",$market->start_day);
                    $yearStart = $dayMarketStart[0];
                    $monthStart = $dayMarketStart[1];
                    $dayStart = $dayMarketStart[2];
                   ?>
                  @if($year <= $yearStart && $month <= $monthStart && $day < $dayStart)
                    <a class="btn btn-primary" style="float:right;font-size:20px;" href="{{ url('/reservations/create/'. $market->id) }}">Reserve</a>
                  @else
                    <a class="btn" style="float:right;font-size:20px;pointer-events: none;cursor: default;background-color:gray;color:white" >Reserve</a>
                  @endif
                @else
                  <a class="btn" style="float:right;font-size:20px;pointer-events: none;cursor: default;background-color:gray;color:white" >Reserve</a>
                @endif
              @else
                <a class="btn" style="float:right;font-size:20px;pointer-events: none;cursor: default;background-color:gray;color:white" >Reserve</a>
              @endif
            </div>
            </div>
            <br>
            <div class="card">
              <div class="card-header" style="background-color:#663399">
              </div>
              <div class="card-header">
                DESCRIPTION
              </div>
                  <div class="card-body">
                    {{ $market->description }}
                  </div>
              </div>
              <br>
              @if(!$screenshots->isEmpty())
              <div class="card">
                <div class="card-header" style="background-color:#663399">
                </div>
                <div class="card-header">
                  LAYOUT
                </div>
                    <div class="card-body">
                      <img class="img-fluid" src="{{ asset('storage/users/'.$market->created_by.'/markets/'.$market->id.'/'.$layout[0]->path ) }}">
                    </div>
                </div>
                @endif
        </div>

        <div class="col-md-6">
          <br>
          <div class="card">
            <div class="card-header" style="background-color:rgb(122,200,204);height:0px;">
            </div>
            <div class="card-header">
              MAP
            </div>
            <input hidden type="text" id="lat_value" value="{{ $market->latitude }}">
            <input hidden type="text" id="lng_value" value="{{ $market->longitude }}">
            <div class="card-body">
              <div id="map"></div>
            </div>
          </div>
        </div>

        @if($market->teaser != null)
        <div class="col-md-6">
          <br>
          <div class="card">
            <div class="card-header" style="background-color:rgb(230,84,61);">
            </div>
            <div class="card-header">
              VIDEO TEASER
            </div>
            <div class="card-body">
              <object width="100%" height="400px" data="http://www.youtube.com/v/{{  $market->teaser  }}" type="application/x-shockwave-flash">
                <param name="src" value="http://www.youtube.com/v/{{  $market->teaser  }}" />
              </object>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
</div>

    <!-- right-column -->
    <div class="col-md-3" >
      <div class="card" style="width:110%;margin-left:-10px;">
        <div class="card-header color-card">
          <h6>DATE</h6>
        </div>
        <div class="card-body">
          <img src="{{ asset('images/date.png') }}" class="image-social "><span> {{ DateEng($market->start_day)[0] }} - {{ DateEng($market->close_day)[0] }}</span>
          <hr>
          <img src="{{ asset('images/time.png') }}" class="image-social"><span> {{ DateEng($market->start_time)[1] }} - {{ DateEng($market->close_time)[1] }}</span>
          <hr>
        </div>
      </div>

      <br>

      <div class="card" style="width:110%;margin-left:-10px;">
        <div class="card-header color-card">
          <h6>LOCATION</h6>
        </div>
        <div class="card-body">
          <img src="{{ asset('images/address.png') }}" class="image-social "><span> {{ $market->location }}</span>
          <hr>
        </div>
      </div>

      <br>

      <div class="card " style="width:110%;margin-left:-10px; ">
        <div class="card-header color-card">
          <h6>CONTACT</h6>
        </div>
        <div class="card-body">
          <img src="{{ asset('images/organizer.png') }}" class="image-social "><span> {{ $market->organizer_name }}</span>
          <hr>
          <img src="{{ asset('images/contact.png') }}" class="image-social "><span> {{ $market->contact_name }}</span>
          <hr>
          <img src="{{ asset('images/email.png') }}" class="image-social "><span> {{ $market->email }}</span>
          <hr>
          <img src="{{ asset('images/phone.png') }}" class="image-social "><span> {{ $market->phone }}</span>
          <hr>
        </div>
      </div>

      <br>

      <div class="card " style="width:110%;margin-left:-10px; ">
        <div class="card-header color-card">
          <h6>HELP</h6>
        </div>
        <div class="card-body">
          <img src="{{ asset('images/question.png') }}" class="image-social "><a href="/support/{{ $market->id }}"> Support</a>
          <hr>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection

@push('script')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC18bWr7foVxKW45n29XTfqOSryrlVBKfM&callback=initMap"></script>
<!-- google map api key: AIzaSyC18bWr7foVxKW45n29XTfqOSryrlVBKfM -->
<script>

  function initMap() {
    console.log(document.getElementById("lat_value").value);
    var location = {lat: 13.75398, lng: 100.50144};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: location
    });
     var mapCenter = new google.maps.LatLng(document.getElementById("lat_value").value, document.getElementById("lng_value").value);
     new google.maps.Marker({
         position: mapCenter,
         map: map
     });
     map.setCenter(mapCenter);
  }
</script>
@endpush
