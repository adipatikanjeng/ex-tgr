<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:500,700);
    html,body{ margin:0; }
    body{ font-family: 'Roboto', sans-serif; font-weight:500; font-size:13px; }
    .wrap{
     border: 1px solid #000;
     width: 920px;
     margin:0 auto;
     padding:20px;
   }
   table {
    border-spacing: 0px;
    border-collapse: separate;
  }
  table{ vertical-align:top; }
  table td,table th{ padding:5px 0px; }
  table th{
   font-weight: 700;
   font-size: 16px;
   text-align: left;
   padding: 10px 20px;
 }
 .info_address{
   border-top-width: 1px;
   border-bottom-width: 1px;
   border-top-style: solid;
   border-bottom-style: solid;
   border-top-color: #000;
   border-bottom-color: #000;
 }
 .info_address td,.info_address th{
   border-right-width: 1px;
   border-right-style: solid;
   border-right-color: #000;
 }
 .info_address th{
   border-bottom-width: 1px;
   border-bottom-style: solid;
   border-bottom-color: #000;
 }
 .info_address td td,.info_address td:last-child,.info_address th:last-child{ border:0px; }
 .detail td{
   border-bottom-width: 1px;
   border-bottom-style: solid;
   border-bottom-color: #000;
   padding:10px;
 }
 .sign{

 }
 .sign td{
   height: 100px;
   border: 1px solid #000;
   text-align: center;
   vertical-align: text-top;
 }
 h2{
   font-size: 36px;
   text-decoration: underline;
   font-weight:700;
 }
 .data{ padding: 10px 20px; }
</style>
</head>

<body>
  <div class="wrap">
    <img src="{{ public_path('images') }}/material/logo_invoice.png" alt="" />
    <h2 align="center">DETAIL ORDER</h2>
    <table width="100%" border="0">
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td>No. Order </td>
            <td>: {{ $order->order_number }}</td>
          </tr>
        </table></td>
        <td><table width="100%" border="0">
          <tr>
            <td> Tanggal Order </td>
            <td> :  {{ Carbon::parse($order->created_at)->format('d F Y') }}</td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="100%" border="0" class="info_address" style="margin-top:10px;">
      <tr>
        <th width="50%">Pengusaha</th>
        <th width="50%" style="  border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #000;">Pembeli Barang</th>
      </tr>
      <tr>
        <td><table width="100%" border="0" class="data">
          <tr>
            <td width="150">Nama</td>
            <td>PT. TIGARAKSA SATRIA, Tbk. </td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>{!! $contact['address'] !!}</td>
          </tr>
          <tr>
            <td>NPWP</td>
            <td>{{ $contact['npwp'] }}</td>
          </tr>
        </table></td>
        <td><table width="100%" border="0" class="data">
          <tr>
            <td width="150">Nama  Customer</td>
            <td>{{ $order->customer->name }} </td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>{{ @$order->customer->address.' '.@$order->customer->city->name }}</td>
          </tr>
          <tr>
            <td>NPWP</td>
            <td>{{ $order->customer->npwp }}</td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="100%" border="0"  class="detail">
      <tr>
        <td>No. Urut</td>
        <td>Product Prinsipal</td>
        <td>Product</td>
        <td>Qty</td>
        <td>Harga Jual</td>
        <td>Total</td>
      </tr>
      <?php $i = 1?>
      <?php $totalPrice = 0?>
      @foreach($orderProducts as $row)
      <tr>
        <td>{{ $i }}.</td>
        <td>{{ @Site::lang($row->product->category, 'name') }}</td>
        <td>{{ $row->product->name }}</td>
        <td>{{ $row->quantity }}</td>
        <td>{{ @App\Site::money($row->total_price/$row->quantity) }}</td>
        <td>{{ @App\Site::money($row->total_price) }}</td>
      </tr>
      <?php $totalPrice += $row->total_price?>
      <?php $i++?>
      @endforeach
      <tr><td colspan="4"></td><td>Total</td><td>{{ @App\Site::money($totalPrice) }}</td></tr>
    </table>
    <table width="100%" border="0" style="margin-top:20px;">
      <tr>
        <td width="250px;"><table width="100%" border="0" style="margin-left:20px;">
         <tr>
            <td>Shipping       : </td>
            <td> {{ @App\Site::money($order->shipping_amount) }} </td>
          </tr>
          <tr>
            <td>Total Pembayaran       : </td>
            <td> {{ @App\Site::money($totalPrice + $order->shipping_amount) }} </td>
          </tr>
        </table></td>
      </tr>
    </table></div>
  </body>
  </html>
