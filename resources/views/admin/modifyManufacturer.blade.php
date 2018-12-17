
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
	<h3 align="center">Modify Manufacturer</h3>
	<div align="center">
		<form method="post">

			{{ csrf_field() }}

			<label>Catagory Name:</label>
			<input id="textboxid" type="text" name="CatagoryName" value="{{$manu[0]->cat_name}}" readonly="readonly"><br><br>

			<label>SubCatagory Name:</label>
			<input id="textboxid" type="text" name="SubCatagoryName" value="{{$manu[0]->sub_cat_name}}" readonly="readonly"><br><br>
			<input  type="hidden" name="man_id" value="{{$manu[0]->man_id}}" readonly="readonly">

			<label>Manufacturer Name:</label>
			<input id="textboxid" type="text" name="man_name" value="{{$manu[0]->man_name}}" ><br><br>

			<label>Made In:</label>
			<input id="textboxid" type="text" name="made_in" value="{{$manu[0]->made_in}}" ><br><br>
			

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
