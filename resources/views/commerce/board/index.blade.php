@extends('commerce.template.main')

@section('title','Mis mesas')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Mis mesas <a class="float-right btn btn-outline-secondary" href="{{route('board.pdfPrint',\Auth::user()->commerce->slug)}}" target="_blank"><i class="fas fa-print"></i></a></h3>

	
	<div class="row">
		@foreach($boards as $board)
			<div class="col-lg-4 col-md-4 col-sm-6 mt-3">
				<div class="card producto" style="width: 18rem;">
					<img class="card-img-top" src="{{url($board->codeQR)}}" alt="Card image cap" style="max-height: 18rem;">
					<div class="px-3">
						<p>{{$board->identificable}}</p>
					</div>
				</div>
				
			</div>
		@endforeach
	</div>
</div>
@endsection

