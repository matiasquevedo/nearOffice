<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::orderBy('id','ASC')->paginate(20);
        return view('admin.event.index')->with('events',$events);
    }

    public function indexCalendar()
    {
        //
        $events = Event::orderBy('id','ASC')->paginate(20);
        return view('admin.event.calendar')->with('events',$events);
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $event = new Event($request->all());
        $event->user_id = \Auth::user()->id;
        $event->save();
        flash('Se ha creado el evento '.$event->title)->success();
        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($eventSlug)
    {
        //
        $event = Event::findBySlug($eventSlug);
        return view('admin.event.show')->with('event',$event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    public function post($eventSlug)
    {
        //
        $event = Event::findBySlug($eventSlug);
        $event->state = '1';
        $event->save();
        flash('El evento '.$event->title.' esta visible')->success();
        return redirect()->back();
    }

    public function unpost($eventSlug)
    {
        //
        $event = Event::findBySlug($eventSlug);
        $event->state = '0';
        $event->save();
        flash('El evento '.$event->title.' esta oculto')->error();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($eventSlug)
    {
        //
        $event = Event::findBySlug($eventSlug);
        flash('Se ha elimnado el evento '.$event->title)->error();
        $event->delete();
        return redirect()->back();
    }
}
