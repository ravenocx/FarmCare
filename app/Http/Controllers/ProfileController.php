<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index() {
        $user = Auth::guard('user')->user();
        return view('pages.user.profile.edit', compact('user')); 
    }

    public function update(Request $request){
        try{
            $user = Auth::guard('user')->user();
            $request->validate([
                'name' => 'required|string',
                'phonenumber' => 'required|string|regex:/^[0-9+\s]+$/|min:10',
                'email' => 'required|string',
                'address' => 'required|string',
            ]);
            if($request->hasFile('photo')){
                if(Storage::disk('public')->exists('profile/'. $user->photo)){
                    Storage::disk('public')->delete('profile/'. $user->photo);
                }
                $filenameExt = $request->file('photo')->getClientOriginalName();
                $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
                $extension = $request->file('photo')->getClientOriginalExtension();
                $filenameSave = $filename.'_'.time().'.'.$extension;
                $request->file('photo')->storeAs('public/profile', $filenameSave);
                $user->update(['photo' => $filenameSave]);
            }
            
            if($request->password){
                if($request->password !== $request->password_confirmation){
                    return redirect()->back()->with('error', 'password confirmation does not match with the password');
                }
                $user->update(['password' => $request->password]);
                
            }
            
            $user->update([
                'name' => $request->name,
                'phone_number' => $request->phonenumber,
                'email' => $request->email,
                'address' => $request->address,
            ]);
            return redirect()->back()->with('success', 'Data Already Updated!');
        }catch(\Exception $e) {
            dd($e->getMessage());
            return redirect()->back();
        }
        // dd($request);
        
        
        
    }

    public function destroy(){
        $user = Auth::user();

        $user->delete();

        return view('welcome');
    }
}
