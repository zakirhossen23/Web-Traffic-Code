<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Cookie;
use Illuminate\Http\Request;
use App\UserActivity;
use App\Setting;
use Carbon\Carbon;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|min:3|max:15|unique:users',
            'password' => 'required|min:6|confirmed',
			'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // Load site data
        $site = Setting::first();

        // Get the referal ID for given user.
        $refuser = User::find(Cookie::get('surfy_refid'));

        // Check if user referral is not null
        if(!is_null($refuser)){

            // Assign referral credits to the user
            User::whereId($refuser->id)->increment('credits', $site->ref_credits);
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'credits' => $site->reg_credits,
            'refid' => (is_null($refuser)) ? null : $refuser->id,
        ]);
    }

    protected function authenticated(Request $request, User $user) {
        $activity = UserActivity::where('user_id', $user->id)
        ->where('created_at', '>', Carbon::today()->startOfDay())
        ->where('created_at', '<', Carbon::today()->endOfDay())
        ->get();
        if (count($activity) == 0) {
            $activity = new UserActivity();
            $activity->user_id = $user->id;
            $activity->save();
        }
        return redirect()->intended($this->redirectPath());
     }
}
