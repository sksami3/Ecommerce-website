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
	<h3 align="center">Modify Supplier</h3>
	<div align="center">
		<form method="post">

			{{csrf_field()}}
			<label>Supplier Name:</label>
			<input id="textboxid" type="text" name="supp_name" value="{{$s->supp_name}}"><br><br>
			<input type="hidden" name="supp_id" value="{{$s->supp_id}}"><br><br>

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
