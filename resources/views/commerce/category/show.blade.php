@extends('commerce.template.main')

@section('title',$category->name)

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Categoria: {{$category->name}}</h3>
	<div class="row">
		@if(count($category->products) > 0)			
			@foreach($category->products as $product)
				<div class="col-lg-4 col-md-4 col-sm-6 mt-3">
					<div class="card producto" style="width: 18rem;">
						<img class="card-img-top" src="" alt="Card image cap" style="max-height: 18rem;">
						<p>{{$product->title}}</p>
					</div>
					
				</div>
			@endforeach
		@else
			<div class="col-12">
				<div class="text-center">
					<p>No hay productos</p>
				</div>
			</div>			
		@endif
		
	</div>
</div>
@endsection