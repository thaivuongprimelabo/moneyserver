<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        	<input id="search_map" class="form-control" placeholder="Nhập địa chỉ, tên đường..." />
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<div id="map" style="width:100%;height:400px;"></div>
      </div>
      
      <input type="hidden" id="hdlatlong" />
      <input type="hidden" id="hdAddress" />
      <input type="hidden" id="hdName" />

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        
        @if($create_location)
        <button type="button" class="btn btn-primary" id="select_create">Chọn và đăng ký</button>
        @else
        <button type="button" class="btn btn-primary" id="select">Chọn</button>
        @endif
      </div>

    </div>
  </div>
</div>
<script>
var markers = [];
var geocoder;
var service;
function myMap() {
	var mapCanvas = document.getElementById("map");
  	var myCenter = new google.maps.LatLng({{ $latlong or Constants::LATLONG }}); 
  	var mapOptions = {center: myCenter, zoom: 18};
  	var map = new google.maps.Map(mapCanvas,mapOptions);
  	var input = document.getElementById('search_map');
  	var searchBox = new google.maps.places.SearchBox(input);
  	service = new google.maps.places.PlacesService(map);
  	//map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  	map.addListener('bounds_changed', function() {
    	searchBox.setBounds(map.getBounds());
  	});

  	searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
          return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
          marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
          if (!place.geometry) {
            console.log("Returned place contains no geometry");
            return;
          }
          var icon = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
          };

          // Create a marker for each place.
          markers.push(new google.maps.Marker({
            map: map,
            icon: icon,
            title: place.name,
            position: place.geometry.location
          }));

          if (place.geometry.viewport) {
            // Only geocodes have viewport.
            bounds.union(place.geometry.viewport);
          } else {
            bounds.extend(place.geometry.location);
          }
        });
        map.fitBounds(bounds);
      });

    
  	geocoder = new google.maps.Geocoder;
	var event = {latLng: myCenter};
	addMarker(event, true);
	map.addListener('click', function(event) {
		clearMarkers();
    	addMarker(event, false);
  	});

  	function addMarker(event, init) {
  		$('#hdlatlong').val('');
  		$('#hdName').val('');
  		$('#hdAddress').val('');
        var marker = new google.maps.Marker({
          position: event.latLng,
          map: map,
          animation: google.maps.Animation.BOUNCE
        });
        markers.push(marker);
        $('#hdlatlong').val(event.latLng);
        var strLocation = $('#hdlatlong').val();
        strLocation = strLocation.replace('(','');
        strLocation = strLocation.replace(')','');
        $('#hdlatlong').val(strLocation);
        if(!init) {
            if(event.placeId !== undefined) {
        		getAddress(geocoder, service, strLocation, event.placeId);
            }
        }
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

function getAddress(geocoder, service, input, placeId) {
    var latlngStr = input.split(',');
    var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
    geocoder.geocode({'location': latlng}, function(results, status) {
      if (status === 'OK') {
        if (results[0]) {
//           map.setZoom(11);
//           var marker = new google.maps.Marker({
//             position: latlng,
//             map: map
//           });
//           infowindow.setContent(results[0].formatted_address);
//           infowindow.open(map, marker);
			$('#hdAddress').val(results[0].formatted_address);
			service.getDetails({
		          placeId: placeId
		        }, function(place, status) {
	          if (status === google.maps.places.PlacesServiceStatus.OK) {
		          $('#hdName').val(place.name);
// 	            var marker = new google.maps.Marker({
// 	              map: map,
// 	              position: place.geometry.location
// 	            });
// 	            google.maps.event.addListener(marker, 'click', function() {
// 	              infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
// 	                'Place ID: ' + place.place_id + '<br>' +
// 	                place.formatted_address + '</div>');
// 	              infowindow.open(map, this);
// 	            });
	          }
	        });
        } else {
          window.alert('No results found');
        }
      } else {
        window.alert('Geocoder failed due to: ' + status);
      }
    });
	}
$(document).ready(function () {
	var validImageTypes =  ["image/gif", "image/jpeg", "image/png","image/pjpeg"];
	$('#map_icon').click(function(e) {
		myMap();
	});
	$('#select_create').click(function(e) {
		var data = '{"name": "' + $('#hdName').val() + '", "latlong": "' + $('#hdlatlong').val() + '", "address": "' + $('#hdAddress').val() + '"}';
		$.ajax({
			beforeSend: function(xhr){
				xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
			},
			url: '{{ url('/api/v1/add-location') }}',
			type: 'POST',
			dataType: 'json',
			data: data,
			success: function(result) {
				if(result.code === 200) {
					var selectLocation = document.getElementById('location_id');
					var option = document.createElement('option');
					option.index = 0;
					option.selected = true;
					option.value = result.insertId;
					option.text = $('#hdName').val();
					selectLocation.appendChild(option);
					$('#myModal').modal('hide');
				}
			},
	      	error: function (xhr, ajaxOptions, thrownError) {
	        	alert(xhr.status);
	      	}
		});
	});
	$('#select').click(function(e) {
		var latlong = $('#hdlatlong').val();
		var name = $('#hdName').val();
		var address = $('#hdAddress').val();
		latlong = latlong.replace('(','');
		latlong = latlong.replace(')','');
		$('#latlong').val(latlong);
		$('#name').val(name);
		$('#address').val(address);
		$('#myModal').modal('hide');
	});
	$('#upload').click(function(e) {
		e.preventDefault();
		$('#desc_image').click();
	});
	$('#desc_image').change(function(e) {
		e.preventDefault();
		$('#file-name').html('');
        var files = e.target.files;
        if (files && files.length > 0) {
            file = files[0];
            filename = file["name"];
            if ($.inArray(file["type"], validImageTypes) < 0) {
                $('#upload-error').text('{{ Messages::ERR_IMAGE_INVALID }}');
                return;
            }
            if (file.size > {{ Constants::MAX_UPLOAD_SIZE }}  || file.fileSize > {{ Constants::MAX_UPLOAD_SIZE }} )
            {
            	$('#upload-error').text('{{ Messages::ERR_IMAGE_SIZE }}');
                $('#file-name').val('');
                return;
            }

            $('#file-name').html(filename);
        }
	});
	$("#frmForm").validate({
		onfocusout: false,
		rules: {
			name: {
				required: true
			}
		},
		messages: {
			name: {
				required: 'Vui lòng nhập'
			}
		},
		errorPlacement: function(error, element) {
			error.appendTo( element.parent().next('div').find('p') );
	  	},
	  	invalidHandler: function(form, validator) {
	  	}
	});
});
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ Constants::GOOGLE_API_KEY }}&libraries=places"
  type="text/javascript"></script>