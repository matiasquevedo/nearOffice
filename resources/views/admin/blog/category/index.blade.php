@extends('admin.template.main')

@section('title','Categorias')

@section('content')
<div class="bg-white border p-3 rounded">
	<h3>Categorias <a class="" href="{{route('category.create')}}" ><i style="font-size: 25px !important;" class="fas fa-plus-circle"></i></a></h3>
		<div>
			<div class="mt-3">
				  <table class="table table-striped">
				  <thead>
				    <tr>
				      <th>Categoria</th>
				      <th>Entradas</th>
				      <th>Acción</th>
				    </tr>
				  </thead>
				  <tbody>
				    @foreach($categories as $category)
					    @if($category->slug == 'sin-categoria')
	    				    <tr>
	    				    	<td> <a href="{{route('category.show',$category->slug)}}">{{$category->name}}</a> </td>
	    				    	<td>{{ count($category->entries) }}</td>
	    				    	<td>
	    				    	</td>
	    				    </tr>
					    @else
	    				    <tr>
	    				    	<td> <a href="{{route('category.show',$category->slug)}}">{{$category->name}}</a> </td>
	    				    	<td>{{ count($category->entries) }}</td>
	    				    	<td>
	    	    		        	<a href="{{ route('category.edit', $category->slug) }}" class="btn btn-warning"><span class="fas fa-wrench"></span></a>
	    	    		        	<a href="{{ route('categories.destroy', $category->slug) }}" data-method="delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
	    				    	</td>
	    				    </tr>
					    @endif
				    
				    @endforeach
				  
				  </tbody>
				</table>
				{!! $categories->render() !!} 
			</div>
		</div>
	<div class="">
		<p style="font-size: 13px;"><i>*Al eliminar una categoría no se eliminan las entradas de esa categoría. En su lugar, las entradas que solo se asignaron a la categoría borrada, se asignan a la categoría por defecto <b>Sin Categoría</b>. La categoría por defecto no se puede borrar.</i></p>
	</div>
</div>
@endsection