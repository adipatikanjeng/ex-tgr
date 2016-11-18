@extends('account')
@section('content_account')
<div class="breadcrumb breadcrumb_account">
    <a href="{{ url(App::getLocale()) }}">Home</a><span> / </span>
    <a href="{{ url(App::getLocale().'/my-account') }}">My Account</a><span> / </span>
    <a href="{{ url(App::getLocale().'/my-account') }}">My Info</a><span> / </span>
    <a href="">Kontrak Pembelian</a>
</div>
<h2>
    Kontrak Pembelian
</h2>
@include('partial.alert')
<div class="contact_form form_account after_clear" style="margin:60px 0 0 0">
    <form method="GET" action="">
        <div class="row_account after_clear">
            <div class="col_account">
                <div class="inves">
                    <div><input type="text" class="datepicker" value="{{ Input::get('start_date') }}" placeholder="Start Date" name="start_date" onchange="this.form.submit()"></div>
                </div>
            </div>
            <div class="col_account">
                <div class="inves">
                    <div> <input type="text" class="datepicker" value="{{ Input::get('end_date') }}" name="end_date" placeholder="End Date" onchange="this.form.submit()"></div>
                </div>
            </div>
        </div>
        <div class="row_account after_clear">
            <div class="col_account">
                <div class="inves">
                    <div> {!! Form::select('status', [ '' => 'Select Status', 'Completed' => 'Completed','Released' => 'Released','Sent to Ho' => 'Sent to Ho','Rejected' => 'Rejected'], @Input::get('status'), ['onchange' => "this.form.submit()", 'autocomplete' => 'off', 'style' => 'width:258px !important']) !!}</div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="outer">
    <div class="box_tb_kontrak">
        <table class="tb_kontrak">
            <thead>
                <tr>
                    <th width="10%">No.</th>
                    <th width="15%">No. Contract</th>
                    <th align="left" width="20%">{{ trans('global.name') }}</th>
                    <th align="left" width="20%">Tanggal</th>
                    <th width="15%">Status</th>
                    <th colspan="2" width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1?>
                @foreach($rows as $row)
                <tr class="odd">
                    <td align="center">{{ $i }}.</td>
                    <td>{{ $row->contract_number }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ Carbon::parse($row->created_at)->format('d F Y') }}</td>
                    <td align="center">
                        @if($row->status == 'Completed')
                        <a title="Release" href="{{ url(App::getLocale().'/my-account/contracts/release/'.$row->id) }}"><img src="{{ asset('images') }}/material/check.png"/></a>
                        @elseif($row->status == "")
                        Incompleted
                        @else
                        {{ $row->status }}
                        @endif
                    </td>
                    <td align="center">
                     <a href="{{ url(App::getLocale().'/my-account/contracts/invoice/'.$row->id) }}" style="margin-left:40px;" target="_blank"><img src="{{ asset('images') }}/material/ico_pdf.png"/></a>
                     @if($row->status == null || $row->status == 'Completed' || $row->status == 'Rejected')
                     <a href="{{ url(App::getLocale().'/my-account/contracts/page-one/'.$row->id) }}"><img src="{{ asset('images') }}/material/pencil.png"/></a>
                     <a class="delete-contract" href="{{ url(App::getLocale().'/my-account/contracts/ajax-delete-contract/'.$row->id) }}"><img src="{{ asset('images') }}/material/delete.png"/></a>
                     @endif
                 </td>
             </tr>
             <?php $i++?>
             @endforeach
         </tbody>
     </table>
 </div>
</div>
@include('pagination.default', ['paginator' => $rows])

<div class="boxCreate">
    <a href="{{ url(App::getLocale().'/my-account/contracts/page-one') }}" class="btn_std">Create New</a>
</div>
@endsection