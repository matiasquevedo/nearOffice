@extends('admin.template.main')

@section('title','Nuevo Negocio')

@section('content')
	@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

					<li>
						{{ $error}}
					</li>

				@endforeach
			</ul>
			

		</div>
	@endif

<div class="container bg-white p-3 border rounded">
	<h3>Nueva Oficina</h3>

	{!! Form::open(['route'=>'office.store', 'method'=>'POST','files'=>'true']) !!}
		<div class="form-group">
			{!! Form::label('name','Nombre Empresa') !!} <p><i>No es obligatorio</i></p>
			{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('capacidad','Capacidad') !!} <p><i>No es obligatorio</i></p>
			{!! Form::text('capacidad',null,['class'=>'form-control','placeholder'=>'Nombre']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('descripcion','Descripcion*') !!} <p><i>Coloque alguna referencia. Ej: Portón Verde.</i></p>
		{!! Form::textarea('descripcion',null,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Descripcion']) !!}
		</div>

		<div class="form-group"  style="display:  !important;">
			{!! Form::text('locality',null,['class'=>'form-control','id'=>'local','placeholder'=>'localidad']) !!}
		</div>

		<div class="form-group"  style="display:  !important;">
			{!! Form::text('subAdministrativeArea',null,['class'=>'form-control','id'=>'area','placeholder'=>'area']) !!}
		</div>

		<div class="form-group" style="display: show !important;">
			{!! Form::text('latitude',null,['class'=>'form-control','id'=>'latitude','placeholder'=>'latitude','required']) !!}
		</div>

		<div class="form-group" style="display: show !important;">
			{!! Form::text('longitude',null,['class'=>'form-control','id'=>'longitude','placeholder'=>'longitude','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('ubicacion','Dirección') !!} <p><i>No es obligatorio. El sistema sugiere una dirección.</i></p>
			{!! Form::text('ubicacion',null,['class'=>'form-control','id'=>'direccion','placeholder'=>'Direccion']) !!}
		</div>
		
		{!! Form::label('Geolocalizació','Geolocalizació (Click para colorcar marca)') !!}
		<div id="map" style="width: full; height: 300px;"></div> <br>


		<div class="form-group">
			{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
		</div>


	{!! Form::close() !!}



</div>
@endsection

@section('js')

<script>
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
		    $('#direccion').val(address.address.road);
		    if(address.address.city){
		    	$('#local').val(address.address.city);
		    }
		    $('#area').val(address.address.city);   
		});
		

	}
	 
</script>
@endsection