@extends('admin.template.main')

@section('title',ucwords($month->titulo))

@section('content')
<div class="bg-white p-3 border rounded">
	<h3>
		Cielo del mes de {{ucwords($month->titulo)}}

		<span class="float-right">
				      	@if($month->state == '1')
							<a href="{{ route('mes.unpost', $month->slug) }}" class="btn btn-danger"> Ocultar</a>
			        	@elseif($month->state == '0')
			        		<a href="{{ route('mes.post', $month->slug) }}" class="btn btn-success"> Publicar</a>
			        	@endif
		</span>
	</h3>
	<div>
		{!!$month->descripcion!!}
	</div>
</div>
@endsection
