
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

<h2>Supplier Detalis</h2>

<table>
  <tr>
    <th>Supplier Id</th>
    <th>Supplier Name</th>
    <th>Modify Catagory</th>
    <th>Delete</th>
    
  </tr>
@foreach($supp as $s)
  <tr>
    <td>{{$s->supp_id}}</td>
    <td>{{$s->supp_name}}</td>
    <td><a href="{{route('supplier.modifySupplier',[$s->supp_id])}}">Modify Supplier</a></td>
    <td><a href="{{route('supplier.destroy',[$s->supp_id])}}">Delete</a></td>
  </tr>
@endforeach

   

</table>

</body>
</html>
@endsection
