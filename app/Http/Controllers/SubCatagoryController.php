<?php

namespace App\Http\Controllers;

use App\Sub_Catagory;
use App\Catagory;
use Validator;
use Illuminate\Http\Request;
use DB;

class SubCatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sc = DB::table('sub_catagory')
                        ->join('catagory', 'sub_catagory.cat_id', '=', 'catagory.id')
                        ->get();
                        
        return view('admin.showSubCatagory')->with('sc',$sc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Catagory::all();
        return view('admin.addSubCatagory')->withCat($cat);
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

            'sub_cat_name'=>'Required|unique:sub_catagory'
        ])->validate();


         
        date_default_timezone_set('Asia/Dhaka');
        $sub_catagory = new Sub_Catagory();
        $sub_catagory->sub_cat_name = $request->sub_cat_name;
        $sub_catagory->isDelete = 'false';
        $sub_catagory->created_by = session('loggedAdmin')->email;
        $sub_catagory->cat_id = $request->dd;
        $sub_catagory->save();
        return redirect()->route('subCatagory.showSubCatagory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sub_Catagory  $sub_Catagory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sub_Catagory  $sub_Catagory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sc = DB::table('sub_catagory')
                        ->join('catagory', 'catagory.id', '=', 'sub_catagory.cat_id')
                        ->where('sub_catagory.sub_cat_id', '=', $id)
                        ->get();             
        return view('admin.modifySubCatagory')->with('sc',$sc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sub_Catagory  $sub_Catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [

            'sub_cat_name'=>'Required|unique:sub_catagory'
        ])->validate();

        
        $sub_catagory=Sub_Catagory::find($request->SCID);
        $sub_catagory->sub_cat_name=$request->sub_cat_name;
        $sub_catagory->save();

        return redirect()->route('subCatagory.showSubCatagory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sub_Catagory  $sub_Catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = DB::table('product')->where('sub_cat_id', '=', $id)->get();
         Sub_Catagory::destroy($id);
         DB::table('product')->where('sub_cat_id', '=', $id)->delete();
         DB::table('manufacturer')->where('sub_cat_id', '=', $id)->delete();
        
         if($a!=null){
        foreach ($a as $a) {
            //echo $a->pro_id;
           // $temp = DB::table('product_details')->where('p_id', '=', $a->pro_id)->delete();
            DB::table('product_details')->where('p_id', '=', $a->pro_id)->delete();

            }
        }
        return redirect()->route('subCatagory.showSubCatagory');
    }
}
