@extends('home.management')

@push('style')
<link rel="stylesheet" href="/css/jquery-clockpicker.min.css">
    <style>
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

    label, input {
      font-size: 20px;
    }
    </style>
@endpush

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<p><a href="/markets">Markets</a> <span> > </span> <a href="/markets/{{$market->id}}">{{ $market->name }}</a> <span> > </span> <span>Edit Market</span></p>
<div class="card">
  <div class="card-header">
    <h1>Edit Market</h1>
  </div>
  <div class="card-body">
    <form action="/markets/{{ $market->id }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <h3><u>Information</u></h3>
      <div class="row">
        <div class="col-md-6">
          <label class="col-md-5 text-md-right">Market Name<span class="red">*</span></label>
          <input type='text' name='name' value='{{ old('name') ?? $market->name }}'><br>

          <label class="col-md-5 text-md-right">Location<span class="red">*</span></label>
          <textarea name='location' rows='3'>{{ old('location') ?? $market->location }}</textarea><br>

          <label class="col-md-5 text-md-right">Start Day<span class="red">*</span></label>
          <input type="date" name="start_day" value='{{ old('start_day') ?? $market->start_day}}'><br>

          <label class="col-md-5 text-md-right">Close Day<span class="red">*</span></label>
          <input type="date" name="close_day" value='{{ old('close_day') ?? $market->close_day }}'><br>

          <label class="col-md-5 text-md-right">Start Time<span class="red">*</span></label>
          <input id="inputStartTime" value="{{ old('start_time') ?? $market->start_time }}" name="start_time" placeholder="00:00"><br>

          <label class="col-md-5 text-md-right">Close Time<span class="red">*</span></label>
          <input id="inputEndTime" value="{{ old('close_time') ?? $market->close_time }}" name="close_time" placeholder="00:00"><br>
        </div>

        <div class="col-md-6">
          <label class="col-md-5 text-md-right">Organizer Name<span class="red">*</span></label>
          <input type='text' name='organizer_name' value='{{ old('organizer_name') ?? $market->organizer_name }}'><br>

          <label class="col-md-5 text-md-right">Contact Name<span class="red">*</span></label>
          <input type='text' name='contact_name' value='{{ old('contact_name') ?? $market->contact_name }}'><br>

          <label class="col-md-5 text-md-right">Email<span class="red">*</span></label>
          <input type='text' name='email' value='{{ old('email') ?? $market->email }}'><br>

          <label class="col-md-5 text-md-right">Phone<span class="red">*</span></label>
          <input type='text' name='phone' value='{{ old('phone') ?? $market->phone }}'><br>

          <label class="col-md-5 text-md-right">Youtube Video Teaser</label>
          <input type='text' name='teaser' value='https://youtu.be/{{ old('teaser') ?? $market->teaser }}'><br>
        </div>
      </div><br>

      <div class="" style="display: flex;flex-direction:column;">
        <label style="margin-left:10%">Description<span class="red">*</span></label>
        <center><textarea class="form-control" rows="8" name="description" style="width:80%">{{ old('description') ?? $market->description }}</textarea></center>
      </div><br>

      <div class="" style="display: flex;flex-direction:column;">
        <label style="margin-left:10%">Place Marker On Map<span class="red">*</span></label>
        <center><div id="map" style="width:80%"></div></center>
      </div><br>

      <input hidden type="text" id="lat_value" name="latitude" value="{{ $market->latitude }}">
      <input hidden type="text" id="lng_value" name="longitude" value="{{ $market->longitude }}"><br><hr>

      <h3><u>Upload Images</u></h3>
      <label class="col-md-3 text-md-right">Market Layout<span class="red">*</span></label>
      <input type="file" name="market_layout"><br>

      <label class="col-md-3 text-md-right">Market Screenshot<span class="red">*</span></label>
      <input type="file" name="market_screenshot[]" multiple><br><hr>

      <h3 style="display: inline"><u>Zone</u></h3>
      <div id='plusZone' title="Add Zone" class="btn btn-primary" style="float: right;">+</div>

      <br><br>
      <!-- <div id='zones'>
        <div class="" style="display: flex;">
          <span>Zone Name : </span><input type="text" name="zoneName[]" value="">
          <span style="margin-left:5%">Number of Zone : </span><input style="width:10%" type="number" name="numberOfZone[]" value="">
          <span style="margin-left:5%">Price of Zone : </span><input style="width:10%"  type="number" name="priceOfZone[]" value="">
        </div><br>
      </div><br> -->

      <div id='zones'>
      @for($i = 0; $i < sizeof($market->zones); $i++)
        <div class="" style="display: flex;">
          <?php
            $is_edit = true;
            if(sizeof($market->zones[$i]->reservations) !== 0){
              foreach ($market->zones[$i]->reservations as $value) {
                if($value->reserved_by !== null){
                  $is_edit = false;
                  break;
                }
              }
            }
           ?>
           <span>Zone Name : </span><input required type="text" name="zoneName[]" value="{{ $market->zones[$i]->name }}">
           <span style="margin-left:5%">Number of Zone : </span><input required readonly style="width:10%" type="number" name="numberOfZone[]" value="{{ sizeof($market->zones[$i]->reservations) }}">
           <span style="margin-left:5%">Price of Zone : </span><input required style="width:10%"  type="number" name="priceOfZone[]" value="{{ $market->zones[$i]->price }}">
          @if($is_edit)
            <a class="btn btn-danger" style="margin-left:5%" href="/markets/{{ $market->id }}/{{ $market->zones[$i]->id }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">Delete</a>
          @endif
        </div><br>
      @endfor
      </div><br>

      <br>


    </div>
    <div class="card-footer">
      <button class="btn btn-warning" type="submit">Edit</button>
    </div>
    </form>
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

        var mapCenter = new google.maps.LatLng(document.getElementById("lat_value").value, document.getElementById("lng_value").value);
        old_map = new google.maps.Marker({ position: mapCenter, map: map });
        map.setCenter(mapCenter);
        markers.push(old_map);
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
        sendLatLng(lat,lng);
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

    function sendLatLng(lat,lng) {
      console.log(lat+" "+lng);
      document.getElementById("lat_value").value = lat;
      document.getElementById("lng_value").value = lng;
    }
</script>
<script type="text/javascript">
  $('#plusZone').click(function(){
    $('#zones').append('<div class="" style="display: flex;"><span>Zone Name : </span><input required type="text" name="zoneName[]" value=""><span style="margin-left:5%">Number of Zone : </span><input required style="width:10%" type="number" name="numberOfZone[]" value=""><span style="margin-left:5%">Price of Zone : </span><input required style="width:10%"  type="number" name="priceOfZone[]" value=""></div><br>');
  });
</script>
<script type="text/javascript">
(function() {

var laravel = {
  initialize: function() {
    this.methodLinks = $('a[data-method]');
    this.token = $('a[data-token]');
    this.registerEvents();
  },

  registerEvents: function() {
    this.methodLinks.on('click', this.handleMethod);
  },

  handleMethod: function(e) {
    var link = $(this);
    var httpMethod = link.data('method').toUpperCase();
    var form;

    // If the data-method attribute is not PUT or DELETE,
    // then we don't know what to do. Just ignore.
    if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
      return;
    }

    // Allow user to optionally provide data-confirm="Are you sure?"
    if ( link.data('confirm') ) {
      if ( ! laravel.verifyConfirm(link) ) {
        return false;
      }
    }

    form = laravel.createForm(link);
    form.submit();

    e.preventDefault();
  },

  verifyConfirm: function(link) {
    return confirm(link.data('confirm'));
  },

  createForm: function(link) {
    var form =
    $('<form>', {
      'method': 'POST',
      'action': link.attr('href')
    });

    var token =
    $('<input>', {
      'type': 'hidden',
      'name': '_token',
      'value': link.data('token')
      });

    var hiddenInput =
    $('<input>', {
      'name': '_method',
      'type': 'hidden',
      'value': link.data('method')
    });

    return form.append(token, hiddenInput)
               .appendTo('body');
  }
};

laravel.initialize();

})();
</script>
@endpush
