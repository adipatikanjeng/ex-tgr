<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\Epc;
use App\Models\User\Log;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

class AuthController extends Controller {
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

	protected $redirectPath = '/my-account';
	protected $redirectAfterLogout = '/auth/login';

	protected $logoutPath = '/my-account';

	/**
	 * Create a new authentication controller instance.
	 */
	public function __construct() {
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function postAuthenticate(Request $request) {
		$this->validate($request, [
			'username' => 'required',
			'password' => 'required',
			'g-recaptcha-response' => 'required|recaptcha',
		]);

		$user = Epc::where('email', strtoupper($request->input('username')))
			->where('password', md5($request->input('password')))
			->first();

		if ($user) {
			Auth::loginUsingId($user->id);
			Log::insert(['sign_in' => date('Y-m-d h:m:s'), 'user_id' => Auth::user()->id]);

			return redirect()->intended('my-account');
		} else {
			return redirect()->back()->with('message', 'Password atau Username Anda salah!');
		}
	}

}
