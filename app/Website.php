<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'url', 'credits', 'hits', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}