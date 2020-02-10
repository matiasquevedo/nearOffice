@extends('admin.template.main')

@section('title','Nueva Sección')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Nueva Sección</h3>
	{!! Form::open(['route'=>'page.store', 'method'=>'POST','files'=>'true']) !!}

			<div class="form-group">
			{!! Form::label('title','Titulo*') !!}
			{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
			</div>

			<div class="form-group">
			{!! Form::label('descripcion','Descripcion*') !!}
			{!! Form::textarea('descripcion',null,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Descripcion','required']) !!}
			</div>

			<div>				
				<p>Colocar en:</p>
				<div class="d-flex d-inline">
					<div class="form-group">
					{!! Form::label('nav','Barra Superior') !!}
					{!! Form::checkbox('nav', '1', false); !!}
					</div>

					<div class="form-group ml-5">
					{!! Form::label('home','Página de Inicio') !!}
					{!! Form::checkbox('home', '1', false); !!}
					</div>
				</div>
			</div>	
			


			<div class="form-group text-right">
				{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
			</div>	


	{!! Form::close() !!}
</div>
@endsection

@section('js')
	<script>




		$('#trumbowyg-demo').trumbowyg();

		document.getElementById("upload").onchange = function() {
			var reader = new FileReader(); //instanciamos el objeto de la api FileReader

  			reader.onload = function(e) {
    		document.getElementById("image").src = e.target.result;
  			};

  		// read the image file as a data URL.
  		reader.readAsDataURL(this.files[0]);
		};

		function limite_textarea(valor) {   
    		total = valor.length;
        	document.getElementById('cont').innerHTML = total;
		}

		

		
	</script>

@endsection