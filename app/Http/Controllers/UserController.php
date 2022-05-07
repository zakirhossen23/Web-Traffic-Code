<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show the application account.
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        return view('account');
    }

    /**
     * Update member account information.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     **/
    public function updateAccount(Request $request)
    {
        // Retrieving the request method
        if($request->isMethod('POST'))
        {
            // Check if user posted data is valid
            $user = User::find(Auth::user()->id);

            // Validate the request...
            $this->validate($request, [
                'email' => 'required|unique:users,email,'.$user->id,
                'curpass' => 'required_with:newpass',
                'newpass' => 'min:5'
            ]);
            $user->email = $request->email;
            if ($request->get('newpass')) {
                if(Hash::check($request->curpass, Auth::user()->password))
                    {
                        $user->password = Hash::make($request->newpass);
                    }else
                    {
                        return redirect()->back()->with('error_msg','You have entered wrong password.');
                    }
            }

            // Save posted data
            $user->save();

            // Redirect to User Account page
            return redirect()->back()->with('success_msg','Settings has been successfully updated.');
        }

    }

    /**
     * Show the application billing.
     *
     * @return \Illuminate\Http\Response
     */
    public function billing()
    {
        return view('billing');
    }
}
