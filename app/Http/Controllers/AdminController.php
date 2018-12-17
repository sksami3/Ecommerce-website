<?php

namespace App\Http\Controllers;
use App\Catagory;
use App\Sub_Catagory;
use App\Product;
use App\Product_Details;
use App\Manufacturer;
use App\Supplier;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        return view('admin.create');
    }

     public function store(Request $request)
    {

        return redirect()->route('home.index');
    }
    public function edit(Request $request)
    {

        return view('admin.edit');
    }
    public function update(Request $request)
    {

        return redirect()->route('home.index');
    }

    public function show(Request $request)
    {
        //$user=User::find($id);
        return view('admin.show');
    }
    public function delete(Request $request)
    {
        //$user=User::find($id);
        return view('admin.delete');
    }





    public function index()
    {
        $cat = Catagory::count();
        $sub_cat = Sub_Catagory::count();
        $supp = Supplier::count();
        $man = Manufacturer::count();
        $pro = Product::count();
        $pd = Product_Details::count();



        return view('admin.index')
                ->withCat($cat)
                ->withScat($sub_cat)
                ->withSupp($supp)
                ->withMan($man)
                ->withPro($pro)
                ->withPd($pd);
    }






    public function addCatagory()
    {
        return view('admin.addCatagory');
    }

    public function addSubCatagory()
    {
        return view('admin.addSubCatagory');
    }

     public function addManufacturer()
    {
        return view('admin.addManufacturer');
    }

    public function addSupplier()
    {
        return view('admin.addSupplier');
    }

    public function addProduct()
    {
        return view('admin.addProduct');
    }

    public function addProductDetails()
    {
        return view('admin.addProductDetails');
    }

    public function faddProductDetails($id)
    {
        return view('admin.faddProductDetails');
    }

    public function showCatagory()
    {
        return view('admin.showCatagory');
    }

    public function modifyCatagory($id)
    {
        return view('admin.modifyCatagory');
    }

    public function showSubCatagory()
    {
        return view('admin.showSubCatagory');
    }

    public function modifySubCatagory($id)
    {
        return view('admin.modifySubCatagory');
    }

    public function showManufacturer()
    {
        return view('admin.showManufacturer');
    }

     public function modifyManufacturer()
    {
        return view('admin.modifyManufacturer');
    }

     public function showProduct()
    {
        return view('admin.showProduct');
    }


     public function showSupplier()
    {
        return view('admin.showSupplier');
    }

     public function modifySupplier($id)
    {
        return view('admin.modifySupplier');
    }

     public function modifyProduct($id)
    {
        return view('admin.modifyProduct');
    }








    
}
