<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view("pages.login.index");
    }

    public function loginSubmit(Request $request){
        $data= $request->all();
        $isRemember = $request -> filled('rememberme');
        
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']],$isRemember)){
            Session::put('user',$data['email']);
            request()->session()->flash('success','Successfully login');
            return redirect()->route('home');
        }

        request()->session()->flash('error','Invalid email and password please try again!');
        return redirect()->back();
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return redirect()->back();
    }

    public function userRegister(){
        return view('pages.user.register.index');
    }

    public function userRegisterSubmit(Request $request){
        $this->validate($request,[
            'fullName'=>'string|required|min:3',
            'phoneNumber'=> 'string|required|min:12',
            'email'=>'string|required|unique:users,email',
            'password'=>'required|min:6|confirmed',
        ]);
        $data= $request->all();
        
        $result = User::create([
            'name'=> $data['fullName'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password']),
            'phone_number'=> $data['phoneNumber'],
        ]);

        if($result){
            request()->session()->flash('success','Successfully registered');
            return redirect()->route('login.form');
        }else{
            request()->session()->flash('error','Please try again!');
            return redirect()->back();
        }
    }

    public function veterinarianRegister(){
        return view('pages.veterinarian.register.index');
    }

    public function veterarianRegisterSubmit(Request $request){
        $this->validate($request,[
            
        ]);
    }
}
