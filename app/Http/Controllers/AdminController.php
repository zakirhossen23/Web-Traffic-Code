<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Credit;
use App\Setting;
use App\Website;
use App\Transfer;
use App\UserActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // Dashboard stats
        $users = User::all()->count();
        $websites = Website::all()->count();
        $joined_today = User::all()->count();
        $joined_today = User::where('created_at', '>', Carbon::today()->startOfDay())->where('created_at', '<', Carbon::today()->endOfDay())->count();

        // Recent Activity
        $uActivity = UserActivity::paginate(10);

        $start = Carbon::today()->subDays(6); 
        $end = Carbon::today();
        
        // User Analytics
        $lastUsers = User::where('created_at', '>=', Carbon::today()->subDays(7))
            ->groupBy(DB::raw('Date(created_at)'))
            ->get([DB::raw("COUNT(id) AS nbReg"), DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') AS date")])
            ->pluck('nbReg', 'date');
        
        // Fill zero values dates
        $dates = generateDates($start, $end);

        // Passing data to View
        return view('admin.dashboard', [
            'total_users' => $users,
            'total_websites' => $websites,
            'joined_today' => $joined_today,
            'Recent_Activity' => $uActivity,
            'graph_ticks' => $dates->merge($dates)->keys()->transform(function ($dates) {return Carbon::parse($dates)->format('d F');}),
            'graph_users' => $dates->merge($lastUsers)->values()
        ]);
    }

    // Passing users data to view
    public function users()
    {
        $users = User::paginate(15);
        return view('admin.users', compact('users'));
    }

    // Passing websites data to view
    public function websites()
    {
        $websites = Website::paginate(15);
        return view('admin.websites', compact('websites'));
    }

    // Passing credits data to view
    public function credits()
    {
        $credits = Credit::all();
        return view('admin.credits', compact('credits'));
    }

    // Passing transfers data to view
    public function transfers()
    {
        $transfers = Transfer::paginate(5);
        return view('admin.transfers', compact('transfers'));
    }

    // Passing sales data to view
    public function sales()
    {
        return view('admin.sales');
    }

    // Passing settings data to view
    public function settings()
    {
        $site = Setting::all()->first();
        return view('admin.settings', compact('site'));
    }

    // Validate and save posted data
    public function postSettings(Request $request)
    {
        // Retrieving the request method
        if ($request->isMethod('POST')) {

            if(isset($request->ref_credits)) {
                
                // Validate the request...
                $this->validate($request, [
                    'ref_credits' => 'required',
                ]);

                $site = Setting::first();
                $site->ref_credits = $request->input('ref_credits');
                $site->save();
                $request->session()->flash('ref_success_msg', 'Referral settings updated successfully.');
                return redirect()->back();

            }else if(isset($request->surf_time)) {

                // Validate the request...
                $this->validate($request, [
                    'surf_time' => 'required',
                ]);

                $site = Setting::first();
                $site->surf_time = $request->input('surf_time');

                // Save posted data
                $site->save();
                $request->session()->flash('surf_success_msg', 'Surf settings updated successfully.');
                $request->session()->flash('gen-class', 'alert-danger'); 
                return redirect()->back();

            }else 
            {
                $this->validate($request, [
                    'site_name' => 'required',
                    'site_description' => 'required',
                    'site_url' => 'required',
                    'site_email' => 'required',
                    'reg_credits' => 'required',
                ]);

                $site = Setting::first();
                $site->site_name = $request->input('site_name');
                $site->site_description = $request->input('site_description');
                $site->site_url = $request->input('site_url');
                $site->site_email = $request->input('site_email');
                $site->reg_credits = $request->input('reg_credits');

                // Save posted data
                $site->save();

                // Redirect to Settings page
                $request->session()->flash('success_msg', 'General Settings updated successfully.');
                return redirect()->back();
            }
        }
    }

    public function addCredits(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $this->validate($request, [
                'name' => 'required',
                'credits' => 'required',
                'price' => 'required',
            ]);

            $Credit = new Credit;
            $Credit->name = $request->input('name');
            $Credit->credits = $request->input('credits');
            $Credit->price = $request->input('price');
            $Credit->save();
            $request->session()->flash('success_msg', 'Package added successfully.');
            return redirect()->back();
        }
        return view('admin.addpack');
    }

    public function delCredits($id)
    {
        $Credit = Credit::findOrFail($id);
        $Credit->delete();
        return redirect('admin/credits');
    }

    public function addUser(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $this->validate($request, [
                'name' => 'required|min:5|max:20',
                'username' => 'required|unique:users',
                'email' => 'required|unique:users',
                'credits' => 'required',
                'password' => 'required|min:6',
                'userlevel' => 'required',
                'active' => 'required',
            ]);

            $user = new User;
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->credits = $request->input('credits');
            $user->password = Hash::make($request->input('password'));
            $user->userlevel = $request->input('userlevel');
            $user->active = $request->input('active');
            $user->save();
            $request->session()->flash('success_msg', 'User added successfully.');
            return redirect()->back();
        }
        return view('admin.add');
    }

    public function delUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/users');
    }

    public function editUser(Request $request, $id)
    {
        if($request->isMethod('POST'))
        {
            $user = User::find($id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->credits = $request->credits;
            if($request->password != "") {
                $user->password = Hash::make($request->password);
            }
            $user->userlevel = $request->userlevel;
            $user->banned = $request->banned;
            $user->active = $request->active;
            $user->save();
            $request->session()->flash('success_msg', 'User updated successfully');
            return redirect()->back();
        }else
        {
            $userEdit = User::findOrFail($id);
            return view('admin.edit', compact('userEdit'));
        }
    }

    public function editSite(Request $request, $id)
    {
        if($request->isMethod('POST'))
        {
            $site = Website::find($id);
            $site->url = $request->url;
            $site->credits = $request->credits;
            $site->status = $request->status;
            $site->save();
            $request->session()->flash('success_msg', 'Site updated successfully.');
            return redirect()->back();
        }else
        {
            $siteEdit = Website::findOrFail($id);
            return view('admin.editsite', compact('siteEdit'));
        }
    }

    public function delSite($id)
    {
        $site = Website::findOrFail($id);
        $site->delete();
        return redirect('admin/websites');
    }
}
