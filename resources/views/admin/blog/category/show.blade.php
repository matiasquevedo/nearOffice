@extends('admin.template.main')

@section('title','Categoria: '. ucwords($category->name))

@section('content')
<div class="bg-white p-3 border rounded">
	<h3>{{ucwords($category->name)}}</h3>
	<h4>Entradas</h4>
			@if(count($category->entries)>0)
			<div class="mt-3">
				  <table class="table table-striped">
				  <thead>
				    <tr>
				      <th>Titulo</th>
				      <th>Creador</th>
				      <th>Acción</th>
				    </tr>
				  </thead>
				  <tbody>
				    @foreach($category->entries as $entry)
				    
				    <tr>
				    	<td><a href="{{route('entry.show',$entry->slug)}}">{{$entry->title}}</a></td>
				    	<td>{{$entry->user->name}} {{$entry->user->lastname}}</td>
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
			</div>
			@else
			<div class="text-center">
				<p><i>No hay entradas con la categoria {{ucwords($category->name)}}</i></p>
			</div>
			@endif
</div>
@endsection