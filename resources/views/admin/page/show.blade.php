@extends('admin.template.main')

@section('title','Sección: '.$page->title)

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<div class="float-lg-right">
		<p><i>Creado por: {{$page->user->name}} {{$page->user->lastname}}</i></p>
	</div>
	<div class="d-flex d-lg-inline align-middle">
		<h3>{{$page->title}}</h3>
		<div class="mt-1 ml-lg-3 ml-sm-1">
			<h5 class="">
	    		@if($page->state == '1')
					<span class="badge badge-success">Visible</span>
	        	@elseif($page->state == '0')
	        		<span class="badge badge-danger">Oculto</span>
	        	@endif
	    	</h5>
		</div>

		<div class="mt-1 ml-lg-3 ml-sm-1">
			@if($page->state == '1')
				<a href="{{ route('page.unpost', $page->slug) }}" class="btn btn-primary"><span class="fas fa-eye-slash"></span></a>
        	@elseif($page->state == '0')
        		<a href="{{ route('page.post', $page->slug) }}" class="btn btn-primary"><span class="fas fa-eye"></span></a>
        	@endif
		</div>      	
    	
	</div>
	<hr>
	<div class="d-block mt-3 break-word">
		{!! $page->descripcion !!}
	</div>

	
	
</div>
@endsection