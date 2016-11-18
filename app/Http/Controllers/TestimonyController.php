<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Testimony;

class TestimonyController extends Controller
{
	public function getIndex()
	{
		$model = new Testimony;
		$rows = $model->where('is_active', 'Y')->paginate(5);

		return view('product.testimony', compact('rows'));
	}

	public function getDetail($id, $name)
	{
		$row = Testimony::find($id);
		$testimonies =Testimony::where('is_active', 'Y')->where('id', '!=', $id)->paginate(5);
		return view('product.testimony.detail', compact('row', 'testimonies'));
	}
}
