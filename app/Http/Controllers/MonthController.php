<?php

namespace App\Http\Controllers;

use App\Month;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $months = Month::orderBy('id','ASC')->paginate(12);
        return view('admin.cielo.index')->with('months',$months);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.cielo.create');
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
        $month = new Month($request->all());
        $month->save();
        flash('Se ha creado el mes '.$month->titulo)->success();
        return redirect()->route('mes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function show($monthSlug)
    {
        //
        $month = Month::findBySlug($monthSlug);
        return view('admin.cielo.show')->with('month',$month);
    }

    public function showPreview($monthSlug)
    {
        //
        $month = Month::findBySlug($monthSlug);
        return view('admin.cielo.preview')->with('month',$month);
    }

    public function post($monthSlug)
    {
        //
        $month = Month::findBySlug($monthSlug);
        $month->state = '1';
        $month->save();
        flash('El mes '.$month->titulo.' esta visible')->success();
        return redirect()->back();
    }

    public function unpost($monthSlug)
    {
        //
        $month = Month::findBySlug($monthSlug);
        $month->state = '0';
        $month->save();
        flash('El mes '.$month->titulo.' esta oculto')->success();
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function edit($monthSlug)
    {
        //
        $month = Month::findBySlug($monthSlug);
        return view('admin.cielo.edit')->with('month',$month);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $monthSlug)
    {
        $month = Month::findBySlug($monthSlug);
        // dd($month, $request, $monthSlug);
        $month->fill($request->all());
        $month->save();
        flash('Se han guardado los cambios del mes ' . $month->titulo)->success();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function destroy(Month $month)
    {
        //
    }
}
