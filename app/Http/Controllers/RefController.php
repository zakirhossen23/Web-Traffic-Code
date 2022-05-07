<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class RefController extends Controller
{
    public function index( $id )
    {
        // Get the current user
        $user = User::where( 'id', $id )->first();
        
        // Check the user and set cookie based on referral ID
        return ( is_null( $user ) )
            ? redirect( '/' )
            : redirect( '/' )->withCookie( cookie()->forever( 'surfy_refid', $user->id ) );
    }
}
