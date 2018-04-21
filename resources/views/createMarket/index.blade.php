@extends('layouts.master')

@push('style')
<link rel="stylesheet" href="/css/jquery-clockpicker.min.css">
<!-- <link rel="stylesheet" href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css"> -->
    <style>
    p , span {
      font-size: 18px;
    }
    #map {
    height: 400px;
    margin: 20px 0;
    border-radius: 5px;
    border: 1px solid silver;
    }
    </style>
@endpush

@section('content')
<div class="card">
  <div class="card-header">Create Maket</div>
  <div class="card-body">
    <form class="" action="index.html" method="post">
      <p><b>Market Name<span style="color: red;">*</span> <input v-model.trim="item"></b></p>
      <p><b>Location<span style="color: red;">*</span></b> <input v-model.trim="item"></p>

      <p><b>Start Time<span style="color: red;">*</span></b>
      <input id="inputStartTime" value="00:00">
      <button type="button" class="btn btn-default btn-sm" id="buttonStartTime">
      <span class="glyphicon glyphicon-time"></span> Time</button></p>

      <p><b>Close Time<span style="color: red;">*</span></b>
      <input id="inputEndTime" value="00:00">
      <button type="button" class="btn btn-default btn-sm" id="buttonEndTime">
      <span class="glyphicon glyphicon-time"></span> Time</button></p>

      <p><b>Day<span style="color: red;">*</span></b></p>
      <input type="checkbox" value="sunday"><span style="margin-left:1%">Sunday</span><br>
      <input type="checkbox" value="monday"><span style="margin-left:1%">Monday</span><br>
      <input type="checkbox" value="tuesday"><span style="margin-left:1%">Tuesday</span><br>
      <input type="checkbox" value="wednesday"><span style="margin-left:1%">Wednesday</span><br>
      <input type="checkbox" value="thursday"><span style="margin-left:1%">Thursday</span><br>
      <input type="checkbox" value="friday"><span style="margin-left:1%">Friday</span><br>
      <input type="checkbox" value="saturday"><span style="margin-left:1%">Saturday</span><br><br>

      <p><b>Organizer Name<span style="color: red;">*</span></b> <input v-model.trim="item"></p>
      <p><b>Contact Name<span style="color: red;">*</span></b> <input v-model.trim="item"></p>
      <p><b>Email<span style="color: red;">*</span></b> <input v-model.trim="item"></p>
      <p><b>Phone<span style="color: red;">*</span></b> <input v-model.trim="item"></p>

      <p><b>Details</b></p>
      <textarea class="form-control" rows="8"></textarea><br><br>

      <p><b>Youtube Video Link</b> <input v-model.trim="item"></p>
      <p><b>Market Images<span style="color: red;">*</span></b></p>
      <!-- <p><b>Market Layout<span style="color: red;">*</span></b></p> -->

      <p><b>Place Marker On Map<span style="color: red;">*</span></b></p>
      <div id="map"></div>
      <button class="btn btn-primary" type="button" onclick="location.href='http://google.com'">Next</button>
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

  $('#buttonStartTime').click(function(e){
      e.stopPropagation();
      inputStartTime.clockpicker('show').clockpicker('toggleView', 'hours');
  });

  $('#buttonEndTime').click(function(e){
      e.stopPropagation();
      inputEndTime.clockpicker('show').clockpicker('toggleView', 'hours');
  });
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
