function branchesMap(s) {
    var myLatLng = {lat: -6.2518196, lng: 106.8069499};

    var map = new google.maps.Map(s.element[0], {
        center: myLatLng,
        zoom: parseFloat(5)
    });
    var url = publicUrl("about-us/branch-lists");
    $.getJSON(url, function(json1) {
        $.each(json1, function(key, data) {
            var contentString = data.desc;

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            var latLng = new google.maps.LatLng(data.lat, data.long);

            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                title: data.name
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);

            });
        });
    });



}


$(function() {
    $( ".datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-50:+5",
        dateFormat: "d MM yy"
    });
    $( ".datetimepicker" ).datetimepicker({
        timeFormat: 'HH:mm'
    });
    $("#provinceShipping").on('change', function(){
        $.ajax({
            url: $(this).data('url')+'/'+$(this).val(),
        }).done(function(result) {
            $('#cityShipping').html(result.html);
        });
    });

    $('.del_product').on('click', function(e){
        e.preventDefault();
        var del = window.confirm("Do you want to delete this product ?");
        if (del) {
            window.location = this.href;
        }
    });
    if($('#paymentTypeContract').val() == 'Cash'){
        $('#branchListId').removeAttr('disabled');
        $('#branch_code').removeAttr('name');
    }else{
       $('#branchListId').attr('disabled', 'true');
       $('#branch_code').attr('name', 'branch_code');
    }
    $('#paymentTypeContract').on('change', function(){
        if($(this).val() == 'Cash') {
            $('#branchListId').removeAttr('disabled');
            $('#branch_code').removeAttr('name');
            $('input[name="id_card"]').attr('required');
        }else{
            $('input[name="email"]').attr('required', 'true');
            $('input[name="postal_code1"]').attr('required', 'true');
            $('input[name="postal_code2"]').attr('required', 'true');
            $('input[name="postal_code3"]').attr('required', 'true');
            $('input[name="postal_code4"]').attr('required', 'true');
            $('input[name="postal_code5"]').attr('required', 'true');
            $('#branchListId').attr('disabled', 'true');
            $('#branch_code').attr('name', 'branch_code');
        }
    });

    if($('#paymentTypeContract').val() == 'cash')
    {
        $('input[name="id_card"]').attr('required');
    }else{
        $('input[name="email"]').attr('required', 'true');
        $('input[name="postal_code1"]').attr('required', 'true');
        $('input[name="postal_code2"]').attr('required', 'true');
        $('input[name="postal_code3"]').attr('required', 'true');
        $('input[name="postal_code4"]').attr('required', 'true');
        $('input[name="postal_code5"]').attr('required', 'true');
    }

    $("#categoryProductContract").on('change', function(){
        $('#pricelistProductContract').prop('selectedIndex',0);
        $.ajax({
            url: $(this).data('url')+'/'+$(this).val()+'/'+$(this).data('type'),
        }).done(function(result) {
            $('#productList').html(result.html);
            $('#pricelist').html(result.pricelist);
        });
    });

    $('.contract_investment').on('keyup', function(){
        // var credit_total_month = parseInt($('select[name="credit_total_month"]').val());
        // var total_investment = parseInt($('input[name="total_investment"]').val());
        // var initial_investment = parseInt($('input[name="initial_investment"]').val());
        // var residual_investment = parseInt($('input[name="residual_investment"]').val());
        // $('input[name="residual_investment"]').val(total_investment - initial_investment);
        // $('input[name="month_investment"]').val(Math.round(residual_investment / credit_total_month).toFixed(2));
    });

    $('.buy-online').on('click', function(){
     $.ajax({
        url: $(this).data('href')+'&quantity='+$('#buyOnlineQty'+$(this).data('id')).val(),
        method: 'post'
    }).done(function(result) {
        alert(result.message);
        $('#myCart').html(result.html);
    });
});
    $(document).on('change','#pricelistProductContract', function(){
        // $("#discountProductContract").val("");
        // $.ajax({
        //     url: publicUrl('my-account/contracts/ajax-product-pricelists')+'?desc='+$(this).val(),
        //     method: 'get'
        // }).done(function(result) {
        //     $('#productList').html(result.html);
        // });
});
    var dp = 0;
    var permonth = 0;
    var total = 0;
    var installmentNumber = 0;
    var discountHeader = 0;
    var totalAfterDiscount = 0;
    $('.product_checked:checked').each(function () {
       discountHeader = discount();
       percent =($("#discount"+$(this).val()).val()!=0) ? (($("#discount"+$(this).val()).val().length >= 3) ? $("#discount"+$(this).val()).val() : $(this).attr('data-total')/$("#discount"+$(this).val()).val()) : 0;
       quantity = $("#quantity"+$(this).val()).val();
       dp += parseInt($(this).attr('data-dp'));
       installmentNumber = $(this).attr('data-instNumber');
       total += parseInt(($(this).attr('data-total') - percent) * quantity);
       totalAfterDiscount = total - discountHeader;
   });
    $('#totalBeforeDiscountHeader').val(total);
    $('input[name="total_investment"]').val((totalAfterDiscount < 0) ? 0 : totalAfterDiscount);
    $('input[name="initial_investment"]').val(dp);
    $('input[name="residual_investment"]').val(parseInt((dp != 0) ? ($('input[name="total_investment"]').val() - dp) : 0));
    $('input[name="month_investment"]').val((installmentNumber!=0) ? parseInt($('input[name="residual_investment"]').val()) / installmentNumber : 0);

    $('.product_group_checked:checked').each(function () {
       discountHeader = discount();
       installmentNumber = $(this).attr('data-instNumber');
       total += parseInt($(this).attr('data-total'));
       totalAfterDiscount = total - discountHeader;
   });
    $('#totalBeforeDiscountHeader').val(total);
    $('input[name="total_investment"]').val((totalAfterDiscount < 0) ? 0 : totalAfterDiscount);
    $('input[name="initial_investment"]').val(dp);
    $('input[name="residual_investment"]').val(parseInt((dp != 0) ? ($('input[name="total_investment"]').val() - dp) : 0));
    $('input[name="month_investment"]').val((installmentNumber!=0) ? parseInt($('input[name="residual_investment"]').val()) / installmentNumber : 0);

    $(document).on('keyup', '.shopping-cart-list', function(){
        var thisVal = $(this);
        $.ajax({
            url: $(this).data('url')+'&quantity='+$('#shoppingCartList'+$(this).data('id')).val(),
            method: 'post'
        }).done(function(result) {
            $("#shoppingCart").html(result.html);
            $("#myCart").html(result.cart);
        });
    });
    $(document).on('click', '.product_checked', function(){
        var dp = 0;
        var permonth = 0;
        var total = 0;
        var installmentNumber = 0;
        var discountHeader = 0;
        var totalAfterDiscount = 0;
        $('.product_checked:checked').each(function () {
            discountHeader = discount();
            percent =($("#discount"+$(this).val()).val()!=0) ? (($("#discount"+$(this).val()).val().length >= 3) ? $("#discount"+$(this).val()).val() : $(this).attr('data-total')/$("#discount"+$(this).val()).val()) : 0;
            quantity = $("#quantity"+$(this).val()).val();
            dp += parseInt($(this).attr('data-dp'));
            installmentNumber = $(this).attr('data-instNumber');
            total += parseInt(($(this).attr('data-total') - percent) * quantity);
            totalAfterDiscount = total - discountHeader;
        });
        $('#totalBeforeDiscountHeader').val(total);
        $('input[name="total_investment"]').val((totalAfterDiscount < 0) ? 0 : totalAfterDiscount);
        $('input[name="initial_investment"]').val(dp);
        $('input[name="residual_investment"]').val(parseInt((dp != 0) ? ($('input[name="total_investment"]').val() - dp) : 0));
        $('input[name="month_investment"]').val((installmentNumber!=0) ? parseInt($('input[name="residual_investment"]').val()) / installmentNumber : 0);
        $("#quantity"+$(this).val()).attr('name', 'quantity[]');
        $("#total_price"+$(this).val()).attr('name', 'total_price[]');
    });
$(document).on('click', '.product_group_checked', function(){
    var dp = 0;
    var permonth = 0;
    var total = 0;
    var installmentNumber = 0;
    var discountHeader = 0;
    var totalAfterDiscount = 0;
    $('.product_group_checked').not(this).prop('checked', false);
    $('.product_group_checked:checked').each(function () {
        discountHeader = discount();
        installmentNumber = $(this).attr('data-instNumber');
        total += parseInt($(this).attr('data-total'));
        totalAfterDiscount = total - discountHeader;
    });
    $('#totalBeforeDiscountHeader').val(total);
    $('input[name="total_investment"]').val((totalAfterDiscount < 0) ? 0 : totalAfterDiscount);
    $('input[name="initial_investment"]').val(dp);
    $('input[name="residual_investment"]').val(parseInt((dp != 0) ? ($('input[name="total_investment"]').val() - dp) : 0));
    $('input[name="month_investment"]').val((installmentNumber!=0) ? parseInt($('input[name="residual_investment"]').val()) / installmentNumber : 0);
    $("#total_price"+$(this).val()).attr('name', 'total_price[]');
});

$(document).on('change', '.quantityList', function(){
    var dp = 0;
    var permonth = 0;
    var total = 0;
    var installmentNumber = 0;
    var discountHeader = 0;
    var totalAfterDiscount = 0;
    $('.product_checked:checked').each(function () {
        discountHeader = discount();
         percent =($("#discount"+$(this).val()).val()!=0) ? (($("#discount"+$(this).val()).val().length >= 3) ? $("#discount"+$(this).val()).val() : $(this).attr('data-total')/$("#discount"+$(this).val()).val()) : 0;
        quantity = $("#quantity"+$(this).val()).val();
        dp += parseInt($(this).attr('data-dp'));
        installmentNumber = $(this).attr('data-instNumber');
        total += parseInt(($(this).attr('data-total') - percent) * quantity);
        totalAfterDiscount = total - discountHeader;
    });
    $('#totalBeforeDiscountHeader').val(total);
    $('input[name="total_investment"]').val((totalAfterDiscount < 0) ? 0 : totalAfterDiscount);
    $('input[name="initial_investment"]').val(dp);
    $('input[name="residual_investment"]').val(parseInt((dp != 0) ? ($('input[name="total_investment"]').val() - dp) : 0));
    $('input[name="month_investment"]').val((installmentNumber!=0) ? parseInt($('input[name="residual_investment"]').val()) / installmentNumber : 0);

});

$(document).on('change', '#initialInvestment', function(){
    var dp = 0;
    var permonth = 0;
    var total = 0;
    var installmentNumber = 0;
    var discountHeader = 0;
    var totalAfterDiscount = 0;
    $('.product_checked:checked').each(function () {
        discountHeader = discount();
         percent =($("#discount"+$(this).val()).val()!=0) ? (($("#discount"+$(this).val()).val().length >= 3) ? $("#discount"+$(this).val()).val() : $(this).attr('data-total')/$("#discount"+$(this).val()).val()) : 0;
        quantity = $("#quantity"+$(this).val()).val();
        installmentNumber = $(this).attr('data-instNumber');
        total += parseInt(($(this).attr('data-total') - percent) * quantity);
        dp = $('input[name="initial_investment"]').val();
        totalAfterDiscount = total - discountHeader;
    });
    $('#totalBeforeDiscountHeader').val(total);
    $('input[name="total_investment"]').val((totalAfterDiscount < 0) ? 0 : totalAfterDiscount);
    $('input[name="residual_investment"]').val(parseInt((dp != 0) ? ($('input[name="total_investment"]').val() - $('input[name="initial_investment"]').val(dp)) : 0));
    $('input[name="month_investment"]').val((installmentNumber!=0) ? parseInt($('input[name="residual_investment"]').val()) / installmentNumber : 0);

    $('.product_group_checked:checked').each(function () {
        discountHeader = discount();
        installmentNumber = $(this).attr('data-instNumber');
        total += parseInt($(this).attr('data-total'));
        dp = $('input[name="initial_investment"]').val();
        totalAfterDiscount = total - discountHeader;
    });
    $('#totalBeforeDiscountHeader').val(total);
    $('input[name="total_investment"]').val((totalAfterDiscount < 0) ? 0 : totalAfterDiscount);
    $('input[name="residual_investment"]').val(parseInt((dp != 0) ? ($('input[name="total_investment"]').val() - dp) : 0));
    $('input[name="month_investment"]').val((installmentNumber!=0) ? parseInt($('input[name="residual_investment"]').val()) / installmentNumber : 0);

});
$('.phone-number').on('change', function(){
  var str = $(this).val();
  if(str.charAt(0) == '0'){
      str = str.substr(1);
      str = "+62"+str;
      $(this).val(str);
  }
})
$('.change-password').on('click', function(){
   if($('#userPassword').val()!=""){
       $.ajax({
        url: $(this).data('url')+'?password='+$('#userPassword').val()+'&password_confirmation='+$('#userPasswordConfirm').val(),
        method: 'get'
    }).done(function(result) {
        alert(result.message);
    });
}
})
$("img").each(function() {
 if($(this).attr('data-filename') == 'img-summernote')
 {
    src = $(this).attr("src").split('/');
    $(this).attr('src', publicAssetContent(src[src.length - 1]));
}
});
$('#changePasswordMyAccount').on('click', function(){
    $("#divChangePassword").toggle();
})
$('.delete-contract').on('click', function(e){
    e.preventDefault();
    var del = window.confirm("Do you want to delete this contract?");
    if (del) {
        window.location = this.href;
    }
});

    $('.postal_code').on('change', function(){
        var paymentType = $('#paymentTypeContract').val();
        var postalCode = $('input[name="postal_code1"]').val()+$('input[name="postal_code2"]').val()+$('input[name="postal_code3"]').val()+$('input[name="postal_code4"]').val()+$('input[name="postal_code5"]').val();
        $.ajax({
            url: publicUrl("my-account/contracts/ajax-branch-selector?postalCode=")+postalCode+'&paymentType='+paymentType,
            method: 'POST'
        }).done(function(result) {
            $('#branchList').html(result.html);
            if($('#paymentTypeContract').val() == 'Cash'){
                $('#branchListId').removeAttr('disabled');
                $('#branch_code').removeAttr('name');
            }else{
             $('#branchListId').attr('disabled', 'true');
             $('#branch_code').attr('name', 'branch_code');
         }
        });
    });
});


function discount(){
    if($('#discountHeaderRp').val()!=0){
        discountHeader = $('#discountHeaderRp').val();
    }else if($('#discountHeaderPsg').val()!=0){
        discountHeader = parseInt($('#totalBeforeDiscountHeader').val()) * (1 / parseInt($('#discountHeaderPsg').val()));
    }else{
        discountHeader = 0;
    }
    return discountHeader;
}



