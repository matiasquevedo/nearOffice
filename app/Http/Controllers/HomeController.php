<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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

        return view('welcome');
    }



}
