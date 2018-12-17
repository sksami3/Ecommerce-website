<?php

namespace App\Http\Controllers;

use App\Product_Details;
use App\Product;
use App\Supplier;
use Illuminate\Http\Request;
use DB;
use Validator;

class ProductDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ganjam = DB::table('product')
                        ->join('manufacturer', 'manufacturer.man_id', '=', 'product.man_id')
                        ->join('sub_catagory', 'sub_catagory.sub_cat_id', '=', 'product.sub_cat_id')
                        ->join('catagory', 'catagory.id', '=', 'product.cat_id')
                        ->where('product.isDelete','=','false')
                        ->get();

                   //echo $ganjam;     

        return view('admin.addProductDetails')->withValue($ganjam);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product_Details  $product_Details
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pd = Product_Details::all();
        //echo $pd;
        return view('admin.showProductDetails')->withP($pd);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product_Details  $product_Details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pd = Product_Details::find($id);
        //echo $pd;
        return view('admin.product_details')->withP($pd);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product_Details  $product_Details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'product_name'=>'Required',
            'price'=>'Required|min:1',
            'quantity'=>'Required||integer|min:1',
            'discount'=>'Required',
            'writing'=>'Required'
        ]);


        $productdetails=Product_Details::find($request->pro_det_id);
        $productdetails->product_name=$request->product_name;
        $productdetails->price=$request->price;
        $productdetails->quantity=$request->quantity;
        $productdetails->discount=$request->discount;
        $productdetails->writing=$request->writing;
        $productdetails->save();

        return redirect()->route('prodet.showProdit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product_Details  $product_Details
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $a = DB::table('product_details')->where('pro_det_id', '=', $id)->get();

        


        Product_Details::destroy($id);


        $product=Product::find($a[0]->p_id);
        $product->isDelete='false';
        $product->save();

        

        return redirect()->route('prodet.showProdit');
    }

    public function faddProductDetails(Request $request,$id)
    {
        
        $pd = Product::find($id);
        $s = Supplier::all();
        //echo $pd;
        return view('admin.faddProductDetails')->withS($s)->withP($pd);
    }

    public function fstoreProductDetails(Request $request)
    {



        $validator = Validator::make($request->all(), [

            'price'=>'Required|min:1',
            'quantity'=>'required|integer|not_in:0|min:1',
            'discount'=>'Required|min:0|max:100'
        ])->validate();



        $string = str_random(30);
        $article = new Product_Details();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_slug($string).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/images');
            $d2 = public_path('uploads\images');
            $imagePath = "uploads\images\ " .  $name;
            $ip=str_replace(" ","",$imagePath);
            $image->move($destinationPath, $name);
            $article->picture = $ip;
          }

          $article->p_id = $request->pro_id;
          //$article->man_id = $request->man_id;
          $article->product_name = $request->pro_name;
          $article->supp_id = $request->dd;
          $article->price = $request->price;
          $article->discount = $request->discount;
          $article->quantity = $request->quantity;
          $article->writing = $request->php;
          //$article->picture = str_slug($request->get('image'));

          $article->save();

          $product=Product::find($request->pro_id);
          $product->isDelete='true';
          $product->save();




          return redirect()->route('prodet.showProdit');

        


    }
}
