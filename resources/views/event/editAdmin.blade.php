@extends('layouts/contentNavbarLayout')


@section('content')
  <!--===============================================================================================-->
  <html>
  <head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
  </head>
  <body>
  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Update Event</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
      <a href="{{route('event.indexAdmin')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
        Show Events
      </a>
    </div>
  </div>
  <h4 class="fw-bold py-3 mb-4">

  </h4>
  <div class="card">
    <div class="card-body">

      @if ($errors->any())
        <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('event.update', ['event' => $event]) }}" method="POST">
        {{ csrf_field() }}
        @method('PUT')
        <div class="mb-3">
          <label class="form-label">Title <span class="text-danger">*</span></label>
          <input name="title" type="text" class="form-control" value="{{$event->title}}">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">description<span class="text-danger">*</span></label>
          <textarea class="form-control" placeholder="{{$event->description}}" name="description" id="description"
                    cols="12" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="date_time" class="form-label">Event Date <span class="text-danger">*</span></label>
          <input id="date_time" name="date_time" type="datetime-local" class="form-control" placeholder="Event Date"
                 value="{{$event->date_time}}">
        </div>
        <div class="mb-3">
          <input type="hidden" id="latitude" name="latitude">
          <input type="hidden" id="longitude" name="longitude">
        </div>
        <div id="map" style="height: 400px;"></div>
        <div>
          <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
            Update Event
          </button>
        </div>
      </form>
    </div>
  </div>
  @endsection
  <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
          integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var eventMarkerIcon = L.icon({
        iconUrl: "{{asset('images/icons/location-pin.png')}}",
        iconSize: [32, 32],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
      });
      var updatedMarkerIcon = L.icon({
        iconUrl: "{{asset('images/icons/updatelocation-pin.png')}}",
        iconSize: [32, 32],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
      });
      document.getElementById('latitude').value = {{ $event->location['latitude'] }};
      document.getElementById('longitude').value = {{ $event->location['longitude'] }};

      var map = L.map('map').setView([{{ $event->location['latitude'] }}, {{ $event->location['longitude'] }}], 15);
      var eventMarker = L.marker([{{ $event->location['latitude'] }}, {{ $event->location['longitude'] }}], {icon: eventMarkerIcon}).addTo(map);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);


      var updatedEventMarker;
      map.on('click', function (e) {
        if (updatedEventMarker) {
          map.removeLayer(updatedEventMarker);
        }
        var latLng = e.latlng;
        var latitude = latLng.lat;
        var longitude = latLng.lng;

        document.getElementById('latitude').value = latitude;
        document.getElementById('longitude').value = longitude;
        updatedEventMarker = L.marker([latitude, longitude], {icon: updatedMarkerIcon}).addTo(map)
          .bindPopup('Your Event Will be Held Here')
          .openPopup();
      });
    });
  </script>
  </body>
  </html>

