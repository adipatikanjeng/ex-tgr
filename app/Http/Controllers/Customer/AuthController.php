<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Customer;
use Hash;
use App\Models\Cart;
use App\Models\Product;
use Session;
use Auth;
use App\Models\User\Log;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.customer', ['only' => ['getLogout']]);
    }

    public function getLogin()
    {
        if(Auth::check())
        {
            return redirect('customers');
        }
        $cart = Cart::where('session_code', Session::getId())->first();
        $rows = ($cart) ? Cart\Product::where('cart_id', $cart->id)->get() : [];

        return view('customer.auth.login', compact('rows'));
    }

    public function postAuthenticate(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
        'customer' => 'required',
        'g-recaptcha-response' => 'required|recaptcha',
        ]);

      $session = Session::getId();
      if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
        if(Auth::user()->is_active == 'Y')
        {
            Log::insert(['sign_in'=> date('Y-m-d h:m:s'), 'user_id' => Auth::user()->id]);
            $this->saveTemporaryCart($session);
            return redirect()->intended('shopping-cart/shipping');
        }else{
            return redirect()->back()->withInput()->with('message', 'Account anda belum di aktivasi, silahkan cek email untuk aktivasi!');
        }

    } else {
        return redirect()->back()->withInput()->with('message', 'Email atau password anda salah!');
    }
}

public function getLogout()
{
    Auth::logout();

    return redirect('customers/auth/login');
}

public static function saveTemporaryCart($session)
{
    $cart = Cart::where('session_code', $session)->first();
    if ($cart) {
        $model = Cart::where('customer_id', Auth::user()->customer->id)->first();
        if ($model) {
            $model->session_code = null;
            $model->total_amount = $cart->total_amount + $model->total_amount;
            $model->customer_id = Auth::user()->customer->id;
            $model->save();
            Cart\Product::where('cart_id', $cart->id)->update(['cart_id' => $model->id]);
            $cartProductTotal = 0;
            $cartProduct = Cart\Product::where('cart_id', $model->id)->groupBy('product_id')->select(\DB::raw("*, SUM(quantity) as quantity, SUM(price) as price"))->get();
            $cartProductId = [];
            foreach($cartProduct as $row){
                if($childRow = Cart\Product::where('cart_id', $model->id)->where('id', $row->id)->first())
                {
                    $childRow->quantity = $row->quantity;
                    $childRow->price = $row->price;
                    $childRow->update();
                    $cartProductId[] = $childRow->id;
                    $cartProductTotal += $row->price;
                }
            }
            $cartUpdate = Cart::find($model->id);
            $cartUpdate->total_amount = $cartProductTotal;
            $cartUpdate->update();
            Cart\Product::where('cart_id', $model->id)->whereNotIn('id', $cartProductId )->delete();
        } else {
            $cart->session_code = null;
            $cart->customer_id = Auth::user()->customer->id;
            $cart->save();
        }
    }
}
}
