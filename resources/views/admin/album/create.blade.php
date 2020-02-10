@extends('admin.template.main')

@section('title','Nuevo Album')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Nuevo Album	</h3>
	<div class="container">
		{!! Form::open(['route'=>'album.store', 'method'=>'POST','files'=>'true','id'=>'my-awesome-dropzone']) !!}

		<div class="form-group">
		{!! Form::label('titulo','Titulo*') !!}<p><i>Minimo 8 Caracteres</i></p>
		{!! Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('descripcion','Descripción') !!}
		{!! Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Contenido','required','rows'=>'4','cols'=>'50']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('portada','Imagen de Portada*') !!}
		{!! Form::file('portada',['id'=>'upload','name'=>'image']) !!}
		</div> 


		<div class="form-group">
			{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('js')

@endsection