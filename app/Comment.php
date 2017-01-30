<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    protected $table = 'comments';

    protected $fillable = ['content', 'likes', 'user_id', 'status_id'];


    public function status() {
    	return $this->belongsTo('App\Status');
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
