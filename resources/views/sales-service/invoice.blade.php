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
     /*width: 700px;*/
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
   font-size: 24px;
   text-decoration: underline;
   font-weight:500;
 }
 .data{ padding: 10px 20px; }
 .page-break {
  page-break-after: always;
}
</style>
</head>

<body>
  <div class="wrap">
    <img src="{{ public_path('images') }}/material/logo_invoice.png" alt="" />
    <h2 align="center">KONTRAK PEMBELIAN</h2>
    <table width="100%" border="0">
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td>Seles Name </td>
            <td>:	{{ $row->user->profile->rm_name }}</td>
          </tr>
          <tr>
            <td>Id </td>
            <td>:	{{ $row->user->profile->rm_rep_id }}</td>
          </tr>
        </table></td>
        <td><table width="100%" border="0">
          <tr>
            <td> Cabang </td>
            <td> :  {{ $row->user->profile->rm_branch_id }}</td>
          </tr>
          <tr>
            <td>Current Status</td>
            <td>: {{ $row->user->profile->rm_current_position }}</td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="100%" border="0" class="info_address" style="margin-top:5px;">
      <tr>
        <th colspan="2" width="100%">Detail Kontrak</th>
      </tr>
      <tr>
        <td><table width="100%" border="0" class="data">
          <tr>
            <td width="100">No Kontrak</td>
            <td>: {{ @$row->contract_number }} </td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>: {{ $row->name }}</td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>: {{ App\Site::gender($row->gender) }}</td>
          </tr>
          <tr>
            <td>Kantor</td>
            <td>: {{ $row->office }}</td>
          </tr>
          <tr>
            <td>Alamat Kantor</td>
            <td>: {{ $row->office_address }} {{ ($row->floor !="") ? "Lantai : ".$row->floor : "" }}</td>
          </tr>
          <tr>
            <td>No Telepon Kantor</td>
            <td>: {{ $row->office_telephone }}</td>
          </tr><tr>
          <td>Jabatan</td>
          <td>: {{ $row->position }}</td>
        </tr>
      </table></td>
      <td><table width="100%" border="0" class="data">
        <tr>
          <td width="100">Email</td>
          <td>: {{ $row->email }} </td>
        </tr>
		<tr>
          <td>HP</td>
          <td>: {{ $row->mobile_phone }}</td>
        </tr>
        <tr>
          <td>Alamat Rumah</td>
          <td>: {{ $row->home_address }}</td>
        </tr>
        <tr>
          <td>Telepon Rumah</td>
          <td>: {{ $row->home_telephone }}</td>
        </tr>
        <tr>
          <td>Kode Pos</td>
          <td>: {{ $row->postal_code }}</td>
        </tr>
        <tr>
          <td>Alamat Kirim</td>
          <td>: {{ $row->shipping_address }}</td>
        </tr>
        <tr>
          <td>Alamat Tagih</td>
          <td>: {{ $row->receivable_address }}</td>
        </tr>
        <tr>
          <td>Kode Pos</td>
          <td>: {{ $row->postal_code }}</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;&nbsp;<b>Produk yang dibeli</b>
        <table width="100%" border="0"  class="detail">
          <tr>
            <td width="5">No.</td>
            <td>Product</td>
            <td>Qty</td>
            <td>Harga Jual</td>
            <td>Total</td>
          </tr>
          @if(count($products))
          @foreach($products as $key => $value)
          <tr>
            <td>{{ $key + 1 }}.</td>
            <td>{{ $value->product->name }}</td>
            <td>{{ $value->quantity }}</td>
            <td>{{ @App\Site::money($value->total_price) }}</td>
            <td>{{ @App\Site::money($value->total_price * $value->quantity) }}</td>
          </tr>
          @endforeach
          @elseif(count($productGroups))
          @foreach($productGroups as $key => $value)
          @if($value->product && $value->product->is_kp_online == 'Y')
          <tr>
            <td>{{ $key + 1 }}.</td>
            <td>{{ $value->product->name }}</td>
            <td>{{ $value->quantity }}</td>
            <td>{{ @App\Site::money($value->cash_investation_amount) }}</td>
            <td>{{ @App\Site::money($value->cash_investation_amount) }}</td>
          </tr>
          @endif
          @endforeach
          @endif
        </table>
      </td>
    </tr>
    <tr>
      <td><table width="100%" border="0" class="data">
        <tr>
          <td width="150">Tipe Pembayaran</td>
          <td>: {{ @$row->payment_type }} </td>
        </tr>
        @if($row->payment_type == 'Credit')
        <tr>
          <td width="150">Pembayaran selama</td>
          <td>: {{ @$row->credit_total_month }} bulan </td>
        </tr>
        <tr>
          <td colspan="2"><b>Investasi</b></td>
        </tr>
        <tr>
          <td width="150">Investasi Awal</td>
          <td>: {{ @App\Site::money($row->initial_investment) }} </td>
        </tr>
        <tr>
          <td>Total Investasi</td>
          <td>: {{ @App\Site::money($row->total_investment) }}</td>
        </tr>
        <tr>
          <td width="150">Investasi Per bulan</td>
          <td>: {{ @App\SIte::money($row->month_investment) }} </td>
        </tr>
        <tr>
          <td>Sisa Investasi</td>
          <td>: {{ @App\Site::money($row->residual_investment) }}</td>
        </tr>
        @endif

        <tr>
          <td colspan="2"><b>Biodata Keluarga</b></td>
        </tr>
        <tr>
          <td width="150">Nama Suami/Istri</td>
          <td>: {{ @$row->couple_name }} </td>
        </tr>
        <tr>
          <td>Bekerja Pada</td>
          <td>: {{ $row->couple_office }}</td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td>: {{ $row->couple_position }}</td>
        </tr>
        <tr>
          <td>Kantor</td>
          <td>: {{ $row->couple_office }}</td>
        </tr>
        <tr>
          <td>Alamat Kantor</td>
          <td>: {{ $row->couple_office_address }}</td>
        </tr>
        <tr>
          <td>No Telepon</td>
          <td>: {{ $row->couple_telephone }}</td>
        </tr><tr>
        <td colspan="2">
          <b>Anak</b>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <table width="100%" border="0"  class="detail">
            <tr>
              <td width="5">No. </td>
              <td>Nama</td>
              <td>Tgl. Lahir</td>
              <td>Sekolah</td>
            </tr>
            @foreach($children as $key => $value)
            <tr>
              <td>{{ $key + 1 }}.</td>
              <td>{{ $value->name }}</td>
              <td>{{ @Carbon::parse($value->date_of_birth)->format('d-m-Y') }}</td>
              <td>{{ $value->school }}</td>
            </tr>
            @endforeach
          </table></td>
        </tr>

        <tr>
        </table>
      </td>
      <td>
        <table width="100%" border="0" class="data">

        </tr>
        <tr>
          <td colspan="2">
            <b>Keluarga terdekat yang bukan serumah</b>
          </td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>: {{ $row->relatives_name }}</td>
        </tr>
        <tr>
          <td>Alamat Kantor</td>
          <td>: {{ $row->relatives_address }}</td>
        </tr>
        <tr>
          <td>No Telepon</td>
          <td>: {{ $row->relatives_telephone }}</td>
        </tr>
        <tr><td colspan="2"><b>Data kartu kredit</b></td></tr>
        <tr>
          <td>No. Kartu</td>
          <td>: {{ $row->cc_number }}</td>
        </tr>
        <tr>
          <td>Bank</td>
          <td>: {{ $row->cc_bank }}</td>
        </tr>
        <tr>
          <td>Masa Berlaku sampai</td>
          <td>: {{ Carbon::parse($row->cc_valid_date)->format('d F Y') }}</td>
        </tr>
        <tr>
          <td colspan="2"><b>Data lain</b></td>
        </tr>
        <tr>
          <td>Setatus Rumah</td>
          <td>: {{ $row->home_status }}</td>
        </tr>
        <tr>
          <td>Referensi</td>
          <td>: {{ ($row->reference_source_other) ?: $row->reference_source }}</td>
        </tr>
        <tr>
          <td colspan="2">
           <b>Program yang pernah diikuti</b>
           <table width="100%" border="0"  class="detail">
            <tr>
              <td width="5">No.</td>
              <td>Produk</td>
              <td>Nama EPC</td>
            </tr>
            @if($ownedProducts)
            @foreach($ownedProducts as $key => $value)
            <tr>
              <td>{{ $key + 1 }}.</td>
              <td>{{ @$value->product->name }}</td>
              <td>{{ $value->epc_name }}</td>
            </tr>
            @endforeach
            @endif
          </table>

        </td>

      </tr>
    </table></td>
  </tr>
</table>

</div>
</body>
</html>
