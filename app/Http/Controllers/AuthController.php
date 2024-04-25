<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Hash;
use App\Models\User;
use App\Models\Veterinarian;

class AuthController extends Controller
{
    public function login(){
        if(Auth::guard('user')->check()){
            return redirect()->route('home');
        }

        if(Auth::guard('veterinarian')->check()){
            return redirect()->route('dashboard');
        }

        return view("pages.login.index");
    }

    public function loginSubmit(Request $request){
        $data= $request->all();
        $isRemember = $request -> filled('rememberme');
        
        if(Auth::guard('user')->attempt(['email'=>$data['email'],'password'=>$data['password']],$isRemember)){
            Session::put('user',$data['email']);
            request()->session()->flash('success','Successfully login');
            return redirect()->route('home');
        }

        if(Auth::guard('veterinarian')->attempt(['email'=>$data['email'],'password'=>$data['password']],$isRemember)){
            $veterinarian = Auth::guard('veterinarian')->user();

            if($veterinarian->is_accepted){
                Session::put('veterinarian',$data['email']);
                request()->session()->flash('success','Successfully login');
                return redirect()->route('dashboard');
            }else{
                Auth::guard('veterinarian')->logout();
                request()->session()->flash('error','Your account has not been accepted yet.');
                return redirect()->back();
            }
        }

        request()->session()->flash('error','Invalid email and password please try again!');
        return redirect()->back();
    }

    public function logout(){
        if(Auth::guard('user')->check()){
            Session::forget('user');
        }

        if(Auth::guard('veterinarian')->check()){
            Session::forget('veterinarian');
        }
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return redirect()->back();
    }

    public function userRegister(){
        if(Auth::guard('user')->check()){
            return redirect()->route('home');
        }

        if(Auth::guard('veterinarian')->check()){
            return redirect()->route('dashboard');
        }

        return view('pages.user.register.index');
    }

    public function userRegisterSubmit(Request $request){
        $this->validate($request,[
            'fullName'=>'string|required|min:5',
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

    public function veterinarianRegisterSubmit(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'fullName'=>'string|required|min:5',
            'specialist'=>'string|required|in:Livestock,Aquaculture,Poultry,Nutrition,Breeding,Dermatology',
            'university'=>'string|required|min:5',
            'graduateYear' => 'required|integer|min:1900|max:' . date('Y'),
            'email'=>'string|required|unique:veterinarians,email',
            'password'=>'required|min:6|confirmed',
            'certification' => 'required|file|mimes:pdf|max:10240'
        ]);

        if($request->hasFile('certification')){
            $certificationFile = $request->file('certification');
            // Set the file name
            $certificationFileName = time() . ' - ' . $request->fullName . '_Certification'. '.' . $certificationFile->extension();
            $certificationPath = $certificationFile->storeAs('public/certifications',$certificationFileName);
        }else{
            request()->session()->flash('error','The certification file is required.');
            return redirect()->back();
        }

        $data= $request->all();

        $result = Veterinarian::create([
            'name'=> $data['fullName'],
            'specialist'=>$data['specialist'],
            'university' => $data['university'],
            'graduate_year' => $data['graduateYear'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password']),
            'certification' => $certificationPath,
        ]);

        if($result){
            request()->session()->flash('success','Successfully registered');
            return redirect()->route('login.form');
        }else{
            request()->session()->flash('error','Please try again!');
            return redirect()->back();
        }
    }
}
