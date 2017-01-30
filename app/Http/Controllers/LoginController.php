<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator, Redirect, Auth;

class LoginController extends Controller
{
	public function __construct() {

	}
    public function authenticate(Request $request) {
    	$validator = Validator::make($request->all(), [
    			'email'		=>	'required|email|exists:users',
    			'password'	=>	'required|alphaNum|min:6'
    		]);

    	if($validator->fails()) {
    		return Redirect::back()->withInput($request->except('password'))->withErrors($validator);
    	}
    	$user = [
    		'email' 	=> 	$request->get('email'),
    		'password'	=>	$request->get('password')
    	];
    	if(Auth::attempt($user)) {
    		return redirect()->intended('/');
    	} else {
    		return Redirect::back()->withInput($request->except('password'))->withErrors([
    			'password'	=> 'Incorrect email or password.'
    			]);
    	}
    }

    public function logout() {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
