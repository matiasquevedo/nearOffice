<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('id','ASC')->paginate(10);
        return view('admin.blog.category.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blog.category.create');
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
        $category = new Category($request->all());
        $category->save();
        flash('Se ha creado la categoría '.$category->name)->success();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($categorySlug)
    {
        //
        $category = Category::findBySlug($categorySlug);
        return view('admin.blog.category.show')->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($categorySlug)
    {
        //
        $category = Category::findBySlug($categorySlug);
        return view('admin.blog.category.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$categorySlug)
    {
        //
        $category = Category::findBySlug($categorySlug);
        $category->fill($request->all());
        $category->name = $request->name;
        $category->save();
        flash('Se ha editado la categoría '.$category->name)->warning();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($categorySlug)
    {
        //
        $category = Category::findBySlug($categorySlug);
        $categoryDefault = Category::findBySlug('sin-categoria');
        foreach ($category->entries as $entry) {
            # code...
            $entry->category_id = $categoryDefault->id;
            $entry->save();
        }
        flash('Se ha elimnado la categoría '.$category->name)->error();
        flash('Todas las entradas ahora tienen la categoría '.$categoryDefault->name)->warning();
        $category->delete();
        return redirect()->route('category.index');
    }
}
