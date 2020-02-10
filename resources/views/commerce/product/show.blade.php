@extends('commerce.template.main')

@section('title','Producto: '.ucwords($product->title))

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	
	<div class="row">
		<div class="col-6">
			<img class="" height="70%" src="{{url($product->image->image)}}" alt="Card image cap">
		</div>
		<div class="col-6">
			<div class="d-flex d-inline">
				<h3>{{ucwords($product->title)}} - $ {{$product->precio}}</h3>
			</div>
			<div class="text-left" style="word-wrap: break-word;">
				{!! $product->descripcion !!}
			</div>
		</div>
	</div>
	
</div>
@endsection