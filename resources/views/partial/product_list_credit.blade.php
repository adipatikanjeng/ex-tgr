@if($products)
@foreach($products as $childRow)
<div class="row_account produk_list after_clear">
    <div class="col_account co_1">
        <input class="product_checked" data-dp="{{ @App\Site::dataPricelist($childRow->id)->dp_amount }}" data-permonth="{{ @App\Site::dataPricelist($childRow->id)->installment_amount }}" data-total="{{ @App\Site::dataPricelist($childRow->id)->total_price }}" {{ (App\Site::checkHasPricelist($childRow->id)) ? '' : 'disabled' }} type="checkbox" {{ (count(@\App\Site::savedContractProduct($contract->id, $childRow->id))) ? 'checked=checked': '' }} name="product_id[]" value="{{ $childRow->id }}"/>
    </div>
    <div class="col_account col_2">
        <img style="max-width:100px" src="{{ asset('contents/'.$childRow->img) }}"/>
    </div>
    <div class="col_account col_3">
        <label> {{ @$childRow->name }}</label>
        @if(App\Site::checkHasPricelist($childRow->id))
        <span style="float: right">
            {!! Form::select('pricelist_id[]', ['' => 'Pilih Jumlah Angsuran'] + \App\Site::monthList($childRow->id)->toArray(), (@\App\Site::savedContractProduct($contract->id,$childRow->id)->pricelist_id) ?: Input::old('pricelist_id'), ['style' => 'width:60px!important;', 'class' => 'month-list', 'id' => 'pricelist-id'.$childRow->id,'data-url' => url(App::getLocale().'/my-account/ajax-installment-price'), 'data-id' => $childRow->id]) !!}
        </span>
        @endif
    </div>
    <div class="col_account col_4">
    @if(App\Site::checkHasPricelist($childRow->id))
        <label> <span  id="totalPrice{{ $childRow->id }}">{{ @App\Site::money($childRow->pricelist->total_price) }}</span><input type="hidden" name="total_price" value="{{ $childRow->total_price }}"></label>
    @endif
    </div>
    <div class="col_account col_5">
    @if(App\Site::checkHasPricelist($childRow->id))
        <input type="text" class="number_input" value="{{ (@\App\Site::savedContractProduct($contract->id,$childRow->id)->quantity) ?: '1' }}" name="quantity[]"/>
    @endif
    </div>
</div>
@endforeach
@endif