@extends('commerce.template.main')

@section('title','Mis Productos')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Lista de Productos <a class="" href="{{route('product.create',$commerce->slug)}}" ><i style="font-size: 25px !important;" class="fas fa-plus-circle"></i></a></h3>
	@if(count($products)>0)
	<div class="row">
		@foreach($products as $product)
			<div class="col-lg-4 col-md-4 col-sm-6 mt-3">
				<div class="card producto" style="width: 18rem;">
					<img class="card-img-top" src="{{url($product->image->thumb)}}" alt="Card image cap" style="max-height: 18rem;">
					<div class="card-body">
						<a href="{{route('product.show',[$commerce->slug,$product->slug])}}">
					    <h5 class="card-title">{{ucwords($product->title)}} </h5></a>
					    <p>${{$product->precio}}</p>
					</div>
				</div>
				
			</div>
		@endforeach
	</div>
		
	@else
		<div class="text-center">
			<p>No hay productos</p>
		</div>
	@endif
</div>
@endsection