<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function login(Request $request){
        $user = DB::table('users')->select('users.*')->where([['users.email', '=', request()->email]])->first();
        if (Hash::check($request->password, $user->password )){
            return response()->json($user);
        }

        return response()->json(json_encode("False"));
    }
}
