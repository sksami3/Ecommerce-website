<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chart;
use App\Product_Details;
use DB;

class ChartController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $b = Product_Details::find($request->pro_det_id);
        $a = DB::table('product')->where('pro_id', '=', $b->p_id)->get();
        
        date_default_timezone_set('Asia/Dhaka');
        $chart = new Chart();
        $chart->pro_det_id = $request->pro_det_id;
        $chart->pro_name = $a[0]->pro_name;
        $chart->price = $request->price;
        $chart->picture = $request->picture;
        $chart->quantity = $request->quantity;
        $chart->customer = session('loggedCustomer')->email;
        $chart->total_price = $request->price*$request->quantity;
        $chart->save();


        $productdetails=Product_Details::find($request->pro_det_id);
        $productdetails->quantity=$productdetails->quantity-$request->quantity;
        $productdetails->save();


        return redirect()->route('chart.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $totalP=0;
        $cart=Chart::where('customer', session('loggedCustomer')->email)->get();
        for ($i=0; $i < count($cart); $i++) { 
            $totalP = $totalP+$cart[$i]->total_price;
        }


        return view('customer.cart')
                ->with('c',$cart)
                ->withTp([
                'tp' => $totalP,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=Chart::find($id);
        

        $a = DB::table('product_details')->where('pro_det_id', '=', $c->pro_det_id)->get();

        $prod = Product_Details::find($a[0]->pro_det_id);


        $prod->quantity=$c->quantity+$prod->quantity;
        $prod->save();

        Chart::destroy($id);


        return redirect()->route('chart.list');

    }
}
