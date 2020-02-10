<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('id','ASC')->paginate(20);
        return view('admin.user.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPerfil()
    {
        //
        $user = User::find(\Auth::user()->id);
        // dd($user);
        return view('auth.perfil')->with('user',$user);
    }

    public function show($email)
    {
        //
        $user = $this->findByEmial($email);
        // dd($user);
        return view('admin.user.show')->with('user',$user);
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
    public function update(Request $request, $email)
    {
        //        dd($request, $emial);

        $user = $this->findByEmial($email);
        $user->fill($request->all());
        // dd($request, $user);
        $user->type = $request->type;
        $user->save();
        flash('Se ha modificado el usuario '.$user->name.' '.$user->lastname)->success();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        //
        $user = User::where('email',$email)->first();
        // dd($user);
        $commerce = $user->commerce->name;
        $user->delete();
        flash('Se ha eliminado el usuario: '.$user->email.' del comercio: '.$commerce)->error();
        return redirect()->route('user.index');

    }

    private function findByEmial($email){
        $user = User::where('email',$email)->first();
        return $user;
    }
}
