@extends('customer')
@section('content_customer')

<div class="breadcrumb">
    <a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
    <a href="{{ url(App::getLocale().'/customers') }}">{{ trans('global.my-account') }}</a><span> / </span>
    <a href="">Tracking Order</a>
</div>
<h2>
    Tracking Order
</h2>
@include('partial.alert')
<div class="account_form after_clear" style="margin:20px 0 0 0">
    <form action="{{ url(App::getLocale().'/customers/tracking-orders') }}" method="POST">
        {!! csrf_field() !!}
        <div class="row_input">
            <div class="col_input">
                <label>NOMOR ORDER :</label>
                <input type="text" value="{{ Input::get('kp_number') }}" name="kp_number" />
            </div>
        </div>
        <div class="row_input">
            <div class="col_input" style="margin-top:15px;">
                <button class="btn_std" type="submit" style="padding: 0 30px;">Track</button>
            </div>
        </div>
    </form>

</div>
@if(@$status == 'processing')
<div style="border-bottom:1px solid #ddd;margin-top:60px;"></div>
<div class="box_vm box_result after_clear" style="">
    <table class="tb_biodata" style="width:100%;">
        <tr>
            <th width="60%">Nomor Order/Nomor KP</th> <td width="5%">:</td> <td>{{ Input::get('kp_number') }} / {{ $row->skh_so_kp_number }} </td>
        </tr>
        <tr>
            <th width="60%">Customer</th> <td>:</td> <td>{{ $row->scm_customer_name }}</td>
        </tr>
        <tr>
            <th width="60%">Nama RM</th> <td>:</td> <td>{{ $row->rm_name }}</td>
        </tr>
        <tr>
            <th width="60%">Tanggal Update</th> <td>:</td> <td>{{ Carbon::parse($row->skh_last_update)->format('d M Y') }}</td>
        </tr>
       @if($row->ssh_status_of_pod == 'O')
        <tr>
            <th width="60%">Total Hari </th> <td>:</td> <td>{{ App\Site::daysBetween($row->skh_so_kp_date, $row->ssh_pod_date) }} hari</td>
        </tr>
        @elseif($row->status_delivery == 'D')
        <tr>
            <th width="60%">Total Hari </th> <td>:</td> <td>{{ App\Site::daysBetween($row->skh_so_kp_date, $row->skh_delivery_date) }} hari</td>
        </tr>
        @else
        <tr>
            <th width="60%">Total Hari </th> <td>:</td> <td>{{ App\Site::daysBetween($row->skh_so_kp_date, date('Y-m-d')) }} hari</td>
        </tr>
        @endif

    </table>
</div>
<div style="border-bottom:1px solid #ddd;margin-top:60px;"></div>
<div class="boxWizardStat after_clear">
    <div class="{{ ($row->skh_status_of_so_kp == 'R') ? 'btn_wizard_active' : 'btn_wizard_inactive'}}"><a>KP Entry</a>{{ Carbon::parse($row->skh_so_kp_date)->format('d M Y') }}</div>
    <div class="{{ ($row->skh_status_of_verification == 'R') ? 'btn_wizard_active' : 'btn_wizard_inactive'}}"><a>Verified</a>{{ Carbon::parse($row->skh_lastdate_status_change)->format('d M Y') }}</div>
    <div class="{{ ($row->skh_status_of_invoice == 'P') ? 'btn_wizard_active' : 'btn_wizard_inactive'}}"><a>Invoiced</a>{{ Carbon::parse($row->skh_so_invoice_date)->format('d M Y') }}</div>
    <div class="{{ ($row->skh_status_of_delivery == 'P') ? 'btn_wizard_active' : 'btn_wizard_inactive'}}"><a>Delivered</a>{{ Carbon::parse($row->skh_delivery_date)->format('d M Y') }}</div>
    <div class="{{ ($row->ssh_status_of_pod == 'P') ? 'btn_wizard_active' : 'btn_wizard_inactive'}}"><a>Received</a>{{ Carbon::parse($row->ssh_pod_date)->format('d M Y') }}</div>
</div>
@endif
@if(@$status == 'entry')
<div style="border-bottom:1px solid #ddd;margin-top:60px;"></div>
<div class="box_vm box_result after_clear" style="">
    <table class="tb_biodata" style="width:100%;">
        <tr>
            <th width="60%">Nomor Order</th> <td width="5%">:</td> <td>{{ Input::get('kp_number') }}</td>
        </tr>
        <tr>
            <th width="60%">Customer</th> <td>:</td> <td>{{ @$row->customer->name }}</td>
        </tr>
        <tr>
            <th width="60%">Tanggal Update</th> <td>:</td> <td>{{ @Carbon::parse($row->updated_at)->format('d M Y') }}</td>
        </tr>
        <tr>
            <th width="60%">Total Hari </th> <td>:</td> <td>{{ @App\Site::daysBetween($row->created_at, date('Y-m-d')) }} hari</td>
        </tr>

    </table>
</div>
<div style="border-bottom:1px solid #ddd;margin-top:60px;"></div>
<div class="boxWizardStat after_clear">
    <div class="btn_wizard_active"><a href="">Entry</a>{{ Carbon::now()->format('d M Y') }}</div>
    <div class="btn_wizard_inactive"><a href="">Verified</a></div>
    <div class="btn_wizard_inactive"><a href="">Invoiced</a></div>
    <div class="btn_wizard_inactive"><a href="">Delivered</a></div>
    <div class="btn_wizard_inactive"><a href="">Received</a></div>
</div>
@endif

<div style="border-bottom:1px solid #ddd;margin-top:60px;"></div>
@include('partial.footer-account')
@endsection