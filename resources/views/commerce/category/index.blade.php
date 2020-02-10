@extends('commerce.template.main')

@section('title','Categorias')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Categorias</h3>
	<div class="container-fluid mt-3">
		{!! Form::open(['route'=>['category.store',$commerce->slug], 'method'=>'POST']) !!}

			<div class="form-group">
				<div class="d-flex d-inline">
					{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Añadir Nueva Categoria','required']) !!}
					{!! Form::submit('Añadir',['class'=>'btn btn-primary float-right ml-2']) !!}
				</div>
				
			</div>

			<div class="form-group">
				
			</div>

		{!! Form::close() !!}
	</div>
	<div class="container-fluid mt-3">
		<table class="table table-striped">
		    <thead>
		      <tr>
		        <th>Nombre</th>
		        <th>Acción</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($categories as $category)
		      <tr>
		        <td>
		          <a href="{{route('category.show',[$commerce->slug,$category->slug])}}">{{$category->name}}</a>
		        </td>
		        <td>
		          <a href="{{route('category.edit',[$commerce->slug,$category->slug])}}" class="btn btn-warning"><span class="fas fa-wrench"></span></a>
		          <a href="{{route('category.destroy',[$commerce->slug,$category->slug])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
		        </td>
		      </tr>
		      @endforeach
		    
		    </tbody>
		</table>
		{!! $categories->render() !!}  
	</div>

</div>
@endsection