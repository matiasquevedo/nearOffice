@extends('admin.template.main')

@section('title','Editar Sección: '.$page->title)

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Editar Sección {{$page->title}}</h3>
	{!! Form::open(['route'=>['page.update',$page], 'method'=>'PUT']) !!}


			<div class="form-group">
			{!! Form::label('title','Titulo') !!}
			{!! Form::text('title',$page->title,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
			</div>
					
			<div class="form-group">
			{!! Form::label('descripcion','Descripción') !!}
			{!! Form::textarea('descripcion',$page->descripcion,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Contenido','required']) !!}
			</div>

			<div class="form-group">
			{!! Form::label('nav','Menu') !!}
			{!! Form::checkbox('nav', 1, ($page->nav ==1?true:null), ['class' => 'field']) !!}
			</div>

			

			<div class="form-group">
			{!! Form::label('home','Home') !!}
			{!! Form::checkbox('home', 1, ($page->home ==1?true:null), ['class' => 'field']) !!}
			</div>

	<div class="form-group">
		{!! Form::submit('Guardar Cambios',['class'=>'btn btn-primary']) !!}
		{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-danger']) !!}
	</div>

	{!! Form::close() !!}
</div>
@endsection

@section('js')
<script>

	$('#trumbowyg-demo').trumbowyg();
	$('#trumbowyg-demo2').trumbowyg();

</script>

@endsection