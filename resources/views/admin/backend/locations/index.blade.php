@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Danh sách vị trí</h1>
  <ol class="breadcrumb">
    <li><a href="{{Route('dashboard')}}"><i class="fa fa-dashboard"></i>{{Config::get('master.Home_Title')}}</a></li>
    <li class="active">Vị trí</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">
    <div class="box">
        <div class="box-body">
            <form role="form">
                <a href={{ route('locations.add.get') }} class="btn btn-primary btn-flat">Đăng ký</a>
            </form>
        </div>
    </div>
        
    <!-- Box Body -->
    <div id="logBox" class="box">
      @include('admin.backend.locations.ajax')
    </div>
    <!-- End Box -->
  </div>

</section>
<div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
    
          <!-- Modal Header -->
<!--           <div class="modal-header"> -->
<!--             <h4 class="modal-title">Chọn vị trí</h4> -->
<!--             <button type="button" class="close" data-dismiss="modal">&times;</button> -->
<!--           </div> -->
    
          <!-- Modal body -->
          <div class="modal-body">
          	<div id="map" style="width:100%;height:400px;"></div>
          </div>
          
          <input type="hidden" id="hdlatlong" />
    
          <!-- Modal footer -->
          <div class="modal-footer">
          	<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
          </div>
    
        </div>
      </div>
    </div>
<!-- /.content -->
@endsection
@section('script')
    <script type="text/javascript">
   
    function editLocation(id) {
    	window.location.href = '/admin/locations/edit/' + id;
    }
    function myMap(latitude, longitude) {
    	var markers = [];
    	var mapCanvas = document.getElementById("map");
      	var myCenter = new google.maps.LatLng(latitude, longitude); 
      	var mapOptions = {center: myCenter, zoom: 20};
      	var map = new google.maps.Map(mapCanvas,mapOptions);
      	geocoder = new google.maps.Geocoder;
      	clearMarkers();
    	addMarker(myCenter);
      	function addMarker(location) {
            var marker = new google.maps.Marker({
              position: location,
              map: map,
              animation: google.maps.Animation.BOUNCE
            });
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
    }
    $(document).ready(function() {
        $(document).on('click','.map_icon',function(e) {
        	e.preventDefault();
			var latlong = $(this).attr('data-map');
			var arr = latlong.split(',');
			myMap(parseFloat(arr[0]), parseFloat(arr[1]));
        });
    });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ Constants::GOOGLE_API_KEY }}" type="text/javascript"></script>
@endsection
