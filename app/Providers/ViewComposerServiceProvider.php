<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Cart\Product;
use App\Models\Product\Category;
use Auth;
use Illuminate\Support\ServiceProvider;
use Session;
use \Webarq\Site\Models\Setting;
use App\Models\SideMenu;

class ViewComposerServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 */
	public function boot() {
		view()->composer('layouts.master', function ($view) {
			$cart = (Auth::check() && Auth::user()->customer) ? Cart::where('customer_id', Auth::user()->customer->id)->first() : Cart::where('session_code', Session::getId())->first();
			$totalCart = ($cart) ? $cart->total_amount : 0;
			$items = ($cart) ? Product::where('cart_id', $cart->id)->get()->count() : 0;
			$socialMedia['facebook'] = Setting::ofCodeType('facebook', 'socmed_url')->value;
			$socialMedia['twitter'] = Setting::ofCodeType('twitter', 'socmed_url')->value;
			$socialMedia['youtube'] = Setting::ofCodeType('youtube', 'socmed_url')->value;
			$socialMedia['instagram'] = Setting::ofCodeType('instagram', 'socmed_url')->value;
			$socialMedia['phone'] = Setting::ofCodeType('phone', 'contact')->value;
			$socialMedia['bbm'] = Setting::ofCodeType('bbm', 'contact')->value;
			$socialMedia['address'] = Setting::ofCodeType('address', 'contact')->value;
			$contact['name'] = Setting::ofCodeType('name', 'contact')->value;
			$contact['meta'] = Setting::ofCodeType('meta', 'seo')->value;

			$view->with(['totalCart' => $totalCart, 'items' => $items, 'socialMedia' => $socialMedia, 'contact' => $contact]);
		});

		view()->composer('partial.footer-account', function ($view) {
			$contact['address'] = Setting::ofCodeType('address', 'contact')->value;
			$contact['telephone'] = Setting::ofCodeType('telephone', 'contact')->value;
			$contact['email'] = Setting::ofCodeType('email', 'contact')->value;
			$contact['name'] = Setting::ofCodeType('name', 'contact')->value;

			$view->with(['contact' => $contact]);
		});

		view()->composer('product', function ($view) {
			$productCategories = Category::all();
			$view->with(['categories' => $productCategories]);
		});

		view()->composer('partial.side_menu_bottom', function ($view) {
			$sideMenus = SideMenu::where('is_display', 'Y')->get();
			$view->with(['sideMenus' => $sideMenus]);
		});

}

	/**
	 * Register the application services.
	 */
	public function register() {
		//
	}
}
