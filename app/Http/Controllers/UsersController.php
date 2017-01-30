<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Status;
use App\Comment;
use Auth, Validator;


class UsersController extends Controller
{
    public function show($id) {
    	$user = User::find($id);
    	if ($user) {
    		$comments = Comment::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(10);
    		$status = Status::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(8);
    		return view('users.show', [
    				'user'	=> $user,
                    'comments' => $comments,
                    'status_s'  => $status
    			]);
    	} else {
    		return abort(404, 'User not found');
    	}
    }


    public function edit($id) {
        $user = Auth::user();
        if (!$user) {
            return abort(404, 'User not logged in');
        }
        if ($user->id != $id) {
            return about(500, 'User doesn\'t edit other users');
        }
        return view('user.edit', [
            'user'  => $user
            ]);
    }

    public function update(Request $request) {

    }



    public function destroy() {
        $user = Auth::user();
        $user_bye = User::find($user->id);
        Auth::logout();
        $user_bye->delete();
        return redirect()->route('status.index')->withErrors([
            'info'  => 'If you want to come back, Just sign in again.'
            ]);
    }

}
