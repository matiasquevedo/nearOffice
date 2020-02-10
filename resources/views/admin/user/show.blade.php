@extends('admin.template.main')

@section('title',$user->email)

@section('content')
<div class="bg-white p-3 border rounded">
	<h3>{{$user->email}}
		@if($user->type == 'admin')
			<span class="badge badge-success">Administrador</span>
		@else
			<span class="badge badge-info">Sin Asignar</span>
		@endif
	</h3>
	<div>
		{!! Form::open(['route'=>['user.update',$user->email], 'method'=>'PUT']) !!}

		<div class="form-group">
		{!! Form::label('name','Nombre*') !!}
		{!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('lastname','Apellido*') !!}
		{!! Form::text('lastname',$user->lastname,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
		</div>

		@if($user->email == \Auth::user()->email)

		@else
			<div class="form-group">
				{!! Form::label('type','Tipo Usuario') !!}
				{!! Form::select('type',[''=>'Seleccione Tipo de Usuario' ,'commerce'=>'Sin Asignar','admin'=>'Administrador'],$user->type,['class'=>'form-control','required']) !!}
			</div>
		@endif
		


		<div class="form-group">
			{!! Form::submit('Guardar Cambios',['class'=>'btn btn-primary']) !!}
			{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-danger']) !!}
		</div>

		{!! Form::close() !!}
	</div>
</div>
@endsection