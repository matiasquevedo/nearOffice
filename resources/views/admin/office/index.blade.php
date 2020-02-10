@extends('admin.template.main')

@section('title','Oficinas')

@section('content')
<div class="bg-white p-3 border rounded">
	<h3>Oficinas
		<a class="" href="{{route('office.create')}}" ><i style="font-size: 25px !important;" class="fas fa-plus-circle"></i></a></a>
	</h3>
			<div class="mt-3">
				  <table class="table table-striped">
				  <thead>
				    <tr>
				      <th>Oficina</th>
				      <th>Accion</th>
				    </tr>
				  </thead>
				  <tbody>
				    @foreach($offices as $office)
	    				    <tr>
	    				    	<td> <a href="">{{$office->name}}</a> </td>
	    				    	<td>
	    				    		<a href="{{ route('offices.destroy', $office->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
	    				    	</td>
	    				    </tr>
				    
				    @endforeach
				  
				  </tbody>
				</table>
				{!! $offices->render() !!} 
			</div>
</div>
@endsection