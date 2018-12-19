<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use App\Sub_Catagory;
use App\Product;
use Illuminate\Http\Request;
use DB;
use Validator;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manu = DB::table('manufacturer')
                        ->join('sub_catagory', 'sub_catagory.sub_cat_id', '=', 'manufacturer.sub_cat_id')
                        ->join('catagory', 'catagory.id', '=', 'sub_catagory.cat_id')
                        ->get();
                        //echo $manu;
                        
        return view('admin.showManufacturer')->with('manu',$manu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$sub = Sub_Catagory::all();

        $sub = DB::table('sub_catagory')
                        ->join('catagory', 'catagory.id', '=', 'sub_catagory.cat_id')
                        ->get();


        return view('admin.addManufacturer')->with('s',$sub);
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

            'man_name'=>'Required',
            'made_in'=>'Required'
        ])->validate();


        date_default_timezone_set('Asia/Dhaka');
        $man = new Manufacturer();
        $man->man_name = $request->man_name;
        $man->isDelete = 'false';
        $man->sub_cat_id = $request->dd;
        $man->made_in = $request->made_in;
        $man->save();
        return redirect()->route('manufacturer.showManufacturer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manu = DB::table('manufacturer')
                        ->join('sub_catagory', 'sub_catagory.sub_cat_id', '=', 'manufacturer.sub_cat_id')
                        ->join('catagory', 'catagory.id', '=', 'sub_catagory.cat_id')
                        ->where('manufacturer.man_id', '=', $id)
                        ->get();
                        //echo $manu;
                        
        return view('admin.modifyManufacturer')->with('manu',$manu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         $validator = Validator::make($request->all(), [

            'man_name'=>'Required',
            'made_in'=>'Required'
        ])->validate();

         
        $man=Manufacturer::find($request->man_id);
        $man->man_name=$request->man_name;
        $man->made_in=$request->made_in;
        $man->save();

        return redirect()->route('manufacturer.showManufacturer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $a = DB::table('product')->where('man_id', '=', $id)->get();
         Manufacturer::destroy($id);
         DB::table('product')->where('man_id', '=', $id)->delete();
         


       
        foreach ($a as $a) {
            //echo $a->pro_id;
           // $temp = DB::table('product_details')->where('p_id', '=', $a->pro_id)->delete();
            DB::table('product_details')->where('p_id', '=', $a->pro_id)->delete();

        }
        
       
        return redirect()->route('manufacturer.showManufacturer');
    }
}
