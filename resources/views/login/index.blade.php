<html>
<head>
	<title>Login | Page</title>
	
            
          
                
            
            
</head>
<body>
	<div align="center">

		<a href="{{route('customer.index')}}">Home</a>
	<form method="post">
		{{@csrf_field()}}
		<h1>Welcome to Ecommerce Site</h1>
		<h3>
		
	</h3>

		<table >
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" /></td>
			</tr>
		</br>
			<tr>
				<td></td>
				<td><input type="submit" value="Login" name="Login" ><input type='reset' value='Reset' style='color:green'>
					</td>
			</tr>
		</table>
		<b>new user?</b><a href="{{route('customer.create')}}""> Click here to register</a>

	</form>
		<p>{{session('message')}}</p>
	</div>

</body>
</html>