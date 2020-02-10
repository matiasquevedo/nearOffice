@extends('commerce.template.main')

@section('title','Nuevo Producto')

@section('content')
<div class="bg-white px-3 py-3 border rounded pb-5">
	<h3>Nuevo Producto</h3>
	<div class="container-fluid mt-3">
		{!! Form::open(['route'=>['product.store',$commerce->slug], 'method'=>'POST','files'=>'true']) !!}

			<div class="form-group">
				{!! Form::label('title','Producto') !!}
				{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Producto','required']) !!}				
			</div>

			<div class="form-group">
			{!! Form::label('category_id','Categoria*') !!}
			{!! Form::select('category_id',$categories,null,['class'=>'form-control select-category','required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('commerce_id','commerce_id') !!}
				{!! Form::text('commerce_id',$commerce->id,['class'=>'form-control','placeholder'=>'Producto','required']) !!}				
			</div>

			<div class="form-group">
				{!! Form::label('descripcion','Descripción') !!}
				{!! Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Descripción','required']) !!}				
			</div>

			<div class="form-group">
				{!! Form::label('precio','Precio*') !!}
				{!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'Precio','required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('descuento','Descuento*') !!} <span><p style="font-size: 15px !important;"><i>Ingresar 0 si no hay descuento.</i></p></span>
				{!! Form::text('descuento',null,['class'=>'form-control','placeholder'=>'Precio']) !!}
			</div>

			<div class="form-group">
			{!! Form::label('image','Imagen de Portada*') !!}
			{!! Form::file('image',['id'=>'upload','name'=>'image']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Añadir',['class'=>'btn btn-primary float-right']) !!}
			</div>

		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('js')
	<script>

		$('.select-category').chosen({
			placeholder_text_multiple:'Seleccione al menos 3 tags',
			no_results_text: "Oops, no hay categoria parecida a ",
			search_contains:true,

		});
	</script>
@endsection