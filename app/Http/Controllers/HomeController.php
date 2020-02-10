<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Page;
use App\Album;
use App\Event;
use App\Entry;
use Laravelista\Comments\Comment;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');
        if(\Auth::user()->type == 'admin'){
            return view('admin.index');
        }elseif (\Auth::user()->type == 'commerce') {
            return redirect()->route('pagina.principal');
        }        
    }

    public function publicPage($slugPage){
        $page = Page::findBySlug($slugPage);
        return view('public.page.show')->with('page',$page);
    }

    public function paginaPrincipal(){
        $pages = Page::where('state','1')->where('home','1')->get();
        $albums = Album::where('state','1')->get()->take(3);
        $events = Event::where('state','1')->get()->take(2);
        $entries = Entry::where('state','1')->get();
        // $comments = Comment::all();
        // dd($comments);
        // dd($events);
        return view('welcome')->with('pages',$pages)->with('albums',$albums)->with('events',$events)->with('entries',$entries);
    }

    public function events(){
        $events = Event::where('state','1')->get();
        return view('public.events.index')->with('events',$events);
    }

    public function event($slugEvent){
        $event = Event::findBySlug($slugEvent);
        return view('public.events.show')->with('event',$event);
    }

    public function entry($entrySlug){
        $entry = Entry::findBySlug($entrySlug);
        return view('public.entries.show')->with('entry',$entry);
    }

}
