@extends('admin.template.main')

@section('title','Lista de Usuarios')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Lista de Usuarios</h3>
	<div>
		  <table class="table table-striped">
		  <thead>
		    <tr>
		      <th>Nombre</th>
		      <th>Email</th>
		      <th>Tipo</th>
		      <th>Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach($users as $user)
		    <tr>
		        <td><a href="{{route('user.show',$user->email)}}">{{$user->name}} {{$user->lastname}}</a></td>
		        <td>{{$user->email}}</td>
		        <td>
		        	@if($user->type == 'admin')
		        		<span class="badge badge-success">Administrador</span>
		        	@else
		        		<span class="badge badge-info">Sin Asignar</span>
		        	@endif
		        </td>
		      <td>
		        <a href="{{ route('user.destroy', $user->email) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
		      </td>
		    </tr>


		    @endforeach
		  
		  </tbody>
		</table>
		{!! $users->render() !!} 
	</div>
</div>
@endsection