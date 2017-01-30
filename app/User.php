<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function status() {
        return $this->hasMany('App\Status');
    }

    public static function boot() {
        self::deleting( function ($user) {
            $user->comments()->delete();
            $user->status()->delete();
        });

        self::restored( function ($user) {
            $user->comments()->withTrashed()->restore();
            $user->status()->withTrashed()->restore();
        });
    }
}
