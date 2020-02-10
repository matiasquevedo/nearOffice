@extends('admin.template.main')

@section('title',$event->title)

@section('content')
<div class="bg-white p-3 border rounded">
	<h3>{{ ucwords($event->title) }}</h3>
	<div class="container">
		<div class="row">
			<div class="col-6">
				<div>
					{!! $event->descripcion !!}
				</div>
			</div>
			<div class="col-6">
				<div class="bg-ligth p-3 border rounded">
					<h5><i class="fas fa-calendar"></i> {{$event->date}}</h5>
					<h5><i class="fas fa-clock"></i> {{$event->time}}</h5>
					<h5><i class="fas fa-map-marker-alt"></i> {{$event->place}}</h5>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection