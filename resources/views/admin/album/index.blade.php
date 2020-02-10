@extends('admin.template.main')

@section('title','Albumes')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Albumes 
		<a class="" href="{{route('album.create')}}" ><i style="font-size: 25px !important;" class="fas fa-plus-circle"></i></a>
		<a href="{{route('album.indexPic')}}" class="btn btn-outline-primary float-right"><i class="fas fa-th"></i></a>
	</h3>

	
	@if(count($albums)>0)
			<div>
				  <table class="table table-striped">
				  <thead>
				    <tr>
				      <th>Titulo</th>
				      <th>Portada</th>
				      <th>Estado</th>
				      <th>Acción</th>
				    </tr>
				  </thead>
				  <tbody>
				    @foreach($albums as $album)
				    <tr>
				    	
				        <td><a href="{{route('album.show',$album->slug)}}">{{ ucwords($album->titulo) }}</a></td>
				        <td><img src="{{url($album->thumb)}}" width="40" alt=""></td>
				        <td>
				        	<h5>
				        		@if($album->state == '1')
			    					<span class="badge badge-success">Visible</span>
			    	        	@elseif($album->state == '0')
			    	        		<span class="badge badge-danger">Oculto</span>
			    	        	@endif
				        	</h5>		        	
				        </td>
				      <td>
				      	@if($album->state == '1')
							<a href="{{ route('album.unpost', $album->slug) }}" class="btn btn-primary"><span class="fas fa-eye-slash"></span></a>
			        	@elseif($album->state == '0')
			        		<a href="{{ route('album.post', $album->slug) }}" class="btn btn-primary"><span class="fas fa-eye"></span></a>
			        	@endif
				      	
				        <a href="{{ route('album.edit', $album->slug) }}" class="btn btn-warning"><span class="fas fa-wrench"></span></a>
				        <a href="{{ route('album.destroy', $album->slug) }}" data-method="delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
				      </td>
				    </tr>


				    @endforeach
				  
				  </tbody>
				</table>
				{!! $albums->render() !!} 
			</div>
	@else
		<div class="text-center">
			<p><i>No hay albumes</i></p>
		</div>
	@endif
</div>
@endsection