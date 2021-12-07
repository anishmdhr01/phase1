<?php

namespace App\Http\Controllers;

use App\Mail\HamroMail;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    function index(){
        return view('registrations');
    }

    function createUser(Request $request){
        $validate=$request->validate([
            'username'=>'required|string|max:20',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5',
            'cpassword'=>'required|same:password',
        ]);

        $validate['password']=Hash::make($validate['password']);
        Registration::create($validate);
        Mail::to($validate['email'])->send(new HamroMail($validate));
        return redirect('login');
    }

    function login(){
        return view('login');
    }

    function loged(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $registrations = Registration::where('email','=',$email)->first();
        if (!$registrations) {
           return response('Invalid User');
        }
        else{
            if (!Hash::check($password,$registrations->password)) {
                return response('Password not matched');
            } 
            else{
                $request->session()->put('session',$registrations->username);
                $datas=array('email'=>$email,'last_login_at'=>Carbon::now());
                DB::table('login_status')->update($datas);
                return redirect('home');
            }
        }
    }

    function home(Request $request){
        return view('home');
    }

    function logout(Request $request){
        $request->session()->forget('session');
        return redirect('/login');
    }
    
    function contactus(){
        return view('contactus');
    }

    function userlist(){
        $userdata=Registration::all();
        return view('userlist',['userdata'=>$userdata]);
    }

    function useredit($id){
        $userdata=Registration::find($id);
        return view('useredit',['userdata'=>$userdata]);
    }

    function update(Request $request,$id){
        $validate=$request->validate([
            'username'=>'required',
            'email'=>'required',
        ]);
        Registration::find($id)->fill($validate)->save();
        return redirect('userlist')->with('success','Your data has been updated');
    }

    function passwordchange($id){
        $userdata=Registration::find($id);
        return view('passwordchange',['userdata'=>$userdata]);
    }

    function updatepassword(Request $request,$id){
       $validate = $request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required|min:6',
            'confirmpassword'=>'required|same:newpassword',
        ]);
        
        $registrations = Registration::find($id);
        if(Hash::check($validate['oldpassword'],$registrations->password)){
            $validate['newpassword']=Hash::make($validate['newpassword']);
            $registrations->update(['password'=>$validate['newpassword']]);
            return redirect('userlist')->with('success','Your Password has been changed');
       }
       else{
            return back()->with('success','Your old password is wrong');
            // return response('worong');
       }
    }

    function delete($id){
        Registration::find($id)->delete();
        return back()->with('success','Data has been deleted');
    }
}
