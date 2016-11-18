@if($productPricelists)
@foreach($productPricelists as $childRow)
<div class="row_account produk_list after_clear">
@if($childRow->product && $childRow->product->is_kp_online == 'Y')
    <div class="col_account co_1">
        <input class="product_checked" autocomplete="off" data-dp="{{ ((Input::get('installment_number')) ?: $installmentNumber) ? $childRow->dp_amount : 0 }}" data-permonth="{{ $childRow->installment_amount }}" data-instNumber="{{ $childRow->installment_number }}"
        data-total="{{ $childRow->total_price }}" type="checkbox" {{ (count(@App\Site::savedContractProduct($contract->id, $childRow->product->id))) ? 'checked=checked': '' }} name="product_id[]" value="{{ $childRow->product->id }}"/>
        <input type="hidden" {{ (count(@App\Site::savedContractProduct($contract->id, $childRow->product->id))) ? 'name=total_price[]': '' }} id="total_price{{ $childRow->product->id }}" value="{{ $childRow->total_price }}">
    </div>
    <div class="col_account col_2">
        <img style="max-width:100px" src="{{ asset('contents/'.$childRow->product->img) }}"/>
    </div>
    <div class="col_account col_3">
        <label> {{ @$childRow->product->name }}</label>
    </div>
    <div class="col_account col_4">
        <label> {{ @App\Site::money($childRow->total_price) }}</label>
    </div>
    <div class="col_account col_4a">
        <input type="hidden" name="discount_code[]" value="{{ Input::get('discount_code') }}">

        <?php $discount = App\Site::discount($childRow->product->id, Input::get('discount_code')); ?>
        @if(@$discount->discount_type == 'RPH')
        <input type="text" readonly id="discount{{ $childRow->product->id }}" class="number_input"
        value="{{ (@App\Site::discount($childRow->product->id, Input::get('discount_code'))->discount) ?: (@App\Site::savedContractProduct($contract->id, $childRow->product->id)->discount->discount) ?: '0' }}"
        name="discount[]" style="width:35px">&nbsp;
        @else
        <input type="text" readonly id="discount{{ $childRow->product->id }}" class="number_input"
        value="{{ (@App\Site::discount($childRow->product->id, Input::get('discount_code'))->discount) ?: (@App\Site::savedContractProduct($contract->id, $childRow->product->id)->discount->discount) ?: '0' }}"
        name="discount[]" style="width:15px">&nbsp;<label>%</label>
        @endif

    </div>
    <div class="col_account col_5">
        <input type="text" id="quantity{{ $childRow->product->id }}" {{ (count(@App\Site::savedContractProduct($contract->id, $childRow->product->id))) ? 'name=quantity[]': '' }} class="number_input quantityList" autocomplete="off" value="{{ (@App\Site::savedContractProduct($contract->id, $childRow->product->id)->quantity) ?: '1' }}" />
    </div>
    @endif
</div>
@endforeach
@endif