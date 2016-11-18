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
    <div class="boxWizard after_clear">
        <ul class="after_clear">
            <li>1</li>
            <li class="active">2</li>
            <li>3</li>
            <li>4</li>
        </ul>
    </div>
</h2>
<div class="contact_form form_account after_clear" style="margin:0px 0 0 0">
    <form id="filterForm" action="" method="GET">
        <div class="row_account after_clear">
         <div class="col_account">
            <label style="letter-spacing: 2px;">pemilikan program dengan: </label>
            {!! Form::select('payment_type', ['Cash' => 'Cash', 'Credit' => 'Credit', 'COD' => 'COD'], @$contract->payment_type, ['id' => 'paymentTypeContract', 'disabled' => true]) !!}
        </div>
         <div class="col_account">
            <label style="letter-spacing: 2px;">pilih prinsipal:</label>
            <div id="category">
                {!! Form::select('category_id', $categories, (Input::get('category_id')) ?: $categoryId , ['autocomplete' => 'off',  'onchange' => "this.form.submit()"]) !!}
            </div>
        </div>
    </div>
    <div class="row_account after_clear">
        <div class="col_account">
            <label style="letter-spacing: 2px;">pricelist:</label>
            <div id="pricelist">
                {!! Form::select('pricelist_code', $pricelists, (Input::get('pricelist_code')) ?: ($pricelistCode) , ['id' => 'pricelistProductContract', 'data-url' => url(App::getLocale().'/my-account/contracts/ajax-installment-list'), 'autocomplete' => 'off',  'disabled']) !!}
                <input type="hidden" name="pricelist_code" value="{{ (Input::get('pricelist_code')) ?: ($pricelistCode) }}">
            </div>
        </div>
        <div class="col_account">
            <label style="letter-spacing: 2px;">group pricelist:</label>
            <div id="pricelist">
                {!! Form::select('group_pricelist', ['standar' => 'Single', 'group' => 'Group'], (Input::get('group_pricelist') ?: $savedGroup), ['id' => 'groupPricelistProductContract', 'onchange' => "this.form.submit()", 'autocomplete' => 'off']) !!}
            </div>
        </div>
    </div>
</form>
<form method="GET">
    <input type="hidden" value="{{ Input::get('category_id') }}" name="category_id">
    <input type="hidden" value="{{ Input::get('pricelist_code') }}" name="pricelist_code">
    <input type="hidden" value="{{ Input::get('group_pricelist') }}" name="group_pricelist">
    <input type="hidden" value="STD" name="discount_code">
    <div class="contact_form form_account"  style="margin: 0px 0 0">
        <div class="row_account after_clear">
            <div class="col_account">
                <label style="letter-spacing: 2px;">installment number:</label>{{ Input::old('installment_number') }}
                <div id="pricelist">
                    {!! Form::select('installment_number', $installments, (Input::get('installment_number')) ?: $installmentNumber, ['id' => 'discountProductContract', 'onchange' => "this.form.submit()", 'autocomplete' => 'off']) !!}
                </div>
            </div>
        </div>
    </div>
</form>
<h2>Menyetujui memiliki program pendidikan PT. Tigaraksa Satria, tbk
    - educational product division dengan seri :</h2>
    <form action="{{ url(App::getLocale().'/my-account/contracts/page-two') }}" method="POST" id="formPageTwo">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{ @$contract->id }}">
        <input type="hidden" name="pricelist_code" value="{{ (Input::get('pricelist_code')) ?: ($pricelistCode) }}">
        <input type="hidden" name="installment_number" value="{{ (Input::get('installment_number')) ?: $installmentNumber }}">
        <input type="hidden" id="totalBeforeDiscountHeader" value="0">
        <h5>Produk :</h5>
        <div id="productList">
            @if(Input::get('group_pricelist') == 'group' || $savedGroup == 'group' && Input::get('group_pricelist') != 'standar')
            @include('account.contract.product_list_group', ['productPricelists' => $productPricelists, 'contract' => $contract, 'groupProductPricelists' => $groupProductPricelists, 'installmentNumber' => $installmentNumber])
            @elseif(Input::get('pricelist_code') != 'group' || $pricelistCode)
            @include('account.contract.product_list', ['productPricelists' => $productPricelists, 'contract' => $contract, 'installmentNumber' => $installmentNumber])
            @endif
        </div>
        <div class="row_account after_clear">
            <div class="col_account">
                <label style="letter-spacing: 2px;">Discount Header :</label>
                <div class="inves">
                    <?php $discountHeader = App\Site::discountHeader((Input::get('discount_code')) ?: $discountCode) ?>
                    <div class="rp">Rp. </div>
                    <div><input readonly="true" type="text" style="width:100px!important" name="discount_header" autocomplete="off" id="discountHeaderRp" value="{{ ($discountHeader) ? (($discountHeader->discount_type == 'RPH') ? $discountHeader->discount : 0) : 0 }}" class="number_input contract_investment"/></div>
                    <div class="rp">&nbsp;/</div>
                    <div><input type="text" readonly="true" style="width:20px!important" name="discount_header" autocomplete="off" id="discountHeaderPsg" value="{{ ($discountHeader) ? (($discountHeader->discount_type == 'PSG') ? $discountHeader->discount : 0) : 0 }}" class="number_input contract_investment"/></div><div class="rp">&nbsp;% </div>
                </div>
            </div>
        </div>
        <div class="row_account after_clear">
            <div class="col_account">
                <label style="letter-spacing: 2px;">Jumlah seluruh investasi :</label>
                <div class="inves">
                    <div class="rp">Rp. </div>
                    <div><input id="totalInvestment" type="text" name="total_investment" autocomplete="off" readonly="true" {{ ((!Input::get('installment_number')) && !$installmentNumber) ? 'readonly' : 'required' }} value="0" class="number_input contract_investment"/></div>
                </div>
            </div>
            <div class="col_account">
                <label style="letter-spacing: 2px;">investasi awal</label>
                <div class="inves">
                    <div class="rp">Rp. </div>
                    <div><input type="text" name="initial_investment" id="initialInvestment" autocomplete="off" {{ (!Input::get('installment_number') && !$installmentNumber) ? 'readonly' : 'required' }} value="0" class="number_input contract_investment"/></div>
                </div>
            </div>
        </div>
        <div class="row_account after_clear">
            <div class="col_account">
                <label style="letter-spacing: 2px;">sisa investasi</label>
                <div class="inves">
                    <div class="rp">Rp. </div>
                    <div><input type="text" name="residual_investment" readonly="true" autocomplete="off" {{ (!Input::get('installment_number') && !$installmentNumber) ? 'readonly' : '' }} value="0" class="number_input contract_investment"/></div>
                </div>
            </div>
            <div class="col_account">
                <label style="letter-spacing: 2px;">investasi/ bulan </label>
                <div class="inves">
                    <div class="rp">Rp. </div>
                    <div><input type="text" name="month_investment" readonly="true" autocomplete="off" value="0" class="number_input contract_investment" {{ (!Input::get('installment_number') && !$installmentNumber) ? 'readonly' : '' }}/></div>
                </div>
            </div>
        </div>
        <label><font color="red">*</font> HARGA BELUM TERMASUK PPN</label>
        <div class="box_vm" style="padding: 20px 30px;margin-top:40px;">
            <p style="text-align:center;">
                <b>{!! $termAndCond !!}</b>
            </p>
        </div>

        <div style="margin-top:20px;">
            <button type="submit" class="btn_std_dis" style="padding:0 115px">Continue</button>
        </div>

    </form>

</div>
<script type="text/javascript">
 $("#formPageTwo").submit(function(){
     if ($('#totalInvestment').val() == 0) {
         alert('Total seluruh investasi harus lebih dari 0!')
         return false;
     }
     else {
         return true;
     }
 })
</script>

@endsection