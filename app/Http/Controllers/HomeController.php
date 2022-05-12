<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Setting;
use App\Credit;
use App\UserActivity;
use App\Website;
use App\User;
use Mail;
use Validator;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome', 'landing', 'logout']]); 
    }

    public function landing()
    {
        // Get all registered users
        $userCount = User::count();

        // Get all hits exchanged
        $hitsCount = UserActivity::sum('hits_received');

        // Passing data to view
        return view('welcome', [   
            'registered_users' => $userCount,
            'hits_exchanged' => $hitsCount
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the used slots by user 
        $used_slots = Website::where('user_id', Auth::user()->id)->count();

        // Get the user active websites
        $active_websites = Website::where('user_id', Auth::user()->id)->where('status', '==', 0)->count();

        $start = Carbon::today()->subDays(6); 
        $end = Carbon::today();

        // Credits Earned
        $credits = UserActivity::where('user_id', Auth::user()->id)
            ->where('created_at', '>=', Carbon::today()->subDays(7))
            ->get(['credits_earned', DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date")])
            ->pluck('credits_earned', 'date');

        // Hits Received
        $hits = UserActivity::where('user_id', Auth::user()->id)
            ->where('created_at', '>=', Carbon::today()->subDays(6))
            ->get(['hits_received', DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date")])
            ->pluck('hits_received', 'date');

        // Fill zero values dates
        $dates = generateDates($start, $end);

        // Passing data to view
        return view('dashboard', [   
            'used_slots' => $used_slots,
            'active_websites' => $active_websites,
            'graph_ticks' => $dates->merge($dates)->keys()->transform(function ($dates) {return Carbon::parse($dates)->format('d F');}),
            'graph_credits' => $dates->merge($credits)->values(),  // overwrite credits with the zero values
            'graph_hits' => $dates->merge($hits)->values() // overwrite hits with the zero values
        ]);
    }
    
     /**
     * Show the application Referrals page.
     *
     * @return \Illuminate\Http\Response
     */
    public function referrals()
    {
        $referrals = DB::table('users')->where('refid', Auth::id())->get();
        return view('referrals', compact('referrals'));
    }

     /**
     * Show the application Buy Credits page.
     *
     * @return \Illuminate\Http\Response
     */
    public function buycredits()
    {
        $users = User::find( Auth::user()->id);
        $credits = Credit::all();
        return view('credits', compact('credits'),compact('users'));
    }

     /**
     * Show the application contact page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('contact');
    }

     /**
     * Show the application FAQ page.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq()
    {
        return view('faq');
    }

     /**
     *  Contact Us submit form.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     **/
    public function postContact(Request $request)
    {
        // Validate the request...
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
			'g-recaptcha-response' => 'required|captcha',
        ]);

        // Passing the email contact HTML view
        Mail::send('emails.contact', [
            'msg' => $request->message
        ], function ($mail) use($request) {

            // Get site email
            $site = Setting::first();

            $mail->from($request->email, $request->name);

            $mail->to($site->site_email)->subject($request->subject);
        });

        // Redirect to Contact page
        return redirect()->back()->with('success_msg','Your message sent successfully. Thank you!');
    }
}
