@extends('layouts.master')

@push('style')
<link rel="stylesheet" href="/css/jquery-clockpicker.min.css">
    <style>
    p , span {
      font-size: 18px;
    }
    #map {
    height: 400px;

    border-radius: 5px;
    border: 1px solid silver;
    }

    .red {
      color: red;
    }

    .day-padding {
      margin-left:1%
    }
    </style>
@endpush

@section('content')
<div class="card">
  <div class="card-header">Create Market</div>
  <div class="card-body">
    <form action="/market" method="post" enctype="multipart/form-data">
      @csrf
      <label><b>Market Name<span class="red">*</span></b></label>
      <input type='text' name='name' value='{{ old('name') }}'><br>
      <label><b>Location<span class="red">*</span></b></label>
      <input type='text' name='location' value='{{ old('location') }}'><br>

      <label><b>Start Time<span class="red">*</span></b></label>
      <input id="inputStartTime" value="00:00"><br>

      <label><b>Close Time<span class="red">*</span></b></label>
      <input id="inputEndTime" value="00:00"><br>

      <label><b>Day<span class="red">*</span></b></label><br>
      <input name="sunday" type="checkbox" value="sunday"><span class="day-padding">Sunday</span><br>
      <input name="monday" type="checkbox" value="monday"><span class="day-padding">Monday</span><br>
      <input name="tuesday" type="checkbox" value="tuesday"><span class="day-padding">Tuesday</span><br>
      <input name="wednesday" type="checkbox" value="wednesday"><span class="day-padding">Wednesday</span><br>
      <input name="thursday" type="checkbox" value="thursday"><span class="day-padding">Thursday</span><br>
      <input name="friday" type="checkbox" value="friday"><span class="day-padding">Friday</span><br>
      <input name="saturday" type="checkbox" value="saturday"><span class="day-padding">Saturday</span><br><br>

      <label><b>Organizer Name<span class="red">*</span></b></label>
      <input type='text' name='organizer-name' value='{{ old('organizer-name') }}'><br>

      <label><b>Contact Name<span class="red">*</span></b></label>
      <input type='text' name='contact-name' value='{{ old('contact-name') }}'><br>

      <label><b>Email<span class="red">*</span></b></label>
      <input type='text' name='email' value='{{ old('email') }}'><br>

      <label><b>Phone<span class="red">*</span></b></label>
      <input type='text' name='phone' value='{{ old('phone') }}'><br>

      <label><b>Youtube Video Link</b></label>
      <input type='text' name='videoLink' value='{{ old('videoLink') }}'><br>

      <label><b>Description</b></label>
      <textarea class="form-control" rows="8" name="description"></textarea><br><br>

      <label><b>Market Images<span class="red">*</span></b></label>
      <input type="file" name="file"><br>
      <!-- <label><b>Market Layout<span class="red">*</span></b></label> -->

      <label><b>Place Marker On Map<span class="red">*</span></b></label>
      <div id="map"></div>
      <button class="btn btn-primary" type="submit">Next</button>
    </form>
  </div>
</div>
@endsection

@push('script')
<script src="/js/jquery-clockpicker.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC18bWr7foVxKW45n29XTfqOSryrlVBKfM&callback=initMap"></script>
<!-- google map api key: AIzaSyC18bWr7foVxKW45n29XTfqOSryrlVBKfM -->

<script type="text/javascript">
  var inputStartTime = $('#inputStartTime');
  inputStartTime.clockpicker({autoclose: true});

  var inputEndTime = $('#inputEndTime');
  inputEndTime.clockpicker({autoclose: true});

</script>
<script>
    var map;
    var lat;
    var lng;
    var markers = [];
    function initMap() {
        var location = {lat: 13.75398, lng: 100.50144};
        map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: location,
        });
        map.addListener('click', function(event) {
        var myLatLng = event.latLng;
        lat = myLatLng.lat();
        lng = myLatLng.lng();
        deleteMarkers();
        addMarker(event.latLng);
        });
    }

    function addMarker(location) {
        var marker = new google.maps.Marker({
        position: location,
        map: map
        });
        // sendLatLng(lat,lng);
        // console.log(lat+" "+lng);
        markers.push(marker);
    }

    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
        }
    }

    function clearMarkers() {
        setMapOnAll(null);
    }

    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }
</script>
@endpush
