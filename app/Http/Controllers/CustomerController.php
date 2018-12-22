<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Product_Details;
use App\Catagory;
use App\Sub_Catagory;
use App\Manufacturer;
use App\Register;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro_det=Product_Details::all();
        $pro_det_latest=Product_Details::orderBy('pro_det_id', 'desc')->get();
        $cat=Catagory::all();
       

        return view('customer.index')
               ->with('p',$pro_det)
               ->with('pl',$pro_det_latest)
               ->with('c',$cat);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('customer.register');
               
    }
        

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'=>'Required|email|unique:register',
            'password'=>'Required|min:4'
        ]);

        $st = str_random(6);

        date_default_timezone_set('Asia/Dhaka');
        $register = new Register();
        $register->email = $request->email;
        $register->password = $request->password;
        $register->type = 'customer';
        $register->username = $st;
        $register->save();
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro_det = DB::table('product_details')
                        ->join('product', 'product.pro_id', '=', 'product_details.p_id')
                        ->join('sub_catagory', 'sub_catagory.sub_cat_id', '=', 'product.sub_cat_id')
                        ->join('catagory', 'catagory.id', '=', 'product.cat_id')
                        ->join('manufacturer', 'manufacturer.man_id', '=', 'product.man_id')
                        ->join('supplier', 'supplier.supp_id', '=', 'product_details.supp_id')
                        ->where('catagory.id', '=', $id)
                        ->get();

            return view('customer.productswithcat')
                    ->with('pd',$pro_det);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    public function buy($id)
    {
        $pro_det = DB::table('product_details')
                        ->join('product', 'product.pro_id', '=', 'product_details.p_id')
                        ->join('sub_catagory', 'sub_catagory.sub_cat_id', '=', 'product.sub_cat_id')
                        ->join('catagory', 'catagory.id', '=', 'product.cat_id')
                        ->join('manufacturer', 'manufacturer.man_id', '=', 'product.man_id')
                        ->join('supplier', 'supplier.supp_id', '=', 'product_details.supp_id')
                        ->where('product_details.pro_det_id', '=', $id)
                        ->get();
        $sc = Sub_Catagory::all();
         $man=Manufacturer::all();

         $relp = DB::table('product_details')
                        ->join('product', 'product.pro_id', '=', 'product_details.p_id')
                        ->join('sub_catagory', 'sub_catagory.sub_cat_id', '=', 'product.sub_cat_id')
                        ->where('sub_catagory.sub_cat_id', '=', 'product.sub_cat_id')
                        ->get();

                        

       return view('customer.product_detail')
                    ->with('pd',$pro_det)
                    ->with('sc',$sc)
                    ->with('relp',$relp)
                    ->with('man',$man);
    }

    public function bought(Request $request,$id)
    {
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
