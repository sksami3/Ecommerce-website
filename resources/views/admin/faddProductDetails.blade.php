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
	<h3 align="center">Add Product's Details</h3>
	<div align="center">
		<form method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div>
			<label>Supplier List:</label><br>
			
			 <select name="dd">
			 	@foreach ($s as $s)
			  <option value="{{$s->supp_id}}">{{$s->supp_name}}</option>
			  @endforeach
			</select> 
			</div><br>

			<div align="center">
				
		     <label>Upload Product's Picture: </label><br>
		     <input type="file" name="image" /><br><br>
				   
				
			</div>
			<label>Product Name:</label><br>
			<input id="textboxid" readonly="readonly" value="{{$p->pro_name}}" type="text" name="pro_name" placeholder=""><br><br>
			<input id="textboxid" readonly="readonly" value="{{$p->pro_id}}" type="hidden" name="pro_id" placeholder=""><br><br>
			<input id="textboxid" readonly="readonly" value="{{$p->man_id}}" type="hidden" name="man_id" placeholder=""><br><br>

			<label>Price:</label><br>
			<input id="textboxid" type="number" name="price" placeholder="Price"><br><br>

			<label>Quantity:</label><br>
			<input id="textboxid" type="number" name="quantity" placeholder="Quantity"><br><br>

			<label>Discount:</label><br>
			<input id="textboxid" type="number" name="discount" placeholder="Discount"><br><br>

			<label>Details:</label><br>
			<input id="textboxid" type="text" name="php" placeholder="Product's Highliting POints"><br><br>

			

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