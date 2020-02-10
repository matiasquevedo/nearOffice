@extends('admin.template.main')

@section('title','Nuevo Evento')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Nuevo Evento</h3>
	<div>
		{!! Form::open(['route'=>'event.store', 'method'=>'POST','files'=>'true']) !!}

		<div class="form-group">
			{!! Form::label('title','Titulo*') !!}<p><i>Minimo 8 Caracteres</i></p>
			{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('date','Fecha*') !!}
			{!! Form::date('date',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('time','Hora*') !!}
			{!! Form::time('time',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('descripcion','Descripcion*') !!}
			{!! Form::textarea('descripcion',null,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Contenido','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('place','Lugar*') !!}<p><i>(Dirección)</i></p>
			{!! Form::text('place',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('price','Precio') !!}<p><i>(Ingresar 0 para evento gratuito)</i></p>
			{!! Form::text('price',null,['class'=>'form-control','placeholder'=>'Fuente']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('image','Imagen de Portada*') !!}
			{!! Form::file('image',['id'=>'upload','name'=>'image']) !!}
		</div>	

		<div class="form-group">
			{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('js')
	<script>


		$('#trumbowyg-demo').trumbowyg();

		document.getElementById("upload").onchange = function() {
			var reader = new FileReader(); //instanciamos el objeto de la api FileReader

  			reader.onload = function(e) {
    		document.getElementById("image").src = e.target.result;
  			};

  		// read the image file as a data URL.
  		reader.readAsDataURL(this.files[0]);
		};

		function limite_textarea(valor) {   
    		total = valor.length;
        	document.getElementById('cont').innerHTML = total;
		}

		

		
	</script>

@endsection