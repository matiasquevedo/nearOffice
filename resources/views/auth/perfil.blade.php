@extends('layouts.app')

@section('title',ucfirst($user->name).' '.ucfirst($user->lastname))

@section('content')
<div>
	<img src="{{'/storage/app/public/'.$user->avatar}}" width="200" alt="">
	<h3>{{ ucfirst($user->name)}} {{ ucfirst($user->lastname)}}</h3>

	{{storage_path().'/app/public/'.$user->avatar}}
</div>
@endsection