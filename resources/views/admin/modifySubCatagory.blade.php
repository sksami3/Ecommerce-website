
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
	<h3 align="center">Modify SubCatagory</h3>
	<div align="center">
		<form method="POST">

			{{ csrf_field() }}
			<label>Catagory Name:</label>
			<input id="textboxid" type="text" name="CatagoryName" value="{{$sc[0]->cat_name}}" readonly="readonly"><br><br>
			<input type="hidden" name="SCID" value="{{$sc[0]->sub_cat_id}}" ><br><br>

			<label>SubCatagory Name:</label>
			<input id="textboxid" type="text" name="sub_cat_name" value="{{$sc[0]->sub_cat_name}}"><br><br>

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
