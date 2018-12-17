@extends('admin.layout')


@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>Add Supplier</title>
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
	<h3 align="center">Add Catagory</h3>
	<div align="center">
		<form method="post">
			{{ csrf_field() }}
			<label>Supplier Name:</label>
			<input id="textboxid" type="text" name="supp_name" placeholder="Supplier Name"><br><br>

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
