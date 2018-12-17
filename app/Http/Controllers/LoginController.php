<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class LoginController extends Controller
{
    public function index(Request $request){


        return view('login.index')->with('name', $request->email);
    }

    public function verify(Request $request){


        $validator = Validator::make($request->all(), [

            'email'=>'Required|email',
            'password'=>'required|min:1',
        ])->validate();


        
        $email = $request->email;
        $password = $request->input('password');
     
        $admin = DB::table('admin')
                ->where('email', $email)
                ->where('password', $password)
                ->first();

        $employee = DB::table('employes')
                ->where('email', $email)
                ->where('password', $password)
                ->first();

        $customer = DB::table('customer')
                ->where('email', $email)
                ->where('password', $password)
                ->first();



        if($admin != null){

            $request->session()->put('admin', $admin->username);
            
            return redirect()->route('admin.index');

            
        }
        else if($employee != null)
        {

                $request->session()->put('loggedAdmin', $employee);
                
                return redirect()->route('admin.index');

        }

        else if($customer != null)
        {

            $request->session()->put('id', $customer->id);
                    
            return redirect()->route('admin.index');
        }

        else
        {
            $request->session()->flash('message','Please check username and password again');
            return redirect()->route('login.index');
        }
        

        
        
    }
}