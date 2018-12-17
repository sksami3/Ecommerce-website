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

<h2>Manufacture Detalis</h2>

<table>
  <tr>
    <th>Manufacture Id</th>
    <th>Catagory Name</th>
    <th>SubCatagory Name</th>
    <th>Manufacture Name</th>
     <th>Made In</th>
    <th>Modify Manufacture</th>
    <th>Delete</th>
    
  </tr>
@foreach($manu as $m)
  <tr>
    <td>{{$m->man_id}}</td>
    <td>{{$m->cat_name}}</td>
    <td>{{$m->sub_cat_name}}</td>
    <td>{{$m->man_name}}</td>
    <td>{{$m->made_in}}</td>
    <td><a href="{{route('manufacturer.modifyManufacturer',[$m->man_id])}}">Modify Manufacturer</a></td>
    <td><a href="{{route('manufacturer.delete',[$m->man_id])}}">Delete</a></td>
  </tr>
 @endforeach 

  

   

</table>

</body>
</html>
@endsection