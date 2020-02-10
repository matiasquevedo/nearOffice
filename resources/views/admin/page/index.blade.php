@extends('admin.template.main')

@section('title','Secciones')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Secciones <a class="" href="{{route('page.create')}}" ><i style="font-size: 25px !important;" class="fas fa-plus-circle"></i></a></h3>
	@if(count($pages)>0)
	<div>
		  <table class="table table-striped">
		  <thead>
		    <tr>
		      <th>Titulo</th>
		      <th>Ubicación</th>
		      <th>Estado</th>
		      <th>Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach($pages as $page)
		    <tr>
		        <td><a href="{{route('page.show',$page->slug)}}">{{ ucwords($page->title) }}</a></td>
		        <td>
		        	@if($page->nav == '1')
						Barra Superior
			        	@if($page->home == '1')
							/
			        	@endif
		        	@endif

    	        	@if($page->home == '1')
    					Página principal
    	        	@endif

    	        	@if($page->nav == '0' && $page->home == '0')
    					No se ha ubicado en ningun lado
    	        	@endif
		        </td>
		        <td>
		        	<h5>
		        		@if($page->state == '1')
	    					<span class="badge badge-success">Visible</span>
	    	        	@elseif($page->state == '0')
	    	        		<span class="badge badge-danger">Oculto</span>
	    	        	@endif
		        	</h5>		        	
		        </td>
		      <td>
		      	@if($page->state == '1')
					<a href="{{ route('page.unpost', $page->slug) }}" class="btn btn-primary"><span class="fas fa-eye-slash"></span></a>
	        	@elseif($page->state == '0')
	        		<a href="{{ route('page.post', $page->slug) }}" class="btn btn-primary"><span class="fas fa-eye"></span></a>
	        	@endif
		      	
		        <a href="{{ route('page.edit', $page->slug) }}" class="btn btn-warning"><span class="fas fa-wrench"></span></a>
		        <a href="{{ route('pages.destroy', $page->slug) }}" data-method="delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
		      </td>
		    </tr>


		    @endforeach
		  
		  </tbody>
		</table>
		{!! $pages->render() !!} 
	</div>
	@else
	<div class="text-center">
		<p><i>No hay Secciones</i></p>
	</div>
	@endif
</div>
@endsection