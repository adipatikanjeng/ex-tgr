@if($groupProductPricelists)
@foreach($groupProductPricelists->groupBy('code')->get() as $row)
<div class="col_account co_1 after_clear">

    <input class="product_group_checked" autocomplete="off" data-dp="0"
    data-permonth="{{ ($row->credit_installment_number != 0) ? (ceil($row->credit_investation_amount / $row->credit_installment_number)) : 0 }}"
    data-instNumber="{{ $row->credit_installment_number }}" data-total="{{ ($contract->payment_type == "Credit") ? $row->credit_investation_amount : $row->cash_investation_amount }}" type="checkbox"
    {{ (count(@App\Site::savedContractGroupProductPricelist($contract->id, $row->code))) ? 'checked=checked': '' }} name="group_pricelist_code[]" value="{{ $row->code }}"/>
    <label>{{ $row->desc }}</label>&nbsp;&nbsp;&nbsp;&nbsp;
   <label> {{ @App\Site::money(($contract->payment_type == "Credit") ? $row->credit_investation_amount : $row->cash_investation_amount) }}</label>
    <input type="hidden" {{ (count(@App\Site::savedContractGroupProductPricelist($contract->id, $row->code))) ? 'name=total_price[]': '' }} id="total_price{{ $row->code }}" value="{{ $row->total_price }}">
</div>
<br>
@foreach(\App\Models\Product\GroupPricelist::where('code', $row->code)->groupBy('product_code')->get() as $childRow)
@if($childRow->product && $childRow->product->is_kp_online == 'Y')
<div class="row_account produk_list after_clear">
    <div class="col_account co_1">
        <h2>-</h2>
    </div>
    <div class="col_account col_2">
        <img style="max-width:100px" src="{{ asset('contents/'.$childRow->product->img) }}"/>
    </div>
    <div class="col_account col_3">
        <label> {{ @$childRow->product->name }}</label>
    </div>
    <div class="col_account col_4">
    </div>
    <div class="col_account col_4a">

    </div>
    <div class="col_account col_5">
        <input type="text" class="number_input" readonly="true" value="{{ $childRow->product_quantity }}" autocomplete="off"/>
    </div>
</div>
@endif
@endforeach
@endforeach
@endif