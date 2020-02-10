@extends('layouts.app')

@section('title','Home')

@section('content')  
    <div class="mt-3 py-5 px-5 border" style="background-color: white">
        <h3>Hola {{\Auth::user()->name}}!</h3>
        <h4>Agrega informacion de tu comercio</h4><br>
        {!! Form::open(['route'=>'commerce.store', 'method'=>'POST']) !!}

            <div class="form-group">
                {!! Form::label('name','Nombre de tu local') !!}
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('descripcion','Descripción') !!}
                {!! Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'descripcion','required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('mp','Recibes MercadoPago?') !!}
                {!! Form::checkbox('mp', '1') !!}
            </div>

            <div class="form-group">
                {!! Form::label('sinTACC','Ofrece alimentos Sin TACC?') !!}
                {!! Form::checkbox('sinTACC', '1') !!}
            </div>

            <hr>
            <div>
                <h5>Datos de Ubicación</h5>
                <div class="form-group"  style="display:none  !important;">
                    {!! Form::text('locality',null,['class'=>'form-control','id'=>'local','placeholder'=>'localidad']) !!}
                </div>

                <div class="form-group"  style="display:none  !important;">
                    {!! Form::text('subAdministrativeArea',null,['class'=>'form-control','id'=>'area','placeholder'=>'area']) !!}
                </div>

                <div class="form-group" style="display: none !important;">
                    {!! Form::text('latitude',null,['class'=>'form-control','id'=>'latitude','placeholder'=>'latitude','required']) !!}
                </div>

                <div class="form-group" style="display: none !important;">
                    {!! Form::text('longitude',null,['class'=>'form-control','id'=>'longitude','placeholder'=>'longitude','required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('ubicacion','Dirección') !!} <p><i>El sistema sugiere una dirección. Verifiquela.</i></p>
                    {!! Form::text('ubicacion',null,['class'=>'form-control','id'=>'direccion','placeholder'=>'Direccion']) !!}
                </div>
                
                {!! Form::label('Geolocalizació','Geolocalizació (Click para colorcar marca)') !!}
                <div id="map" style="width: full; height: 300px;"></div> <br>
            </div>

            
    </div>

    <div class="mt-3 py-5 px-5 border" style="background-color: white">
        <h4>Plan</h4>
        <div class="row">
            @foreach($plans as $plan)
            <div class="col-lg-4 col-md-4 col-sm-6 mt-3">
                <div class="card producto" style="width: 18rem; background-color: {{$plan->color}}; color:white;">
                        
                  <div class="card-body text-center" style="word-wrap: break-word;">
                    <p><i>{{$plan->title}}</i></p>
                    @if($plan->discount > 0)
                        <div class="">
                            <h6><span class="">Antes <strike>${{ number_format($plan->price,2) }}</strike></span></h6><h3><span class="">Ahora ${{ number_format($plan->priceDiscount,2) }}</span></h3>
                        </div>                        
                    @else
                        <h2 class="card-title">${{ number_format($plan->price,2) }}/mes</h2>
                    @endif
                    {!! Form::radio('plan_id', $plan->id, false); !!}
                  </div>
                </div>
            </div>
            @endforeach             
        </div>
    </div>


    <div class="form-group">
        {!! Form::submit('Guardar Información',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}       

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



    /*  USANDO OPENSTREETMAP        
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