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

<h2>catagory Detalis</h2>

<table>
  <tr>
    <th>Catagory Id</th>
    <th>Catagory Name</th>
    <th>Modify Catagory</th>
    <th>Delete</th>
    
  </tr>


@foreach ($catagories as $catagorie)
  <tr>
    
    <td>{{$catagorie->id}}</td>
    <td>{{$catagorie->cat_name}}</td>
    <td><a href="{{route('catagory.modifyCatagory', [$catagorie->id])}}">Modify Catagory</a></td>
    <td><a href="{{route('catagory.delete', [$catagorie->id])}}">Delete</a></td>

  </tr>
@endforeach

   

</table>

</body>
</html>
@endsection

