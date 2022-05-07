<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender', 'receiver', 'credits'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
