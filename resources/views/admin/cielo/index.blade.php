@extends('admin.template.main')

@section('title','Cielo del Mes')

@section('content')
<div class="bg-white p-3 border rounded">
	<h3>Cielo del Mes
		@if(count(\App\Month::all())<12)
			<a class="" href="{{route('mes.create')}}"><i style="font-size: 25px !important;" class="fas fa-plus-circle"></i></a>
		@else
			<a class="btn disabled" href="{{route('mes.create')}}"><i style="font-size: 25px !important;" class="fas fa-plus-circle disabled"></i></a>
		@endif
	</h3>
	<div>
		@if(count($months)>0)
		<div class="mt-3">
			  <table class="table table-striped">
			  <thead>
			    <tr>
			      <th>Mes</th>
			      <th>Estado</th>
			      <th>Acción</th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach($months as $month)
			    <tr>
			        <td><a href="{{route('mes.show',$month->slug)}}">{{ ucwords($month->titulo) }}</a></td>
			        <td>
			        	<h5>
			        		@if($month->state == '1')
		    					<span class="badge badge-success">Visible</span>
		    	        	@elseif($month->state == '0')
		    	        		<span class="badge badge-danger">Oculto</span>
		    	        	@endif
			        	</h5>		        	
			        </td>
			      <td>
			      	@if($month->state == '1')
						<a href="{{ route('mes.unpost', $month->slug) }}" class="btn btn-primary"><span class="fas fa-eye-slash"></span></a>
		        	@elseif($month->state == '0')
		        		<a href="{{ route('mes.post', $month->slug) }}" class="btn btn-primary"><span class="fas fa-eye"></span></a>
		        	@endif
			      	
			        <a href="{{ route('mes.edit', $month->slug) }}" class="btn btn-warning"><span class="fas fa-wrench"></span></a>
			        <a href="{{ route('events.destroy', $month->slug) }}" data-method="delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
			      </td>
			    </tr>


			    @endforeach
			  
			  </tbody>
			</table>
			{!! $months->render() !!} 
		</div>
		@else
		<div class="text-center">
			<p><i>No hay información</i></p>
		</div>
		@endif
	</div>
</div>
@endsection