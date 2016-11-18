
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
 </head>
<body>
    <table>
        <tr>
            <td>{{ trans('global.name') }}</td><td>: {{ $name }}</td>
        </tr>
        <tr>
            <td>Order Number</td><td>: {{ $orderNumber }}</td>
        </tr>
        <tr>
            <td rowspan="2" rowspan="2">{{ trans('global.products') }}
                <table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;" width="250px">
                    <tr>
                        <td>{{ trans('global.name') }}</td><td>{{ trans('global.quantity') }}</td><td>{{ trans('global.total-price') }}</td>
                    </tr>
                    @foreach($products as $key => $row)
                    <tr>
                    <td>{{ $products[$key]['name'] }}</td><td>{{ $products[$key]['quantity'] }}</td><td>{{ App\Site::money($products[$key]['total_price']) }}</td>
                    </tr>
                    @endforeach
                     <tr><td colspan="2">Shipping Cost</td><td>{{ @App\Site::money($shippingFee) }}</td></tr>
                    <tr><td colspan="2">Total</td><td>{{ @App\Site::money($products['totalPrice']) }}</td></tr>
                     <tr><td colspan="2">Sub Total</td><td>{{ @App\Site::money($products['subTotalPrice']) }}</td></tr>
                </table>
            </td>
        </tr>
        <tr>

        </tr>
    </table>
    Silahkan konfirmasi pembayaran anda <a href="{{ url(App::getLocale().'/customers/payment-confirmation/'.$orderNumber) }}"> disini </a>
</body>
</html>