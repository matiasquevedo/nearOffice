@extends('admin.template.main')

@section('title','Menus')

@section('content')
<div class="bg-white border rounded p-3">
	<h3>Menus</h3>

	<div class="bg-light border rounded p-3">

		{!! Form::open(['route'=>'menu.store', 'method'=>'POST','class'=>'form']) !!}

			<div class="form-group">
			{!! Form::label('menu_principal','Menu de Página Principal') !!}
			{!! Form::select('menu_principal',$menus,$principal,['class'=>'form-control select-category']) !!}
			</div>

			<div class="form-group text-right">
				{!! Form::submit('Seleccionar',['class'=>'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}
		@if($menu_principal)
			<p><i>*Actualmente el menu <b>{{$menu_principal->name}}</b> , se muestra en la página princial.</i></p>
		@endif
	</div>	

	<div>
		{!! Menu::render() !!}
	</div>
</div>
@endsection

@section('js')
	{{ Menu::scripts() }}
@endsection