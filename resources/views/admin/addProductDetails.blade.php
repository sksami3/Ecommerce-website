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

<h2>Product Detalis</h2>

<table>
  <tr>
    <th>Product Name</th>
    <th>Catagory Name</th>
    <th>Sub Catagory Name</th>
    <th>Manufacturer Name</th>
    <th>Made In</th>
    <th>Add Details</th>
  </tr>
@foreach($value as $v)
  <tr>
    <td>{{$v->pro_name}}</td>
    <td>{{$v->cat_name}}</td>
    <td>{{$v->sub_cat_name}}</td>
    <td>{{$v->man_name}}</td>
    <td>{{$v->made_in}}</td>
    <td><a href="{{route('productdetails.faddProductDetails',[$v->pro_id])}}">Add Details</a></td>
  </tr>
@endforeach

</table>



</body>
</html>
@endsection
