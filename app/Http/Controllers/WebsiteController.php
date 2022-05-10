<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Website;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index()
    {
        $websites = DB::table('websites')->where('user_id', Auth::id())->paginate(15);
        return view('websites', compact('websites'));
    }

     /**
     * Get the site info for given ID.
     *
     * @param  int  $site_id
     * @return Response
     */
    public function getSiteInfo($site_id)
    {
        $website = Website::findOrFail($site_id);
        return response()->json([
            'website' => $website
        ]);
    }

    /**
     * Delete the specified site.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function delWebsite(Request $request, $site_id)
    {
        $website = Website::where('user_id', Auth::id())->findOrFail($site_id);
        $website->delete();
    }

    /**
     * Edit the specified site.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function editWebsite(Request $request, $site_id)
    {
        // Retrieving the request method
        if($request->isMethod('POST'))
        {
            $this->validate($request, [
                'url' => 'required|url',
                'credits' => 'required',
                'status' => 'required'
            ]);
            
            $website = Website::findOrFail($site_id);
            $website->url = $request->input('url');
            $website->credits = $request->input('credits');
            $website->status = $request->input('status');

            // Save the modifications
            $website->save();

            // Redirect to Websites page
            return redirect()->back()->with('success_msg','Your website updated successfully.');
        }
    }

    /**
     * Add new site
     *
     * @param  Request  $request
     * @return Response
     */
    public function addWebsite(Request $request)
    {
        
        // Retrieving the request method
        if($request->isMethod('POST') == 1)
        {
            $hasLimit = $request->input('haslimit');
            $totalhits = $request->input('hits-limit');
            if (isset($hasLimit) != null) {
                $hasLimit = 1;
              }else{
                $hasLimit = 0;
                $totalhits = -1;
              }
            // Validate the request...
            $this->validate($request, [
                'url' => 'required',
                'duration' => 'required',
                'status' => 'required'
            ]);
           
            // Check if user has enough website slots
            if (Website::where('user_id', Auth::user()->id)->count() >= 4)
            {
                return redirect()->back()->with('error_msg', 'You don\'t have enough website slots.');             
            }else
            {
                // Add new website to the database
                $website = new Website;
                $website->user_id = Auth::id();
                $website->url = $request->input('url');
                $website->credits = $request->input('duration')/10;
                $website->duration = $request->input('duration');
                $website->haslimit = $hasLimit;
                $website->totalhits = $totalhits;
                $website->hits = 0;
                $website->status = 0;

                // Save posted data
                $website->save();

                // Redirect to Websites page
                return redirect()->back()->with('success_msg','Your website has been added successfully.');
            }
        }
        return view('add');
    }    
}