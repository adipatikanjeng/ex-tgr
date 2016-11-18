<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {
	/**
	 * The URIs that should be excluded from CSRF verification.
	 *
	 * @var array
	 */
	protected $except = [
		'payment/veritrans/notification',
		'shopping-cart/ajax-buy-online',
		'shopping-cart/ajax-update-quantity',
		'my-account/ajax-change-password',
		'admin/upload-image',
	];
}
