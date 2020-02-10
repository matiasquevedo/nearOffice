@extends('admin.template.main')

@section('title','Albumes Portada')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Albumes 
		<a class="" href="{{route('album.create')}}" ><i style="font-size: 25px !important;" class="fas fa-plus-circle"></i></a>
		<a href="{{route('album.index')}}" class="btn btn-outline-primary float-right"><i class="fas fa-list"></i></a>
	</h3>
	@if(count($albums)>0)
	<div class="row"><br>
	  @foreach($albums as $album)
	    <div class="col-lg-4 col-md-4 col-sm-6 mt-3">
	      <div class="card" style="width: 18rem;">
	        <img src="{{url($album->thumb)}}" class="card-img-top" alt="..." style="max-height: 18rem; min-height: 18rem; ">
	        <div class="card-body">
	        	<div>
	        		@if($album->state == '1')
						<span class="badge badge-success">Visible</span>
		        	@elseif($album->state == '0')
		        		<span class="badge badge-danger">Oculto</span>
		        	@endif
	        	</div>
	          <div class="d-flex justify-content-between">
	            <a href="{{ route('album.show', $album->slug) }}">                
	              <h5 class="card-title">{{$album->titulo}}</h5>
	            </a>
	            <div>
		            <a href="{{ route('album.destroy', $album->slug) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> 
	    	      	@if($album->state == '1')
	    				<a href="{{ route('album.unpost', $album->slug) }}" class="btn btn-primary"><span class="fas fa-eye-slash"></span></a>
	            	@elseif($album->state == '0')
	            		<a href="{{ route('album.post', $album->slug) }}" class="btn btn-primary"><span class="fas fa-eye"></span></a>
	            	@endif
	            </div>	            
	            </a>
	          </div>              
	        </div>
	      </div>        
	    </div>          
	  @endforeach
	</div>
	@else
		<div class="text-center">
			<p><i>No hay albumes</i></p>
		</div>
	@endif
</div>
@endsection