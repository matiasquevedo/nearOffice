@extends('admin.template.main')

@section('title',ucwords($month->titulo))

@section('content')
<div class="bg-white p-3 border rounded">
	<h3>
		{{ucwords($month->titulo)}}
		@if($month->state == '0') 
			<span class="badge badge-danger">oculto</span> 
		@else
			<span class="badge badge-success">visible</span> 
		@endif
		<a href="{{route('mes.preview',$month->slug)}}" class="btn btn-info">Vista Previa</a>

		<span class="float-right">
				      	@if($month->state == '1')
							<a href="{{ route('mes.unpost', $month->slug) }}" class="btn btn-danger"><span class="fas fa-eye-slash"></span></a>
			        	@elseif($month->state == '0')
			        		<a href="{{ route('mes.post', $month->slug) }}" class="btn btn-success"><span class="fas fa-eye"></span></a>
			        	@endif
		</span>
	</h3>
	<div>
		{!! Form::open(['route'=>['mes.update',$month->slug], 'method'=>'PUT']) !!}


				<div class="form-group">
				{!! Form::textarea('descripcion',$month->descripcion,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Descripcion','required','rows'=>'4','cols'=>'50']) !!}
				</div>

				<div class="form-group text-right">
					{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
				</div>	


		{!! Form::close() !!}
	</div>
</div>
@endsection
@section('js')
<script>

	$('#trumbowyg-demo').trumbowyg();
	
</script>
@endsection