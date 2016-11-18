<?php
namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Order;

class VeritransController extends Controller {

    public function __construct()
    {
        \Veritrans_Config::$serverKey = \Config::get('veritrans.serverKey');
        \Veritrans_Config::$isProduction = \Config::get('veritrans.isProduction');
    }

    public function postNotification()
    {
        $notif = new \Veritrans_Notification();
        $transaction = strtolower($notif->transaction_status);
        $fraud = strtolower($notif->fraud_status);

        if ($transaction === 'capture')
        {
            if ($fraud === 'challenge')
                $status = 'challenge';
            elseif ($fraud === 'accept')
                $status = 'success';
        }
        elseif ($transaction === 'cancel')
        {
            if ($fraud === 'challenge')
                $status = 'failure';
            elseif ($fraud === 'accept')
                $status = 'failure';
        }
        elseif ($transaction === 'deny')
            $status = 'failure';
        else
            $status = 'failure';

        if ($status === 'success')
        {
            //Update Order Payment Successful
            $order = Order::whereOrderNumber($notif->order_id)->first();
            if ($order)
            {
                $order->status_id = 3;
                $order->save();
            }
            $this->sendEmailNotification($orders);
        }
        else
        {
            //Update Order Payment Unsuccessful
            $order = Order::whereOrderNumber($notif->order_id)->first();
            if ($order)
            {
                $order->order_status_id = 2;
                $order->save();
            }
        }

    }

    public function sendEmailNotification($datas)
    {
        //to customer
        $data['email'] = $datas->customer->user->email;
        $data['name'] = $datas->customer->name;
        $data['orderNumber'] = $datas->order_number;
        $data['shippingFee'] = $datas->shipping_amount;
        $product = [];
        $totalPrice = 0;
        foreach ($datas->products as $key => $row) {
           $product[$key]['name'] = $row->product->name;
           $product[$key]['total_price'] = $row->total_price;
           $product[$key]['quantity'] = $row->quantity;
           $totalPrice +=  $row->total_price;
       }
       $data['products'] = $product;
       $data['products']['totalPrice'] = $totalPrice;
       $data['products']['subTotalPrice'] = $totalPrice + $datas->shipping_amount;

       \Mail::send('emails.payment-notification', $data, function ($message) use ($data) {
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
           $totalPrice +=  $row->total_price;
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