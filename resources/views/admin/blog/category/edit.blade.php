@extends('admin.template.main')

@section('title','Editar: '. ucwords($category->name))

@section('content')
<div class="bg-white p-3 border rounded">
	<h3>Editar Categoría {{ucwords($category->name)}}</h3>
	<div>
		{!! Form::open(['route'=>['category.update',$category->slug], 'method'=>'PUT']) !!}

			<div class="form-group">
				{!! Form::label('name','Nombre Categoria') !!}
				{!! Form::text('name',$category->name,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
			</div>

			<div class="form-group text-right">
				{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-danger']) !!}
				{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
			</div>



		{!! Form::close() !!}
	</div>
</div>
@endsection