<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_name', 'site_description', 'site_url', 'site_email', 'ref_credits', 'reg_credits', 'surf_time'
    ];
}
