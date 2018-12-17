<?php

namespace App\Http\Controllers;

use App\Catagory;
use Illuminate\Http\Request;
use DB;
use Validator;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagories = Catagory::all();
        // $catagories = DB::table('catagory')->get();

        return view('admin.showCatagory')->with('catagories',$catagories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'cat_name'=>'Required|unique:catagory'
        ]);

        

        date_default_timezone_set('Asia/Dhaka');
        $catagory = new Catagory();
        $catagory->cat_name = $request->cat_name;
        $catagory->isDelete = 'false';
        $catagory->save();
        return redirect()->route('catagory.showCatagory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function show(Catagory $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $catagorie = Catagory::find($id);

        // echo($catagorie);
        return view('admin.modifyCatagory')->with('catagorie',$catagorie);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'cat_name'=>'Required|unique:catagory'
        ]);

        
        $catagory=Catagory::find($request->id);
        $catagory->cat_name=$request->cat_name;
        $catagory->save();

        return redirect()->route('catagory.showCatagory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $a = DB::table('sub_catagory')->where('cat_id', '=', $id)->get();
         $b = DB::table('product')->where('cat_id', '=', $id)->get();

        Catagory::destroy($id);
        DB::table('sub_catagory')->where('cat_id', '=', $id)->delete();
         DB::table('product')->where('cat_id', '=', $id)->delete();
         
        foreach ($a as $a) {
            //echo $a->pro_id;
           // $temp = DB::table('product_details')->where('p_id', '=', $a->pro_id)->delete();
            DB::table('manufacturer')->where('sub_cat_id', '=', $a->sub_cat_id)->delete();

        }

        foreach ($b as $b) {
            //echo $a->pro_id;
           // $temp = DB::table('product_details')->where('p_id', '=', $a->pro_id)->delete();
            DB::table('product_details')->where('p_id', '=', $b->pro_id)->delete();

        }
        return redirect()->route('catagory.showCatagory');
    }
}
