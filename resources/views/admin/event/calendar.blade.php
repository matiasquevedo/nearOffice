@extends('admin.template.main')

@section('title','Eventos')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Eventos
    <a class="" href="{{route('event.create')}}" ><i style="font-size: 25px !important;" class="fas fa-plus-circle"></i></a>
    <a href="{{route('event.index')}}" data-method="delete" class="btn btn-outline-primary float-right"><i class="fas fa-list"></i></a>


  </h3>

	<div>
		<div id='calendar'></div>
	</div>
</div>



<div id="reservaModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="modalTitle" class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
          {!! Form::open(['route'=>'event.store', 'method'=>'POST','files'=>'true']) !!}

          <div class="form-group">
            {!! Form::label('title','Titulo*') !!}<p><i>Minimo 8 Caracteres</i></p>
            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
          </div>

          <div class="form-group">
          {!! Form::text('date',null,['class'=>'form-control selectFecha','placeholder'=>'Titulo']) !!}
          </div>

          <div class="form-group">
            {!! Form::label('time','Hora*') !!}
            {!! Form::time('time',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
          </div>

          <div class="form-group">
            {!! Form::label('descripcion','Descripcion*') !!}
            {!! Form::textarea('descripcion',null,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Contenido','required']) !!}
          </div>

          <div class="form-group">
            {!! Form::label('place','Lugar*') !!}<p><i>(Dirección)</i></p>
            {!! Form::text('place',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
          </div>

          <div class="form-group">
            {!! Form::label('price','Precio') !!}<p><i>(Ingresar 0 para evento gratuito)</i></p>
            {!! Form::text('price',null,['class'=>'form-control','placeholder'=>'Fuente']) !!}
          </div>

          <div class="form-group">
            {!! Form::label('image','Imagen de Portada*') !!}
            {!! Form::file('image',['id'=>'upload','name'=>'image']) !!}
          </div>  

          <div class="form-group">
            {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
          </div>

          {!! Form::close() !!}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')

<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            editable: true,
            height: 600,
            dayClick: function(date, jsEvent, view) { 
                $('.selectFecha').hide();
                $('#modalTitle').html('Evento para el dia '+date.format());
                $('.selectFecha').val(date.format());
                $('#reservaModal').modal(); 

            },
            eventResizeStart: function() { tooltip.hide() },
            eventDragStart: function() { tooltip.hide() },
            viewDisplay: function() { tooltip.hide() },
            locale: 'es',
            plugins: [ 'dayGrid','list' ],
            events : [
                @foreach($events as $event)
                {
                    title : '{{ $event->title}}',
                    start : '{{ $event->date }}',
                    user : ' {{$event->user->name}} ',
                    url : ' {{route('event.show',$event->slug)}} ',
                    textColor:'white',
                    @if($event->state == '1')
                      color:'green'
                    @else 
                      color:'red'
                    @endif
                    
                },
                @endforeach

            ]


            })
    });
</script>
@endsection