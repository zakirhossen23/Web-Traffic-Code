<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class BillingController extends Controller
{
     /**
     * Show the application billing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_history = DB::table('payment_history')->where('user_id', Auth::id()) ->orderBy('date', 'desc')->paginate(15);
        return view('billing', compact('payment_history'));
    }

}
