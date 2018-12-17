<?php

namespace App\Http\Controllers;

use App\Product;
use App\Manufacturer;
use Illuminate\Http\Request;
use DB;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('product')
                        ->join('manufacturer', 'manufacturer.man_id', '=', 'product.man_id')
                        ->get();
                        //echo $product;
        return view('admin.showProduct')->with('p',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $man = Manufacturer::all();
        return view('admin.addProduct')->withM($man);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'pro_name'=>'Required|unique:product'
        ])->validate();



        $ganjam = DB::table('manufacturer')
                        ->join('sub_catagory', 'sub_catagory.sub_cat_id', '=', 'manufacturer.sub_cat_id')
                        ->join('catagory', 'catagory.id', '=', 'sub_catagory.cat_id')
                        ->where('manufacturer.man_id', '=', $request->dd)
                        ->get();

                        //echo $ganjam;
        if($ganjam!=null){
        date_default_timezone_set('Asia/Dhaka');
        $pro = new Product();
        $pro->pro_name = $request->pro_name;
        $pro->isDelete = 'false';
        $pro->cat_id = $ganjam[0]->cat_id;
        $pro->sub_cat_id = $ganjam[0]->sub_cat_id;
        $pro->man_id = $ganjam[0]->man_id;
        $pro->save();
        return redirect()->route('product.showProduct');
     }
     else
        echo "error";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('product')
                        ->join('manufacturer', 'manufacturer.man_id', '=', 'product.man_id')
                        ->where('product.pro_id', '=', $id)
                        ->get();
                        //echo $product;
        return view('admin.modifyProduct')->with('p',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [

            'pro_name'=>'Required|unique:product'
        ])->validate();

        
        $pro=Product::find($request->pro_id);
        $pro->pro_name=$request->pro_name;
        $pro->save();

        return redirect()->route('product.showProduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        DB::table('product_details')->where('p_id', '=', $id)->delete();

        return redirect()->route('product.showProduct');
    }
}
