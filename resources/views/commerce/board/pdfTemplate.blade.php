<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css"> -->
		<title>
			Mesas - {{ucwords($arrayCommerce['name'])}}
		</title>
    <style>
    	<?php include(public_path().'/plugins/bootstrap-4.4.1/dist/css/bootstrap.css');?>
    	.page-break {
    	    page-break-after: always;
    	}
    </style>
	</head>
	<body>
		<div>
			@foreach($boards as $index => $board)
			
			@if($loop->last)
				<div class="px-3 py-3" style="border-style: dotted;">
					<div class="border rounded px-3 py-3">
						<div class="text-center pt-3">
							<h2>Mesa nº: {{$index + 1}} </h2>
						</div>
						<img class="card-img-top" src="{{url($board['codeQR'])}}" alt="Card image cap">
						<h5 class="text-center">{{ucwords($arrayCommerce['name'])}}</h5>
						<div class="container">
							Mesa: {{$board['identificable']}} <br>
							{{$arrayCommerce['ubicacion']}} - {{$arrayCommerce['subAdministrativeArea']}} 
						</div>
					</div>
				</div>			        
			@else
				<div class="px-3 py-3" style="border-style: dotted;">
					<div class="border rounded px-3 py-3">
						<div class="text-center">
							<h3>Mesa nº: {{$index + 1}} </h3>
						</div>
						<img class="card-img-top" width="15" src="{{url($board['codeQR'])}}" alt="Card image cap">
						<h5 class="text-center">{{ucwords($arrayCommerce['name'])}}</h5>
						<div class="container">
							ID: {{$board['identificable']}} <br>
							{{$arrayCommerce['ubicacion']}} - {{$arrayCommerce['subAdministrativeArea']}} 
						</div>
					</div>
				</div>
				<div class="page-break"></div>
			@endif		
			
			@endforeach
			
		</div>
	</body>	
</html>


