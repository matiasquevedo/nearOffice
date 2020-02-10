@extends('admin.template.main')

@section('title','Editar: '.ucwords($month->titulo))

@section('content')
<div class="bg-white p-3 border rounded">
	<h3>Editar mes {{ucwords($month->titulo)}}</h3>
	{!! Form::open(['route'=>['mes.update',$month->slug], 'method'=>'PUT']) !!}
			<div class="form-group">
			{!! Form::label('descripcion','Descripcion*') !!}
			{!! Form::textarea('descripcion',$month->descripcion,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Descripcion','required']) !!}
			</div>

			<div class="form-group text-right">
				{!! Form::submit('Guardar Cambios',['class'=>'btn btn-primary']) !!}
				{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-danger']) !!}
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