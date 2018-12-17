@extends('admin.layout')


@section('content')



<!DOCTYPE html>
<html>
<head>
	<title>Catagory</title>
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
</style>



<body>
	<h3 align="center">Modify Product</h3>
	<div align="center">
		<form method="post">

			{{csrf_field()}}
			<label>Manufacture Name:</label>
			<input id="textboxid" type="text" name="ManuName" value="{{$p[0]->man_name}}" readonly="readonly"><br><br>
            
            <label>Product Name:</label>
			<input id="textboxid" type="text" name="pro_name" value="{{$p[0]->pro_name}}"><br><br>
			<input id="textboxid" type="hidden" name="pro_id" value="{{$p[0]->pro_id}}"><br><br>
            <input type="Submit" id="sb" value="Modify">
			
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
