<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentsController extends Controller
{

	public function create(Request $request) {
		$comment = new Comment();
		$comment->content = $request->content;
		$comment->user_id = Auth::user()->id;
		$comment->status_id = $request->status_id;

		$comment->save();

		return redirect()->route('status.show', $request->status_id);
	}

    public function destroy(Request $request) {
    	$comment = Comment::find($request->comment_id);
    	if ($comment) {
    		$comment->delete();
    	}

    	return redirect()->route('status.show', $request->status_id);
    }
}
