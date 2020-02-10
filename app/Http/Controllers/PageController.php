<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages = Page::orderBy('id','ASC')->paginate(20);
        return view('admin.page.index')->with('pages',$pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.create');
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
        $page = new Page($request->all());
        $page->user_id = \Auth::user()->id;
        $page->save();
        flash('Se ha creado la sección '.$page->title)->success();
        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($pageSlug)
    {
        //
        $page = Page::findBySlug($pageSlug);
        return view('admin.page.show')->with('page',$page);

    }

    public function post($pageSlug)
    {
        //
        $page = Page::findBySlug($pageSlug);
        $page->state = '1';
        $page->save();
        flash('Se la sección '.$page->title.' esta visible')->success();
        return redirect()->back();
    }

    public function unpost($pageSlug)
    {
        //
        $page = Page::findBySlug($pageSlug);
        $page->state = '0';
        $page->save();
        flash('Se la sección '.$page->title.' esta oculta')->error();
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($pageSlug)
    {
        //
        $page = Page::findBySlug($pageSlug);
        return view('admin.page.edit')->with('page',$page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        // dd($request, $page);
        $page = Page::find($page->id);
        // dd($page);
        $page->slug = null;
        $page->update(['title' => $request->title]);
        $page->fill($request->all());
        if ($request->nav) {
            # code...
        }else{
            $page->nav = '0';
        }

        if ($request->home) {
            # code...
        }else{
            $page->home = '0';
        }
        $page->save();
        flash('Se a editado la página ' . $page->title)->success();
        return redirect()->route('page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($pageSlug)
    {
        //
        $page = Page::findBySlug($pageSlug);
        $page->delete();
        flash('Se ha eliminado la sección '.$page->title)->error();
        return redirect()->back();
    }

    public function findPage($pageSlug){
        $page = Page::findBySlug($pageSlug);
        return $page;
    }
}
