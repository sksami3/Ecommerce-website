<html>
<head>
	<title>Edit Product Details</title>
</head>
<body>
	
	<form method="post">
		{{@csrf_field()}}

		<div align="center">
			<h1>Edit Product Details</h1>
		<table>

			

			<tr>
				<label><b>Product Picture</b> </label><br>
				<img src="{{ asset($p->picture) }}" width="150px" /><br>
			</tr>

			<tr>
				<td><b>Product Name</b></td>
				<td><input name="product_name" value="{{$p->product_name}}"/></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input  name="price" value="{{$p->price}}"/></td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="text" name="quantity" value="{{$p->quantity}}"/></td>
			</tr>
			<tr>
				<td>Discount</td>
				<td><input type="text" name="discount" value="{{$p->discount}}"/></td>
			</tr>
			<tr>
				<td>Details</td>
				<td><input type="text" name="writing" value="{{$p->writing}}"/></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" value="Update"/></td>
			</tr>
		</table>

		</div>
		<input type="hidden" name="pro_det_id" value="{{$p->pro_det_id}}"/>

	</form>

	@if($errors->any())
				@foreach($errors->all() as $err)
				{{$err}} <br>
				@endforeach
			@endif



</body>
</html>