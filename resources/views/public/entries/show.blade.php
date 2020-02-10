@extends('layouts.app')

@section('title',$entry->title)

@section('content')
<div class="container">
	<div class="bg-white p-3 border rounded my-5">
		<h3>{{$entry->title}}</h3>
		<div>
			<div class="text-break">
				{!! $entry->descripcion !!}
			</div>
		</div>
		<div class="coments mt-3">
			<hr>
			<h5>Comentarios</h5>
			
			@include('comments::components.comments', [
			    'model' => $entry
			])

		</div>

	</div>
</div>

@endsection