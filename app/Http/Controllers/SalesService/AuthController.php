<?php

namespace App\Http\Controllers\SalesService;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User\Epc;
use App\Models\User\SalesService;
use App\Models\Cart;
use Session;
use App\Models\User\Log;

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

    protected $redirectPath = '/sales';
    protected $redirectAfterLogout = '/sales/auth/login';

    protected $logoutPath = '/sales';

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
    	$this->middleware('guest', ['except' => 'getLogout']);
    }

    public function postAuthenticate(Request $request)
    {
    	$ip = substr($_SERVER['REMOTE_ADDR'], 0, 3);
		if ($ip != '10.') {
		
			$this->validate($request, [
				'username' => 'required',
				'password' => 'required',
				'g-recaptcha-response' => 'required|recaptcha',
				]);
		}else{
			$this->validate($request, [
				'username' => 'required',
				'password' => 'required',
				]);
		};

    	$user = SalesService::where('email', strtoupper($request->input('username')))
    	->where('password', md5($request->input('password')))
    	->first();

    	if ($user) {
    		Auth::loginUsingId($user->id);
    		Log::insert(['sign_in'=> date('Y-m-d h:m:s'), 'user_id' => Auth::user()->id]);

    		return redirect(\App::getLocale().$this->redirectPath);
    	} else {
    		return redirect('sales/auth/login')->with('message', 'Password atau Username Anda salah!');
    	}
    }

    public function getLogin()
    {
    	if(Auth::check())
    	{
    		return redirect('sales');
    	}
    	return view('sales-service.auth.login');
    }

    public function getLogout()
    {
    	Auth::logout();

    	return redirect('sales/auth/login');
    }

}
