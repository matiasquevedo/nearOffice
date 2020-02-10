@extends('admin.template.main')

@section('title','Nueva Categoria')

@section('content')
<div class="bg-white p-3 border rounded">
	<h3>Nueva Categoría</h3>
	<div>
		{!! Form::open(['route'=>'category.store', 'method'=>'POST']) !!}

			<div class="form-group">
				{!! Form::label('name','Nombre Categoria') !!}
				{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
			</div>



		{!! Form::close() !!}
	</div>
</div>
@endsection