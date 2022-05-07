<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;
use App\Http\Requests;
use App\User;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    /**
     * Show the application Trasnfer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = Transfer::where('receiver', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('transfer', compact('transfers'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function transferCredits(Request $request)
    {
        // Retrieving the request method
        if($request->isMethod('POST'))
        {
            // Validate the request...
            $this->validate($request, [
                'username' => 'required',
                'credits' => 'required'
            ]);

            // check if credits is less or equal 0
            if ($request->credits <= 0)
            {
                return back()->with('error_msg', 'Credits is required');
                return redirect()->back();
            }

            // check if username exists in database
            else if (!User::where('username', '=', Input::get('username'))->count() > 0) 
            {
                return back()->with('error_msg', 'This username does not exists.');
                return redirect()->back();
            }

            // check if user has enough credits
            else if (User::where('credits', '<', Input::get('credits'))->count() > 0)
            {
                return back()->with('error_msg', 'You don\'t have enough credits');
                return redirect()->back();
            }

            // check if user send credits to himself
            else if(strcasecmp(Auth::user()->username, $request->username) == 0)
            {
                return back()->with('error_msg', 'You can\'t send credits to yourself.');
                return redirect()->back();
            }
            else
            {
                // Get the receiver data 
                $receiverUser = User::where('username', '=', Input::get('username'))->first();
                $transfer = new Transfer;
                $transfer->sender = Auth::user()->username;
                $transfer->receiver = $receiverUser->id;
                $transfer->credits = $request->credits;

                // Save posted data
                $transfer->save();
                DB::table('users')->where('id', Auth::id())->decrement('credits', $request->credits);
                DB::table('users')->where('username', $request->username)->increment('credits', $request->credits);
                
                // Redirect to Transfer page
                return back()->with('success_msg', 'You have transferred '.$request->credits.' credits to '.$request->username);
				return redirect()->back();
            }
        }
    }

    public function transferHistory()
    {
        //$transfers = DB::table('transfers')->where('uid', Auth::id())->get();
        
        //return view('transfer', compact('transfer') );
        //$transfer = Transfer::all();

        //$transfer = Transfer::all();
        //$arr = array('transfer' => $transfer);
        //$users = User::all();
        //$users = collect();
        //$transfers =  User::all();
        //return view('transfer', compact('users'));
        //return View::make('transfer', compact('users'));
        
    }
}
