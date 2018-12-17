<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use DB;
use Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supp = Supplier::all();

        return view('admin.showSupplier')->withSupp($supp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addSupplier');
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

            'supp_name'=>'Required|unique:supplier'
        ])->validate();



        date_default_timezone_set('Asia/Dhaka');
        $supp = new Supplier();
        $supp->supp_name = $request->supp_name;
        $supp->isDelete = 'false';
        $supp->save();
        return redirect()->route('supplier.showSupplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $s = Supplier::find($id);

        return view('admin.modifySupplier')->withS($s);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [

            'supp_name'=>'Required|unique:supplier'
        ])->validate();

        
        $supp=Supplier::find($request->supp_id);
        $supp->supp_name=$request->supp_name;
        $supp->save();

        return redirect()->route('supplier.showSupplier');
    }

    public function destroy($id)
    {
        Supplier::destroy($id);
        DB::table('product_details')->where('supp_id', '=', $id)->delete();

        return redirect()->route('supplier.showSupplier');
    }
}
