<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Harimayco\Menu\Models\Menus;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menus = \DB::table('menus')->pluck('name','id');
        $principal = Menus::where('nav','1')->pluck('name','id');
        $menu_principal = Menus::where('nav','1')->get()->first();
        $routes = \Artisan::call('route:list');
        // dd($routes);
        // dd($menus);
        // dd($principal);
        // dd($menu_principal->name);
        return view('admin.menu.index')->with('menus',$menus)->with('principal',$principal)->with('menu_principal',$menu_principal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.menu.create');
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
        $id = $request->menu_principal;
        $menus = Menus::all();
        // dd($id);
        $menu = Menus::find($id);
        $menu->nav = '1';
        $menu->save();
        foreach ($menus as $m) {
            if ($m->id != $id) {
                $m->nav = '0';
                $m->save();
            }
        }
        flash('El menu '.$menu->name.' se ha colocado en la página principal')->success();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
