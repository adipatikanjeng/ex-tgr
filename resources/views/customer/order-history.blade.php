@extends('customer')
@section('content_customer')
<div class="breadcrumb breadcrumb_account">
    <a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
    <a href="{{ url(App::getLocale().'/customers') }}">My Account</a><span> / </span>
    <a href="">My Info</a><span> / </span>
    <a href="{{ url(App::getLocale().'/customers/order-histories') }}">History Order</a>
</div>
<h2>
    History Order
</h2>

<div class="outer">
    <div class="box_tb_kontrak">
        <table class="tb_kontrak">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th align="left" width="15%">No. Order</th>
                    <th align="left" width="20%">Tanggal</th>
                    <th width="15%" align="left">Total</th>
                    <th width="15%">Payment</th>
                    <th width="15%">Status</th>
                    <th>Detail Order</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($rows as $row)
                <tr class="<?=($i % 2) ? 'even' : 'odd' ?>">
                    <td align="center">{{ $i }}.</td>
                    <td><a href="{{ url(App::getLocale().'/shopping-cart/detail-orders/'.$row->order_number.'/history') }}" style="color:#1fb25a">{{ $row->order_number }}</a></td>
                    <td>{{ Carbon::parse($row->created_at)->format('d M Y') }}</td>
                    <td align="center">{{ App\Site::money($row->total_amount) }}</td>
                    <td align="center">{{ $row->payment_method }}</td>
                    <td align="center">{{ $row->status->name }}</td>
                    <td align="center">
                        <a href="{{ url(App::getLocale().'/customers/invoice/'.$row->id) }}"><img src="{{ asset('images') }}/material/ico_pdf.png"/></a>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
        @include('pagination.default',['paginator'=>$rows])
    </div>
</div>
@endsection