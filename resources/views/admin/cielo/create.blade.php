@extends('admin.template.main')

@section('title','Agregar Mes')

@section('content')
<div class="bg-white p-3 border rounded">
	<h3>Agregar Mes</h3>
	{!! Form::open(['route'=>'mes.store', 'method'=>'POST','files'=>'true']) !!}

			<div class="form-group">
			{!! Form::label('titulo','Mes*') !!}
			{!! Form::select('titulo',config('multiple.meses'),null,['class'=>'form-control select-category','required']) !!}
			</div>

			<div class="form-group">
			{!! Form::label('descripcion','Descripcion*') !!}
			{!! Form::textarea('descripcion',null,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Descripcion','required']) !!}
			</div>

			<div class="form-group text-right">
				{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
			</div>	


	{!! Form::close() !!}
</div>
@endsection

@section('js')
<script>

	$('#trumbowyg-demo').trumbowyg();
	$('.select-category').chosen({
		placeholder_text_multiple:'Seleccione al menos 3 tags',
		no_results_text: "Oops, no hay categoria parecida a ",
		search_contains:true,

	});
	
</script>
@endsection