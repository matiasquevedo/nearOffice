@extends('layouts.app')

@section('title',$event->title)

@section('content')
<div class="container bg-white p-3 my-5 border rounded">
	<div class="d-flex justify-content-between">
		<span class="align-middle">
			<h3>{{ ucwords($event->title) }}</h3>
		</span>
		
		<div class="card" style="min-width: 33rem;max-width: 33rem;min-height: 4rem;max-height: 4rem;">
		    <div class="card-body">
		            <div class="d-flex justify-content-between">
		                <div>
		                    <p><i class="far fa-calendar"></i> {{$event->date}}</p>
		                </div>
		                <div class="text-right">
		                    <p ><i class="far fa-clock"></i> {{$event->time}}</p>
		                </div>
		                <div class="text-right">
		                	<p><i class="fas fa-map-marker-alt"></i> {{$event->place}}</p>
		                </div>
		            </div>
		    </div>
		</div>		
	</div>
	<div class="mt-3 px-3">
		{!! $event->descripcion !!}
	</div>
	
</div>
@endsection