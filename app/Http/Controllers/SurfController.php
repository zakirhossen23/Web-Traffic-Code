<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Website;
use Illuminate\Support\Facades\Auth;
use Response;
use Input;
use Illuminate\Support\Facades\DB;
use App\UserActivity;
use App\Setting;
use Carbon\Carbon;

class SurfController extends Controller
{
    public function surf()
    {
        // Get the latest 5 visited websites
        $LastSurfedSites = DB::table('websites')
            ->select('websites.url')
            ->leftJoin('surfed_today', 'websites.id', '=', 'surfed_today.site')
            ->where('surfed_today.user', '=', Auth::user()->id)
            ->limit(5)
            ->get();

        // Get the credits earned during the sessions
        $ses_credits = UserActivity::where('created_at', '>', Carbon::today()->startOfDay())
        ->where('created_at', '<', Carbon::today()->endOfDay())
        ->where('user_id', '=', Auth::user()->id)
        ->sum("credits_earned");

        return view('surf', ['credits_earned' => $ses_credits, 'LastSurfedSites' => $LastSurfedSites]);
    }

    public function session(Request $request)
    {
        // Retrieving the request method
        if($request->isMethod('GET') && $request->has('getSite')) {

            // Get all available and active websites to surf
            $website = DB::table('websites')
                ->select('websites.*')
                ->leftJoin('users', 'websites.user_id', '=', 'users.id')
                ->where([
                    //['users.credits', '>=', 'websites.credits'],
                    ['websites.status', '=', '0'],
                    ['websites.user_id', '!=', Auth::user()->id],
                ])
                ->inRandomOrder()
                ->first();
            $site = Setting::first();
            return ['website' => $website, 'time' => $site->surf_time];
            
        }elseif($request->isMethod('POST') && $request->has('complete')) {

            $site_id = $request->input('sid');
            $userSite = Website::where('id',$site_id)->first();

            // check if site ID is not null/or empty.
            if($userSite->id != "")
            {   
                // Get user site and insert into surf today table
                $values = array('user' => Auth::user()->id, 'site' => $site_id);
                DB::table('surfed_today')->insert($values);

                // Update users credits
                User::where('id','=' ,Auth::user()->id)->increment('credits', $userSite->credits);
                User::where('id','=' ,$userSite->user_id)->decrement('credits', $userSite->credits);

                // Update site hits number
                Website::where('id','=' ,$site_id)->increment('hits', 1);
                
                // Check if user activity date is already exists (Exists = Update / Not Exists = Add new record)
                $dateExists = UserActivity::where('created_at', '>', Carbon::today()->startOfDay())
                    ->where('created_at', '<', Carbon::today()->endOfDay())
                    ->where('user_id', '=', Auth::user()->id)
                    ->get();
                
                if (count($dateExists) > 0)
                {
                    // Update user activity
                    UserActivity::where('created_at','>', Carbon::today()->startOfDay())
                    ->where('created_at', '<', Carbon::today()->endOfDay())
                    ->where('user_id', '=', Auth::user()->id)
                    ->increment('credits_earned', $userSite->credits);

                    UserActivity::where('created_at','>', Carbon::today()->startOfDay())
                    ->where('created_at', '<', Carbon::today()->endOfDay())
                    ->where('user_id', '=', $userSite->user_id)
                    ->increment('hits_received', 1);

                }else
                {
                    // Add new user activity record
                    $activity = new UserActivity();
                    $activity->user_id = Auth::user()->id;
                    $activity->save();
                    $activity = new UserActivity();
                    $activity->user_id = $userSite->user_id;
                    $activity->save();

                    UserActivity::where('created_at','>', Carbon::today()->startOfDay())
                    ->where('created_at', '<', Carbon::today()->endOfDay())
                    ->where('user_id', '=', Auth::user()->id)
                    ->increment('credits_earned', $userSite->credits);

                    UserActivity::where('created_at','>', Carbon::today()->startOfDay())
                    ->where('created_at', '<', Carbon::today()->endOfDay())
                    ->where('user_id', '=', $userSite->user_id)
                    ->increment('hits_received', 1);
                }
            }
        }
    }
}