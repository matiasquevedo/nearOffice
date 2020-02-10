@extends('admin.template.main')

@section('title','Editar: '. ucwords($entry->title) )

@section('content')
<div class="bg-white p-3 border rounded">
	<h3>Editar: {{ucwords($entry->title)}}</h3>
	<div>
		{!! Form::open(['route'=>['entry.update',$entry->slug], 'method'=>'PUT','files'=>'true']) !!}

			<div class="form-group">
			{!! Form::label('title','Titulo*') !!}
			{!! Form::text('title',$entry->title,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
			</div>

			<div class="form-group">
			{!! Form::label('descripcion','Descripcion*') !!}
			{!! Form::textarea('descripcion',$entry->descripcion,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Descripcion','required']) !!}
			</div>

			<div class="form-group">
			{!! Form::label('category_id','Categoria*') !!}
			{!! Form::select('category_id',$categories,$entry->category->id,['class'=>'form-control select-category','required']) !!}
			</div>


			<div class="form-group text-right">
				{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-danger']) !!}
				{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
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

		$('#trumbowyg-demo').trumbowyg();
		$('#trumbowyg-demo2').trumbowyg();
	
	</script>

@endsection