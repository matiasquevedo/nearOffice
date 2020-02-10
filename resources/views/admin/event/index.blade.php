@extends('admin.template.main')

@section('title','Eventos')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Eventos
		<a class="" href="{{route('event.create')}}" ><i style="font-size: 25px !important;" class="fas fa-plus-circle"></i></a>
		<a href="{{route('events.calendar')}}" data-method="delete" class="btn btn-outline-primary float-right"><i class="fas fa-calendar"></i></a>


	</h3>

		@if(count($events)>0)
		<div class="mt-3">
			  <table class="table table-striped">
			  <thead>
			    <tr>
			      <th>Titulo</th>
			      <th>Fecha</th>
			      <th>Hora</th>
			      <th>Lugar</th>
			      <th>Precio</th>
			      <th>Estado</th>
			      <th>Acción</th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach($events as $event)
			    <tr>
			        <td><a href="{{route('event.show',$event->slug)}}">{{ ucwords($event->title) }}</a></td>
			        <td>{{$event->date}}</td>
			        <td>{{$event->time}}</td>
			        <td>{{$event->place}}</td>
			        <td>
			        	@if($event->price>0)			        	{{$event->price}}
			        	@else
							Gratis
			        	@endif
			        </td>
			        <td>
			        	<h5>
			        		@if($event->state == '1')
		    					<span class="badge badge-success">Visible</span>
		    	        	@elseif($event->state == '0')
		    	        		<span class="badge badge-danger">Oculto</span>
		    	        	@endif
			        	</h5>		        	
			        </td>
			      <td>
			      	@if($event->state == '1')
						<a href="{{ route('event.unpost', $event->slug) }}" class="btn btn-primary"><span class="fas fa-eye-slash"></span></a>
		        	@elseif($event->state == '0')
		        		<a href="{{ route('event.post', $event->slug) }}" class="btn btn-primary"><span class="fas fa-eye"></span></a>
		        	@endif
			      	
			        <a href="{{ route('event.edit', $event->slug) }}" class="btn btn-warning"><span class="fas fa-wrench"></span></a>
			        <a href="{{ route('events.destroy', $event->slug) }}" data-method="delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
			      </td>
			    </tr>


			    @endforeach
			  
			  </tbody>
			</table>
			{!! $events->render() !!} 
		</div>
		@else
		<div class="text-center">
			<p><i>No hay Eventos</i></p>
		</div>
		@endif

</div>
@endsection