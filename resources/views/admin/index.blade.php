@extends('admin.template.main')

@section('title','Panel')

@section('content')
<div class="bg-white px-2 py-3 border rounded">
	<h3>Panel Administrador</h3>
</div>
<div class="mt-4">
	<div class="row ml-3">
		<div class="col-3">
			<div class="card border-left-primary shadow h-100 py-2">
			  <div class="card-body">
			    <div class="row no-gutters align-items-center">
			      <div class="col mr-2">
			        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">  </div>
			        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count(\App\User::all())}}</div>
			      </div>
			      <div class="col-auto">
			        <i class="fas fa-users fa-2x text-gray-300"></i>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		<div class="col-3">
			<div class="card border-left-warning shadow h-100 py-2">
			  <div class="card-body">
			    <div class="row no-gutters align-items-center">
			      <div class="col mr-2">
			        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">  </div>
			        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count(\App\Page::all())}}</div>
			      </div>
			      <div class="col-auto">
			        <i class="far fa-file-alt fa-2x text-gray-300"></i>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		<div class="col-3">
			<div class="card border-left-info shadow h-100 py-2">
			  <div class="card-body">
			    <div class="row no-gutters align-items-center">
			      <div class="col mr-2">
			        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">  </div>
			        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count(\App\Event::all())}}</div>
			      </div>
			      <div class="col-auto">
			        <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>

</div>

@endsection

