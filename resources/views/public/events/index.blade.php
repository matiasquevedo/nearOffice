@extends('layouts.app')

@section('title','Eventos')

@section('content')
<div class="container bg-white p-3 border rounded my-5">
	<h3>Eventos</h3>
    <div class="row mb-3">
        @foreach($events as $event)
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-6 ">
                <div class="card mt-3" style="min-width: 33rem;max-width: 33rem;min-height: 4rem;max-height: 4rem;">
                    <div class="card-body event">
                        <a href="{{route('public.evento',$event->slug)}}">
                            <div class="d-flex justify-content-between">
                                <h5 >{{ mb_strimwidth(ucwords($event->title),0, 25, "...")  }}</h5>
                                <div>
                                    <p><i class="far fa-calendar"></i> {{$event->date}}</p>
                                </div>
                                <div class="text-right">
                                    <p ><i class="far fa-clock"></i> {{$event->time}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        <div>
            <div id='calendar'></div>
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
                    url : ' {{route('public.evento',$event->slug)}} ',
                    textColor:'white',
                    color:'green'
                    
                },
                @endforeach

            ]


            })
    });
</script>
@endsection