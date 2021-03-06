<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function getSignup(){
    	return view('user.signup');
    }
    public function postSignup(Request $request){
    	$this->validate($request, [
    		'email' => 'email|required|unique:users',
    		'password' => 'required|min:6'
    		]);
    	$user = new User([
            'name' => $request->input('name'),
    		'email' => $request ->input('email'),
    		'password' => bcrypt($request->input('password'))
    		]);
    	$user->save();
        Auth::login($user);
    	return redirect('user.profile');
    }

    public function getSignin(){
    	return view('user.signin');
    }
    public function postSignin(Request $request){
    	$this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
            ]);
        if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            return redirect('/user/profile')->with('thongbao','dang nhap thanh cong');
        }
        return redirect()->back();
    }
    public function getProfile(){
    	return view('user.profile');
    }
    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
}
