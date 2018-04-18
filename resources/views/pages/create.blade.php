@extends('layouts.master')
@push('style')
    <style>
    #map {
    height: 400px;
    margin: 20px 0;
    border-radius: 5px;
    border: 1px solid silver;
    }
    </style>
@endpush
@section('content')
  <div>
    <p><b>Market Name<span style="color: red;">*</span></b> <input v-model.trim="item"></p>
    <p><b>Location<span style="color: red;">*</span></b> <input v-model.trim="item"></p>
    <p><b>Open<span style="color: red;">*</span></b> <input v-model.trim="item"></p>
    <p><b>Close<span style="color: red;">*</span></b> <input v-model.trim="item"></p>
    <p><b>Organizer Name<span style="color: red;">*</span></b> <input v-model.trim="item"></p>
    <p><b>Contact Name<span style="color: red;">*</span></b> <input v-model.trim="item"></p>
    <p><b>Email<span style="color: red;">*</span></b> <input v-model.trim="item"></p>
    <p><b>Phone<span style="color: red;">*</span></b> <input v-model.trim="item"></p>
    <p><b>Youtube Video Link (Optional)<span style="color: red;">*</span></b> <input v-model.trim="item"></p>
    <p><b>Add Images<span style="color: red;">*</span></b> </p>
    <!-- <p><b>Market Layout<span style="color: red;">*</span></b></p> -->

    <p><b>Place Marker On Map<span style="color: red;">*</span></b></p>

    <p><b></b></p>
    <!-- google map api key: AIzaSyC18bWr7foVxKW45n29XTfqOSryrlVBKfM -->
    <div id="map"></div>
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC18bWr7foVxKW45n29XTfqOSryrlVBKfM&callback=initMap"></script>
    <button type="button" style="width: 50%; height: 2%;float: right;background-color: #4CAF50;color: white;padding: 10px 18px; margin-top: -1%; border: none;cursor: pointer;" onclick="location.href='http://google.com'">Next</button>
  </div>
@endsection
