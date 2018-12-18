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
     
        $admin = DB::table('register')
                ->where('email', $email)
                ->where('password', $password)
                ->where('type', 'admin')
                ->first();

        $customer = DB::table('register')
                ->where('email', $email)
                ->where('password', $password)
                ->where('type', 'customer')
                ->first();



        if($admin != null)
        {

                $request->session()->put('loggedAdmin', $admin);
                
                return redirect()->route('admin.index');

        }

        else if($customer != null)
        {

            $request->session()->put('loggedCustomer', $customer);
                    
            return redirect()->route('customer.index');
        }

        else
        {
            $request->session()->flash('message','Please check username and password again');
            return redirect()->route('login.index');
        }
        

        
        
    }
}