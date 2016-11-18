/*=============================================================================================
 Company    : PT Web Architect Technology - webarq.com
 Document   : Javascript Plugin Exe
 Author     : Rizki Nida Chaerulsyah - akuiki.net
 ==============================================================================================*/
$(document).ready(function () {
    $(".banner .slider").bxSlider({
        auto: true,
        pause: 5000
    });
    $(".popularseries .caraousel").bxSlider();
    var event_caraousel = $(".events .caraousel").bxSlider({
        slideMargin: 30,
        slideWidth: 470,
        minSlides: 2,
        maxSlides: 2
    });
    var csr_caraousel = $(".csr .caraousel").bxSlider({
        slideWidth: 140,
        slideMargin: 27,
        minSlides: 3,
        maxSlides: 3
    });

    playVideo();//click play video home
    responsiveEventsSlider(event_caraousel);//reload slider for responsive
    responsiveCSRSlider(csr_caraousel);//reload slider for responsive
    bg_side();//width side bg
    lightBox(); //Light Box Image
    onlyNumber();
    tabAccount();
    orgTreeView();
    $("#edit_profile").click(function(){
        $(".frm_edit").removeAttr("disabled");
    });

    arrowTransaksi()//add arrow for current proses at transaction
    cloneForm()//clone form partial
});

$(window).load(function () {

mobileMenu();
tableShoppingCart();

});