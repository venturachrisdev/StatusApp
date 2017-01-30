<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index() {
    	$user = Auth::user();
    	return view('admin.index', [
    			'user'	=> $user
    		]);
    }


    public function logout() {
    	Auth::logout();
    	return redirect()->route('status.index')->withErrors([
    		'info'	=>	'Thanks! We hope you come back soon.'
    		]);
    }
}
