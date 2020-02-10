@extends('admin.template.main')

@section('title',ucwords($entry->title))

@section('content')
<div class="bg-white p-3 rounded border">
	<div class="d-flex d-lg-inline align-middle">
		<h3>{{ ucwords($entry->title) }}</h3>
		<div class="mt-1 ml-lg-3 ml-sm-1">
			<h5 class="">
	    		@if($entry->state == '1')
					<span class="badge badge-success">Visible</span>
	        	@elseif($entry->state == '0')
	        		<span class="badge badge-danger">Oculto</span>
	        	@endif
	    	</h5>
		</div>

		<div class="mt-1 ml-lg-3 ml-sm-1">
			@if($entry->state == '1')
				<a href="{{ route('entry.unpost', $entry->slug) }}" class="btn btn-primary"><span class="fas fa-eye-slash"></span></a>
        	@elseif($entry->state == '0')
        		<a href="{{ route('entry.post', $entry->slug) }}" class="btn btn-primary"><span class="fas fa-eye"></span></a>
        	@endif
		</div>

		<hr>
		<div class="d-block mt-3 break-word">
			{!! $entry->descripcion !!}
		</div>      	
    	
	</div>	
</div>
@endsection