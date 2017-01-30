<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use Auth;

class StatusController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $status = Status::orderBy('id', 'DESC')->paginate(5);
            return view('welcome', [
                    'status'    => $status
                ]);
        }
        return view('login');
    }

    public function show($id = null) {
    	if ($id) {
    		$status = Status::find($id);
	    	if ($status) {
	    		$status->user;
	    		$status->comments;
	    		return view('status.show', [
	    			'status'	=> $status
	    			]);
	    	} else {
	    		return abort('404', 'Status not found');
	    	}
    	} else {
    		return redirect()->route('status.index');
    	}
    }

    public function create(Request $request) {
        $status = new Status();
        $status->content = $request->content;
        $status->user_id = Auth::user()->id;
        $status->save();
        return redirect()->route('status.index');
    }

    public function destroy(Request $request) {
        $status = Status::find($request->status_id);
        if ($status) {
            $status->delete();
        }

        return redirect()->route('status.index');
    }
}
