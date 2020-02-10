<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Category;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entries = Entry::orderBy('id','ASC')->paginate(10);
        return view('admin.blog.entry.index')->with('entries',$entries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name','id');
        return view('admin.blog.entry.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $entry = new Entry($request->all());
        $entry->user_id = \Auth::user()->id;
        $entry->save();
        flash('Se ha creado la entrada '.$entry->title)->success();
        return redirect()->route('entry.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show($entrySlug)
    {
        //
        $entry = Entry::findBySlug($entrySlug);
        return view('admin.blog.entry.show')->with('entry',$entry);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit($entrySlug)
    {
        //
        $entry = Entry::findBySlug($entrySlug);
        $categories = Category::pluck('name','id');        
        return view('admin.blog.entry.edit')->with('entry',$entry)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$entrySlug)
    {
        //
        // dd($request,$entrySlug);
        $entry = Entry::findBySlug($entrySlug);
        $entry->fill($request->all());
        $entry->save();
        flash('Se ha editado la entrada '.$entry->title)->warning();
        return redirect()->route('entry.index');
    }

    public function post($entrySlug)
    {
        //
        $entry = Entry::findBySlug($entrySlug);
        $entry->state = '1';
        $entry->save();
        flash('La entrada '.$entry->title.' esta visible')->success();
        return redirect()->back();
    }

    public function unpost($entrySlug)
    {
        //
        $entry = Entry::findBySlug($entrySlug);
        $entry->state = '0';
        $entry->save();
        flash('La entrada '.$entry->title.' esta oculta')->error();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy($entrySlug)
    {
        //
        $entry = Entry::findBySlug($entrySlug);
        $entry->delete();
        flash('Se ha eliminado la entrada '.$entry->title)->error();
        return redirect()->route('entry.index');
    }
}
