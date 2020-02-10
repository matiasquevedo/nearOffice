@extends('layouts.app')

@section('title','Inicio')

@section('content')
{{-- https://bootstrapmade.com/demo/Vesperr/ --}}
{{-- <div class="bg-white px-3 py-3 border rounded mx-3">
	<div class="container-fluid">
		<h3>Bienvenido!</h3>
		<h4>{{config('app.name')}}</h4>
	</div>    
</div>
@if(count($pages)>0)
	<div class="bg-white py-2 mt-5">
		<div class="container">
			@foreach($pages as $page)
			<div class="my-5">
				<h3><a href="{{route('public.page',$page->slug)}}">{{ ucwords($page->title) }}</a></h3>
				<div>
					{!! $page->descripcion !!}
				</div>
			</div>
			@endforeach
		</div>
	</div>
@endif --}}
<div class="bg-home bg-opacity">
	<div class="position-relative">
		<div class="text-center py-5" style="font-family: 'Roboto Condensed', sans-serif; color:white;z-index: 1000;">
			<img src="/images/coper.png" class="rounded-circle" width="255">
			<h1 class="text-center mt-1" style="font-size: 64px !important;
font-weight: 700 !important;">
				<span class="text-left">
					INSTITUTO <br>
					<span style="color: #3498db;">COPERNICO</span> 
				</span>
				 
			</h1>
		</div>
	</div>	
</div>
@if(count($events)>0)
<div class="container my-5">
	<div class="events">
		<h4>Próximos eventos</h4>
		<div class="row ">
			@foreach($events as $event)
				<div class="col-lg-12 col-md-12 col-sm-12 col-xl-6 ">
					<div class="card mt-3" style="min-width: 33rem;max-width: 33rem;min-height: 10rem;max-height: 10rem;">
						<div class="card-body event">
							<a href="{{route('public.evento',$event->slug)}}">
								<h5 >{{ mb_strimwidth(ucwords($event->title),0, 25, "...")  }}</h5>
								<div class="d-flex justify-content-between mt-3">
									<div>
										<p><i class="far fa-calendar"></i> {{$event->date}}</p>
									</div>
									<div class="text-right">
										<p ><i class="far fa-clock"></i> {{$event->time}}</p>
									</div>	
									<div class="text-right" >
										<i class="fas fa-map-marker-alt"></i> {{mb_strimwidth($event->place,0, 10, "...")}}</p>
									</div>						
								</div>
								<div class="px-2">
									<?php $x = preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, $event->descripcion); ?>
									{!! ucwords(mb_strimwidth($x,0, 80, "..."))  !!}
								</div>
							</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="mt-3 text-right">
			<a href=" {{route('public.eventos')}} " class="btn btn-outline-dark">Ver todos los eventos...</a>
		</div>
	</div>
</div>
@endif



@if(count($albums)>0)
<div style="background-color: #3498db;" class="p-5 my-5">
	<div class="container">
		<h3 style="color: white;">Galería de Fotos</h3>
		<div class="row"><br>
		  @foreach($albums as $album)
		    <div class="col-lg-4 col-md-4 col-sm-6 mt-3">
		      <div class="card" style="width: 18rem;">
		        <img src="{{url($album->thumb)}}" class="card-img-top" alt="..." style="max-height: 18rem; min-height: 18rem; ">
		        <div class="card-body" style="background-color: #222222">
		          <div class="d-flex justify-content-between">
		            <a href="{{ route('album.show', $album->slug) }}">                
		              <h5 class="card-title">{{$album->titulo}}</h5>
		            </a>	
		          </div>              
		        </div>
		      </div>        
		    </div>          
		  @endforeach
		</div>
	</div>
</div>
@endif

@if(count($entries)>0)
<div class="my-5">
	<div class="container">
		<h3>Blog</h3>
		<h4>Entradas</h4>
		<div class="row"><br>
		  @foreach($entries as $entry)
		    <div class="col-lg-4 col-md-4 col-sm-6 mt-3">
		      <div class="card" style="width: 18rem;">
		      	@if($entry->image)
		      		{{-- <img src="{{url($album->thumb)}}" class="card-img-top" alt="..." style="max-height: 18rem; min-height: 18rem; "> --}}
		      	@else
		      		<img src="/images/default.svg" class="card-img-top" alt="..." style="max-height: 18rem; min-height: 18rem; ">
		      	@endif
		        {{-- <img src="{{url($album->thumb)}}" class="card-img-top" alt="..." style="max-height: 18rem; min-height: 18rem; "> --}}
		        <div class="card-body">
		          <div class="d-flex justify-content-between">
		          	<p><i>{{$entry->category->name}}</i></p>
		          	<p style="font-size: 11px;"><i><i class="fas fa-user"></i> {{$entry->user->name}}</i></p>
		          </div>              
		            <a href="{{route('public.entrada',$entry->slug)}}">                
		              <h5 class="card-title">{{$entry->title}}</h5>
		            </a>	
		        </div>
		      </div>        
		    </div>          
		  @endforeach
		</div>
	</div>
</div>
@endif

@if(count($pages)>0)
<div class="container sections my-5">
		@foreach($pages as $page)
			<div class="bg-white py-2 mt-5 border rounded">
				<div class="container ">
					
					<div class="my-5 ">
						<h3>{{ ucwords($page->title) }}</h3>
						<div class="text-break">
							{!! $page->descripcion !!}
						</div>
					</div>
					
				</div>
			</div>
		@endforeach	
</div>
@endif
@endsection