@extends('admin.layout')


@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Sub Catagory</title>
</head>

<style type="text/css">
	#textboxid
		{
		    height:20px;
		    width: 1000px;
		    font-size:12pt;
		}

	#sb
	{
		     height:50px;
		    width: 500px;
		    font-size:12pt;
	}

	#dd
	{
		     height:25px;
		    width: 1000px;
		    font-size:12pt;
	}
</style>



<body>
	<h3 align="center">Add Product</h3>
	<div align="center">
		<form method="post">
			{{ csrf_field() }}
			<div>
			<label>Manufacturer Name:</label><br>
			 <select id="dd" name="dd">
			 	@foreach($m as $m)
			  <option value="{{$m->man_id}}">{{$m->man_name}}</option>
			  @endforeach
			</select> 
			</div><br>
			<label>Product Name:</label><br>
			<input id="textboxid" type="text" name="pro_name" placeholder="Product Name"><br><br>
			<input type="Submit" id="sb" value="Submit">
			
		</form>
	</div>

	@if($errors->any())
				@foreach($errors->all() as $err)
				{{$err}} <br>
				@endforeach
			@endif

</body>
</html>

@endsection