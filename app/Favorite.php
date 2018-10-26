<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'board_id', 'user_id'
    ];

    public function posts()
    {
    	return $this->belongsTo('App\Board');
    }

    public function users()
    {
    	return $this->belongsTo('App\User');
    }
}
