<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class eSearchController extends Controller
{


    function index()
    {
     return view('admin.search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('product')
        ->join('manufacturer', 'manufacturer.man_id', '=', 'product.man_id')
         ->where('pro_name', 'like', '%'.$query.'%')
         ->orWhere('man_name', 'like', '%'.$query.'%')
         ->orderBy('pro_name', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('product')
         ->orderBy('pro_id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->pro_id.'</td>
         <td>'.$row->man_name.'</td>
         <td>'.$row->pro_name.'</td>
         <td>'.$row->created_at.'</td>
         <td>'.$row->updated_at.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }


  
    // public function index()
    // {
    //     return view('admin.search');
    // }


    // public function search(Request $request)
 
    //     {
         
    //             if($request->ajax())
                 
    //             {
                 
    //             $output="";
                 
    //             $products=DB::table('product')->where('pro_name','LIKE','%'.$request->search."%")->get();
                 
    //             if($products)
                 
    //                 {
                 
    //                     foreach ($products as $key => $product) 
    //                     {
                         
    //                     $output.='<tr>'.
                         
    //                     '<td>'.$product->pro_id.'</td>'.
                         
    //                     '<td>'.$product->pro_name.'</td>'.
                         
    //                     '<td>'.$product->created_at.'</td>'.
                         
    //                     '<td>'.$product->updated_at.'</td>'.
                         
    //                     '</tr>';
                         
    //                     }
                         
                         
                         
    //                     return Response($output);
                 
                 
                 
    //                }
                 
                 
                 
    //             }
                 
         
         
    //     }
 

    
}
