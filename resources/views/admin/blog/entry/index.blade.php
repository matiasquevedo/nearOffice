@extends('admin.template.main')

@section('title','Entradas')

@section('content')
<div class="bg-white border rounded p-3">
	<h3>Entradas <a class="" href="{{route('entry.create')}}" ><i style="font-size: 25px !important;" class="fas fa-plus-circle"></i></a></h3>
	<div>
		@if(count($entries)>0)
		<div class="mt-3">
			  <table class="table table-striped">
			  <thead>
			    <tr>
			      <th>Titulo</th>
			      <th>Categoria</th>
			      <th>Creador</th>
			      <th>Estado</th>
			      <th>Acción</th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach($entries as $entry)
			    <tr>
			    	<td><a href="{{route('entry.show',$entry->slug)}}">{{$entry->title}}</a></td>
			    	<td><a href="{{route('category.show',$entry->category->slug)}}">{{$entry->category->name}}</a></td>
			    	<td>{{$entry->user->name}} {{$entry->user->lastname}}</td>
			    	<td>
			        	<h5>
			        		@if($entry->state == '1')
		    					<span class="badge badge-success">Visible</span>
		    	        	@elseif($entry->state == '0')
		    	        		<span class="badge badge-danger">Oculto</span>
		    	        	@endif
			        	</h5>		        	
		        	</td>
			    	<td>
    			      	@if($entry->state == '1')
    						<a href="{{ route('entry.unpost', $entry->slug) }}" class="btn btn-primary"><span class="fas fa-eye-slash"></span></a>
    		        	@elseif($entry->state == '0')
    		        		<a href="{{ route('entry.post', $entry->slug) }}" class="btn btn-primary"><span class="fas fa-eye"></span></a>
    		        	@endif
    		        	<a href="{{ route('entry.edit', $entry->slug) }}" class="btn btn-warning"><span class="fas fa-wrench"></span></a>
    		        	<a href="{{ route('entries.destroy', $entry->slug) }}" data-method="delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
			    	</td>
			    </tr>
			    @endforeach
			  
			  </tbody>
			</table>
			{!! $entries->render() !!} 
		</div>
		@else
		<div class="text-center">
			<p><i>No hay entradas</i></p>
		</div>
		@endif
	</div>
</div>
@endsection