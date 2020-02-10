@extends('admin.template.main')

@section('title',$album->titulo)

@section('content')
<div class="bg-white p-3 border rounded">
	<h3>Album {{$album->titulo}}</h3>
	<div class="row">
		<div class="col-6">
			<img class="" width="150" src="{{url($album->portada)}}" alt="Card image cap">

		</div>
		<div class="col-6">
			<div class="px-3 py-3 border rounded bg-light">
				<form action="{{route('album.addPics')}}" method="post" enctype="multipart/form-data">
				    {{ csrf_field() }}
				    Agregar Fotos al Album:
				    <br />
				    <input type="file" name="images[]" multiple />
				    <br /><br />
				    <input type="hidden" value="{{$album->id}}" name="album_id" />
				    <input type="submit" value="Subir" />
				</form>
			</div>
			
		</div>
	</div>

	{{-- <pre>{{$album->images}}</pre> --}}

	@if(count($album->images)>0)
		<div class="container rounded p-1 border">
			<div class="row">
			  @foreach($album->images as $imagen)
			    <div class="col-4">
			    	<a href="{{url($imagen->image)}}" data-toggle="lightbox" data-max-height="600" data-gallery="example-gallery" data-type="image" class="">
				        <div class="card mb-2" style="width: 17rem;">
				          <img src="{{url($imagen->thumb)}}" class="img-fluid" alt="..." style="max-height: 17rem; min-height: 17rem;">
				        </div>
			    	</a>
			    </div>                      
			  @endforeach
			</div>


		</div>		
	@else
		<div class="text-center border rounded px-3 py-3">
			<p><i>No hay fotos</i></p>
		</div>				
	@endif

	
	
</div>
@endsection

@section('js')
<script src="{{asset('plugins/lightbox/dist/ekko-lightbox.js')}}"></script>
<script>
	  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
	      event.preventDefault();
	      console.log('hizo cliiiick');
	      $(this).ekkoLightbox();
	  });
</script>
@endsection