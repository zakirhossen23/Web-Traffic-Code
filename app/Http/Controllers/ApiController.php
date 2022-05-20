<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Website;
use App\UserActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $user = DB::table('users')->select('users.*')->where([['users.email', '=', request()->email]])->first();
        if (Hash::check($request->password, $user->password)) {
            return response()->json($user);
        }

        return response()->json(json_encode("False"));
    }

    public function session(Request $request)
    {
        $authid = $request->userid;


        // Retrieving the request method
        if ($request->isMethod('GET') && $request->has('getSite')) {

            // Get all available and active websites to surf
            $website = DB::table('websites')
                ->select('websites.*')
                ->leftJoin('users', 'websites.user_id', '=', 'users.id')
                ->where([
                    ['users.credits', '>=', 'websites.credits'],
                    ['websites.status', '=', '0'],
                    ['websites.user_id', '!=', $authid],
                ])
                ->inRandomOrder()
                ->first();

            return ['website' => $website, 'time' => $website->duration, 'points' => $website->credits];
        } elseif ($request->isMethod('POST') && $request->has('complete')) {

            $site_id = $request->id;
            $userSite = Website::where('id', $site_id)->first();

            // check if site ID is not null/or empty.
            if ($userSite->id != "") {
                // Get user site and insert into surf today table
                $values = array('user' => $authid, 'site' => $site_id);
                DB::table('surfed_today')->insert($values);

                // Update users credits
                User::where('id', '=', $authid)->increment('credits', $userSite->credits);
                User::where('id', '=', $userSite->user_id)->decrement('credits', $userSite->credits);

                // Update site hits number
                Website::where('id', '=', $site_id)->increment('hits', 1);

                // Check if user activity date is already exists (Exists = Update / Not Exists = Add new record)
                $dateExists = UserActivity::where('created_at', '>', Carbon::today()->startOfDay())
                    ->where('created_at', '<', Carbon::today()->endOfDay())
                    ->where('user_id', '=', $authid)
                    ->get();

                if (count($dateExists) > 0) {
                    // Update user activity
                    UserActivity::where('created_at', '>', Carbon::today()->startOfDay())
                        ->where('created_at', '<', Carbon::today()->endOfDay())
                        ->where('user_id', '=', $authid)
                        ->increment('credits_earned', $userSite->credits);

                    UserActivity::where('created_at', '>', Carbon::today()->startOfDay())
                        ->where('created_at', '<', Carbon::today()->endOfDay())
                        ->where('user_id', '=', $userSite->user_id)
                        ->increment('hits_received', 1);
                } else {
                    // Add new user activity record
                    $activity = new UserActivity();
                    $activity->user_id = $authid;
                    $activity->save();
                    $activity = new UserActivity();
                    $activity->user_id = $userSite->user_id;
                    $activity->save();

                    UserActivity::where('created_at', '>', Carbon::today()->startOfDay())
                        ->where('created_at', '<', Carbon::today()->endOfDay())
                        ->where('user_id', '=', $authid)
                        ->increment('credits_earned', $userSite->credits);

                        UserActivity::where('created_at', '>', Carbon::today()->startOfDay())
                        ->where('created_at', '<', Carbon::today()->endOfDay())
                        ->where('user_id', '=', $userSite->user_id)
                        ->increment('hits_received', 1);
                }
            }
            return response()->json(json_encode($authid));
        }
    }

    public function user(Request $request)
    {
        $user = DB::table('users')->select('users.*')->where([['users.id', '=', request()->id]])->first();
        return response()->json($user);
    }
}
