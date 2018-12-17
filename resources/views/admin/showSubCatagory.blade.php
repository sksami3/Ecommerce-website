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
    <th>SubCatagory Id</th>
    <th>Catagory Name</th>
    <th>SubCatagory Name</th>
    <th>Modify Catagory</th>
    <th>Delete</th>
    
  </tr>

  @foreach ($sc as $sCs)
  <tr>
    <td>{{$sCs->sub_cat_id}}</td>
    <td>{{$sCs->cat_name}}</td>
    <td>{{$sCs->sub_cat_name}}</td>
    <td><a href="{{route('subcatagory.modifySubCatagory', [$sCs->sub_cat_id])}}">Modify Sub Catagory</a></td>
    <td><a href="{{route('subCatagory.delete', [$sCs->sub_cat_id])}}">Delete</a></td>
  </tr>
  @endforeach

   

</table>

</body>
</html>
@endsection
