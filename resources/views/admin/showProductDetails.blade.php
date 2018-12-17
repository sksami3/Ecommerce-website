@extends('admin.layout')


@section('content')


<!DOCTYPE html>
<html>
<head>
	<title>showDetail</title>

	<style type="text/css">
		div.solid {border-style: solid; width: 15%;
  border: 2px solid black;}
	</style>
</head>
<body>
	@foreach($p as $p)
	<div class="solid" float="left" clear="all">
		<div align="center">
		<img src="{{ asset($p->picture) }}" width="150px"><br>
		<label><h3><a href="{{route('productdetails.show',[$p->pro_det_id])}}">{{$p->product_name}}</a> </h3></label>
		<label>Price: {{$p->price}} taka</label><br>
		<label>Number Of Products: {{$p->quantity}}</label><br>
		<label>Discount: {{$p->discount}}%</label><br>
		<label><h2><a href="{{route('productdetails.delete',[$p->pro_det_id])}}">Delete</a> </h2></label>
		</div>
		

		
	</div>
	@endforeach

</body>
</html>
@endsection