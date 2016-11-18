@extends('shopping-cart')
@section('content_shopping-cart')
<h2 class="title" style="margin: 20px 0px 0px 0px;">
    <span>Payment</span>
    <div class="boxWizard after_clear">
        <ul class="after_clear">
            <li>1</li>
            <li>2</li>
            <li class="active">3</li>
            <li>4</li>
        </ul>
    </div>
</h2>
@include('partial.alert')
<div class="box_shop_01 after_clear">
    <div class="contact_form form_account cart_2 after_clear" style="margin:40px 0 0 0">
    <form action="{{ url(App::getLocale().'/shopping-cart/payment') }}" method="POST">
    {!! csrf_field() !!}
            <h2>Your payment method</h2>
            <div class="row_input contact_us">

                <div class="col_account radio-login">
                    <div class="radio-inline">
                        <label class="after_clear" style="display:block;">
                            <input type="radio" value="Credit Card" name="payment_method" required/>
                            <span>Credit Card</span>
                        </label>
                        <label style="display:block;">
                            <input type="radio" name="payment_method" value="Bank Transfer" required/>
                            <span>Bank Transfer</span>
                        </label>

                    </div>
                </div>
                <div class="col_account">
                @foreach($banks as $row)
                    <div class="bank_detail">
                        <h5>
                            {{ strtoupper($row->name) }}
                        </h5>
                        <p>
                            No rekening {{ $row->account_number }}<br/>
                            A/n {{ $row->account_name }}<br/>
                            Cabang {{ $row->branch }}
                        </p>
                    </div>
                    @endforeach
                </div>
                <input type="hidden" name="shipping_cost" value="{{ $fee }}">

                <div class="col_input" style="margin:20px 0 0 0;">
                    <button type="submit" class="btn_std_dis" style="padding:0 70px;">Confirm Payment</button>
                </div>


            </div>

        </form>
    </div>

    <div class="detail_order order_2">
        <h2>Detail Order ({{ count($rows) }} items)</h2>
        <div>
            <table>
                <tr>
                    <th>Items</th>
                    <th style="text-align:center">Qty</th>
                    <th class="total" style="text-align:center;">Total</th>
                </tr>
                <?php $total = 0 ?>
                @foreach($rows as $row)
                <tr>
                    <td>{{ $row->product->name }}</td>
                    <td style="text-align:center">{{ $row->quantity }}</td>
                    <td style="text-align:right">{{ App\Site::money($row->price) }}</td>
                </tr>
                <?php $total += $row->price ?>
                @endforeach
                <tr>
                    <th colspan="3" style="border-bottom:1px solid #ddd;">&nbsp;</th>
                </tr>

                <tr>
                    <th colspan="2" style="text-align:right;padding-top:20px;">Subtotal</th>
                    <th class="sub_shipping">
                        <span>{{ App\Site::money($total) }}</span>
                    </th>
                </tr>
                <tr>
                    <th colspan="2" style="text-align:right;padding-top:20px;">Shipping</th>
                    <th class="sub_shipping">
                        <span>{{ App\Site::money($fee) }}</span>
                    </th>
                </tr>
                <tr>
                    <th colspan="3" style="border-bottom:1px solid #ddd;">&nbsp;</th>
                </tr>
                <tr>
                    <th colspan="2" style="text-align:right;padding-top:20px;">Total</th>
                    <th class="total total_all">
                        <span>{{ App\Site::money($total + $fee) }}</span>
                    </th>
                </tr>
            </table>
        </div>
    </div>

    @include('partial.shipping-address', compact('address', 'billingAddress'))


</div>

@endsection