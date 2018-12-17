@extends('admin.layout')


@section('content')


<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Subcatagory Detalis</h2>

<table>
  <tr>
    <th>Product Id</th>
    <th>Manufacturer Name</th>
    <th>Product Name</th>
    <th>Modify Product</th>
    <th>Delete</th>
    
  </tr>
@foreach ($p as $p)
  <tr>
    <td>{{$p->pro_id}}</td>
    <td>{{$p->man_name}}</td>
    <td>{{$p->pro_name}}</td>
    <td><a href="{{route('product.modifyProduct',[$p->pro_id])}}">Modify Product</a></td>
    <td><a href="{{route('product.delete',[$p->pro_id])}}">Delete</a></td>
  </tr>
@endforeach
  

   

</table>

</body>
</html>
@endsection
