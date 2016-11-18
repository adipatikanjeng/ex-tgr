<table class="">
    <tr>
        <th class="header_item">item</th>
        <th class="header_desc">description</th>
        <th class="header_harga_satuan">harga</th>
        <th class="header_qty"><span>quantity</span></th>
        <th class="header_total" style="text-align:center;">total</th>
    </tr>

    <?php $total = 0 ?>
    @foreach($rows as $row)
    <tr>
        <td class="img_prod"><img width="100px" src="{{ asset('contents/'.$row->product->img) }}"/></td>
        <td class="text_desc" colspan="2" style="vertical-align:middle">
            <b class="desc">{{ $row->product->name }}</b>
            <span style="float:right;margin-right:55px" class="harga_satuan">{{ App\Site::money(App\Site::pricelist($row->product_id)->total_price) }}</span>
        </td>
        <td class="text_qty">
            <div class="qty">
                <input type="hidden" name="id[]" value="{{ $row->id }}"/>
                <input type="text" data-url="{{ url(App::getLocale().'/shopping-cart/ajax-update-quantity?product_id='.$row->product_id) }}" class="number_input shopping-cart-list" data-id="{{ $row->id }}" id="shoppingCartList{{ $row->id }}" name="quantity[]" autocomplete="off" value="{{ $row->quantity }}"/>
                <span class="remove">
                    <a href="{{ url(App::getLocale().'/shopping-cart/delete-product/'.$row->id) }}" class="del_product"><img src="{{ asset('images') }}/material/remove.png"/></a>
                </span>
            </div>
        </td>
        <td class="shopping_total_harga" style="text-align:center;"><span id="shoppingCartListTotal{{ $row->id }}">{{ App\Site::money($row->price) }}</span></td>
    </tr>
    <?php $total += $row->price ?>
    @endforeach

</table>
<div class="subtotal after_clear">
    <div class="harga">{{ App\Site::money($total) }}</div>
    <div class="label">Subtotal</div>
</div>