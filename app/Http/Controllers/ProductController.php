<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product\Category;
use App\Models\Product;
use App\Models\Source;
use App\Models\Product\Quotation;

class ProductController extends Controller
{
    public function getIndex()
    {
        $model = new Category();
        $rows = $model->paginate(10);

        return view('product.index', compact('rows'));
    }

    public function getCategory($permalink = null)
    {
        $category = Category::where('permalink', $permalink)->first();
        $model = new Product();
        $rows = $model->where('category_id', $category->id)->where('is_active', 'Y')->paginate(10);

        return view('product.category', compact('rows'));
    }

    public function getDetail($permalink, $id)
    {
        $model = new Product();
        $row = $model->find($id);

        $sources = Source::lists('name_locale_id', 'id');

        return view('product.detail', compact('row', 'sources'));
    }

    public function postQuotation(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
            ]);

        $model = new Quotation();
        $model->product_id = $request->input('product_id');
        $model->name = $request->input('name');
        $model->email = $request->input('email');
        $model->telephone = $request->input('telephone');
        $model->city = $request->input('city');
        $model->source_id = $request->input('source_id');
        $model->child_age = $request->input('child_age');
        $model->message = $request->input('message');
        $model->save();

        $data['email'] = $model->email;
        $data['name'] = $model->name;
        $data['msg'] = $model->message;
        $data['telephone'] = $model->telephone;
        $data['city'] = $model->city;
        $data['productName'] = $model->product->name;

        \Mail::send('emails.contact-us-product', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->subject("Contact Us Product");
            $message->to(\Webarq\Site\Models\Setting::ofCodeType('email', 'admin')->value);
        });

        return redirect()->back()->with('message', 'Form has been successfully sent!');
    }

    public function getLists()
    {
        $rows = Product::where('is_active', 'Y')->paginate(10);
        return view('product.list', compact('rows'));
    }
}
