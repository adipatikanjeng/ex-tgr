<?php

namespace App\Http\Controllers\Admin\Payment;
use App\Models\Order;
use \Webarq\Site\Models\Setting;

class ConfirmationController extends \Webarq\Admin\Http\Controllers\Controller
{
    public function __construct(\App\Models\Payment\Confirmation $model)
    {
        $this->model = $model;
        $this->sectionCode = 'payment_confirmation';
        parent::__construct();
        $this->sectionUri = 'payments/confirmations';

        view()->share('title', 'Payment Confirmations');
    }

    public function getIndex()
    {
        $this->disabledActions = ['addNew', 'delete'];
        $this->fields = [
        ['name' => 'bank_name', 'title' => 'Bank Source'],
        ['name' => 'account_name', 'title' => 'Account Name'],
        ['name' => 'account_number', 'title' => 'Account Number'],
        ['name' => 'transfer_date'],
        ['name' => 'order_number'],
        ['name' => 'bank->name', 'title' => 'Transfer to Bank Account'],
        ['name' => 'bank->account_number', 'title' => 'Transfer to Account Number'],
        ['name' => 'is_confirmed'],
        ['name' => 'amount'],
        ['name' => 'file', 'image' => 100],
        ];

        return parent::getIndex();
    }

    public function postAddedit()
    {
        $this->inputs = ['is_confirmed'];
        if(\Input::get('is_confirmed') == 'Y')
        {
            $order = Order::where('order_number', \Input::get('order_number'))->first();
            $order->status_id = 3;
            $order->save();

            $this->sendEmailNotification($order);
        }

        return parent::postAddedit();
    }

    public function sendEmailNotification($datas) {
        //to customer
        $data['email'] = $datas->customer->user->email;
        $data['name'] = $datas->customer->name;
        $data['orderNumber'] = $datas->order_number;
        $data['status'] = $datas->status->name;
        $data['shippingFee'] = $datas->shipping_amount;
        $product = [];
        $totalPrice = 0;
        foreach ($datas->products as $key => $row) {
            $product[$key]['name'] = $row->product->name;
            $product[$key]['total_price'] = $row->total_price;
            $product[$key]['quantity'] = $row->quantity;
            $totalPrice += $row->total_price;
        }
        $data['products'] = $product;
        $data['products']['totalPrice'] = $totalPrice;
        $data['products']['subTotalPrice'] = $totalPrice + $datas->shipping_amount;

        \Mail::send('emails.payment-notification-confirmed', $data, function ($message) use ($data) {
            $message->from(Setting::whereCode('email')->whereType('admin')->first()->value);
            $message->subject("Payment Notification");
            $message->to($data['email']);
        });
        //to admin

        $product = [];
        $totalPrice = 0;
        $groupByCategory = [];
        foreach ($datas->products as $key => $row) {
            $product[$key]['name'] = $row->product->name;
            $product[$key]['total_price'] = $row->total_price;
            $product[$key]['quantity'] = $row->quantity;
            $product[$key]['category'] = $row->product->category_id;
            $totalPrice += $row->total_price;
        }

        $data['products'] = $product;
        $data['products']['totalPrice'] = $totalPrice;
        $data['products']['subTotalPrice'] = $totalPrice + $datas->shipping_amount;

        \Mail::send('emails.payment-notification-admin', $data, function ($message) use ($data) {
            $message->from(Setting::whereCode('email')->whereType('admin')->first()->value);
            $message->subject("Payment Notification");
            $message->to($data['email']);
        });
    }
}
