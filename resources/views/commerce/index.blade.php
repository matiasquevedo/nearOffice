@extends('commerce.template.main')

@section('title',ucwords($commerce->name))

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Bienvenido {{$user->name}}!</h3>
	<div class="row mt-3">
		<div class="col-4">
			<div class="card border-left-primary shadow h-100 py-2">
			  <div class="card-body">
			    <div class="row no-gutters align-items-center">
			      <div class="col mr-2">
			        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">  </div>
			        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($commerce->boards)}}</div>
			      </div>
			      <div class="col-auto">
			        <i class="fas fa-border-all fa-2x text-gray-300"></i>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		@if(count($commerce->boards)==0)
		<div class="col-8">
			<h3>Cuantas meses tiene tu negocio?</h3>
			{!! Form::open(['route'=>['board.store',$commerce->slug], 'method'=>'POST']) !!}

				<div class="form-group">
					{!! Form::text('boards',null,['class'=>'form-control','placeholder'=>'Cantidad de mesas','required']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Añadir',['class'=>'btn btn-primary']) !!}
				</div>



			{!! Form::close() !!}
		</div>			
		@endif
	</div>

</div>
@endsection

@section('js')
<script>

	$('input[type="range"]').rangeslider({
	  polyfill: false,
	  onInit: function() {
	    this.$range.append($(valueBubble));
	    updateValueBubble(null, null, this);
	  },
	  onSlide: function(pos, value) {
	    updateValueBubble(pos, value, this);
	  }
	});





	var mymap = L.map('map').setView([-34.618669,-68.339767], 13);
	mymap.addControl(new L.Control.Fullscreen());
	var address;


	/* USANDO MAPBOX*/
	
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 25,
		id: 'mapbox.streets',
		accessToken: 'pk.eyJ1IjoibWF0aWFzcXVldmVkbyIsImEiOiJjazFwaW5kMHAwMWx3M2NrNDhrOXFkeTg0In0.6iha-fBESxiMBBV_mnPnOg'
	}).addTo(mymap);
	var geocoder = L.Control.geocoder().addTo(mymap);



	/* 	USANDO OPENSTREETMAP		
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	    }).addTo(mymap);
	/* */

	mymap.on('click', onMapClick);
	var popup = L.popup();
	var marker = L.marker();



	var circle = L.circle([-34.618669, -68.339767], {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.1,
		radius: 50
	}).addTo(mymap);
	var polygon = L.polygon([
		[-34.618669, -68.339767],
		[-34.618669, -68.339767],
		[-34.618669, -68.339767]
	]).addTo(mymap);

	function onMapClick(e) {
		lat=e.latlng['lat'];
		long=e.latlng['lng'];
		marker.setLatLng(e.latlng).addTo(mymap);
		popup.setLatLng(e.latlng).setContent("Agregar comercio en: " + e.latlng.toString());
		marker.bindPopup(popup).openPopup();
		console.clear();
		console.log(lat,long);
		$('#latitude').val(lat);
		$('#longitude').val(long);
		$.get('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat='+lat+'&lon='+long, function(data){
			address = data
		    console.log(data);
		    if(address.address.house_number){
		    	$('#direccion').val(address.address.road + ' ' + address.address.house_number);
		    }else{
		    	$('#direccion').val(address.address.road + ' /(Sin Número)');
		    }
		    
		    if(address.address.city){
		    	$('#local').val(address.address.city);
		    }
		    $('#area').val(address.address.city);   
		});
		

	}
</script>

@endsection