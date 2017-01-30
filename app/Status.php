<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    protected $table = 'status';

    protected $fillable = ['content', 'likes', 'user_id'];

    public function comments() {
    	return $this->hasMany('App\Comment');
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public static function boot() {
        parent::boot();

        self::deleting(function ($status) {
            $status->comments()->delete();
        });


        self::restored( function ($status) {
            $status->comments()->withTrashed()->restore();
        });
    }
}
