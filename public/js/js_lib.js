/*=============================================================================================
 Company    : PT Web Architect Technology - webarq.com
 Document   : Javascript Plugin Lib
 Author     : Rizki Nida Chaerulsyah - akuiki.net
 ==============================================================================================*/

$.fn.styledSelect = function (options) {
    var isFF2 = $.browser.mozilla && $.browser.version.indexOf('1.8.') == 0;
    var prefs = {
        coverClass: 'select-replace-cover',
        innerClass: 'select-replace',
        adjustPosition: {
            top: 0,
            left: 0
        },
        selectOpacity: 0
    }
    if (options)
        $.extend(prefs, options);
    return this.each(function () {
        if (isFF2)
            return false;
        var selElm = $(this);
        if (!selElm.next('span.' + prefs.innerClass).length) {
            selElm.wrap('<span><' + '/span>');
            selElm.after('<span><' + '/span>');
            var selReplace = selElm.next();
            var selCover = selElm.parent();
            selElm.css({
                'opacity': prefs.selectOpacity,
                'visibility': 'visible',
                'position': 'absolute',
                'top': 0,
                'left': 0,
                'display': 'inline',
                'z-index': 1
            });
            selCover.addClass(prefs.coverClass).css({
                'display': 'inline-block',
                'position': 'relative',
                'top': prefs.adjustPosition.top,
                'left': prefs.adjustPosition.left,
                'z-index': 0,
                'vertical-align': 'middle',
                'text-align': 'left'
            });
            selReplace.addClass(prefs.innerClass).css({
                'display': 'block',
                'white-space': 'nowrap'
            });

            selElm.bind('change', function () {
                $(this).next().text(this.options[this.selectedIndex].text);
            }).bind('resize', function () {
                $(this).parent().width($(this).width() + 'px');
            });
            selElm.trigger('change').trigger('resize');
        } else {
            var selElm = $(this);
            var selReplace = selElm.next();
            var selCover = selElm.parent();
            selElm.css({
                'opacity': prefs.selectOpacity,
                'visibility': 'visible',
                'position': 'absolute',
                'top': 0,
                'left': 0,
                'display': 'inline',
                'z-index': 1
            });
            selCover.css({
                'display': 'inline-block',
                'position': 'relative',
                'top': prefs.adjustPosition.top,
                'left': prefs.adjustPosition.left,
                'z-index': 0,
                'vertical-align': 'middle',
                'text-align': 'left'
            });
            selReplace.css({
                'display': 'block',
                'white-space': 'nowrap'
            });

        }
    });
}
function playVideo() {
    $(".video").click(function () {
        var player = $(this).find("video")[0];
        if (player.paused) {
            $(this).find(".cover").fadeOut(300);
            player.play();
        } else {
            $(this).find(".cover").fadeIn(300);
            player.pause();
        }
    });
}

function responsiveEventsSlider(slider) {
    var act = {};
    act.responsive = function () {
        var window_width = $(window).width();
        if (window_width > 1000) {
            slider.reloadSlider({
                slideMargin: 30,
                slideWidth: 470,
                minSlides: 2,
                maxSlides: 2
            });
        }
        else if (window_width < 1000 && window_width >= 768) {
            slider.reloadSlider({
                slideMargin: 0,
                slideWidth: 570,
                minSlides: 1,
                maxSlides: 1
            });
        }
        else if (window_width < 768 && window_width >= 480) {
            slider.reloadSlider({
                slideMargin: 0,
                slideWidth: 410,
                minSlides: 1,
                maxSlides: 1
            });
        }
        else if (window_width < 480 && window_width >= 320) {
            slider.reloadSlider({
                slideMargin: 0,
                slideWidth: 240,
                minSlides: 1,
                maxSlides: 1
            });
        }
    };
    if ($(slider.selector).length) {
        setTimeout(function () {
            act.responsive();
        }, 300);
        $(window).resize(function () {
            act.responsive();
        });
    }

}
;

function responsiveCSRSlider(slider) {
    var act = {};
    act.responsive = function () {
        var window_width = $(window).width();
        if (window_width > 1000) {
            slider.reloadSlider({
                slideWidth: 140,
                slideMargin: 27,
                minSlides: 3,
                maxSlides: 3
            });
        }
        else if (window_width < 1000 && window_width >= 480) {
            slider.reloadSlider({
                adaptiveHeight: true,
                slideWidth: 140,
                slideMargin: 27,
                minSlides: 2,
                maxSlides: 2
            });
        } else if (window_width < 480 && window_width >= 320) {
            slider.reloadSlider({
                adaptiveHeight: true,
                slideMargin: 0,
                slideWidth: 240,
                minSlides: 1,
                maxSlides: 1
            });
        }
    };
    if ($(slider.selector).length) {

        setTimeout(function () {
            act.responsive();
        }, 300);
        $(window).resize(function () {
            act.responsive();
        });
    }
}
;

function bg_side() {
    var
            act = function () {
                var
                        w_width = $(window).width(),
                        w_wrapper = $(".content_std .wrapper").width(),
                        w_side = 0;

                w_side = (w_width - w_wrapper) / 2;
                $(".bg_title,.bg_side,section.banner .title").width(w_side + 230);
                $(".border_breadcrumb").width(w_side + 740);
                $(".bg_prod_detail,.bg_prod_detail_contact").width(w_side + 740);
                console.log(w_side + 740);

                $(".bg_prod_detail").height($(".content_std .wrapper .inner_content").height() - 193);

                $(window).load(function () {
                    $(".bg_prod_detail").height($(".content_std .wrapper .inner_content").height() - 193);
                });

            };

    act();
    $(window).resize(function () {
        act();
    });
}

function branchesMap(s) {
    var myLatLng = {lat: -6.2518196, lng: 106.8069499};

    var map = new google.maps.Map(s.element[0], {
        center: myLatLng,
        zoom: parseFloat(5)
    });

    var contentString = '<div class="contentMaps">' +
            '<h2>Jakarta / Head Office</h2>' +
            '<div>' +
            '<p>Gedung Sucofindo Lt. 14<br/>' +
            'Jl. Raya Pasar Minggu Kav. 34 <br/>' +
            'Pancoran, Jakarta Selatan - 12780 <br/>' +
            'Telp. (021) 791 80888' +
            '</p>' +
            '</div>' +
            '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    var marker = new google.maps.Marker({
        position: myLatLng,
        animation: google.maps.Animation.DROP,
        map: map,
        title: 'PT Tigaraksa Satria, Tbk'
    });
    marker.addListener('click', function () {
        infowindow.open(map, marker);

    });


}

function mobileMenu() {
    var menu = $("header nav"),
            body = $("html")
            ;

    $(".mtoggle").click(function (e) {
        e.preventDefault();
        if ($(window).width() < 768)
            body = $("html");

        //TABLET
        if ($(window).width() > 767 && $(window).width() < 1300) {
            if (!$(this).hasClass('active')) {
                // mouseover
                TweenMax.to(menu, 0.3, {
                    css: {
                        right: 0,
                    },
                    ease: Cubic.easeOut
                });
                TweenMax.to(body, 0.3, {
                    css: {
                        left: -menu.width()
                    },
                    ease: Cubic.easeOut
                });

                $(this).addClass('active');
                $(".mtoggle a").css({
                    background: 'url(images/material/ico_burger_active.png) no-repeat center',
                    backgroundColor: '#79531d'
                });
                $("header nav").show();

            } else {
                // mouseout
                TweenMax.to(menu, 0.3, {
                    css: {
                        right: -menu.width()
                    },
                    ease: Cubic.easeOut
                });
                TweenMax.to(body, 0.3, {
                    css: {
                        left: 0
                    },
                    ease: Cubic.easeOut
                });
                $(this).removeClass('active');
                $(".mtoggle a").css({
                    background: '',
                    backgroundColor: ''
                });
                $("header nav").hide();

            }
            //SMALL DEVICES (320PX)
        } else if ($(window).width() < 768) {
            if (!$(this).hasClass('active')) {
                // mouseover
                TweenMax.to(menu, 0.3, {
                    css: {
                        right: -134
                    },
                    ease: Cubic.easeOut
                });
                TweenMax.to(body, 0.3, {
                    css: {
                        left: -menu.width()
                    },
                    ease: Cubic.easeOut
                });

                $(this).addClass('active');
                $(".mtoggle a").css({
                    background: 'url(images/material/ico_burger_active.png) no-repeat center',
                    backgroundColor: '#79531d'
                });
                $("header nav").show();

            } else {
                // mouseout
                TweenMax.to(menu, 0.3, {
                    css: {
                        right: -menu.width()
                    },
                    ease: Cubic.easeOut
                });
                TweenMax.to(body, 0.3, {
                    css: {
                        left: -134
                    },
                    ease: Cubic.easeOut
                });
                $(this).removeClass('active');
                $(".mtoggle a").css({
                    background: '',
                    backgroundColor: ''
                });
                $("header nav").hide();

            }
        }
    });



    $(window).resize(function () {
        if ($(window).width() > 480 && $(window).width() < 1300) {
            TweenMax.to(menu, 0.3, {
                css: {
                    right: -menu.width()
                },
                ease: Cubic.easeOut
            });
            TweenMax.to(body, 0.3, {
                css: {
                    left: 0
                },
                ease: Cubic.easeOut
            });
            $(this).removeClass('active');
            $(".mtoggle a").css({
                background: '',
                backgroundColor: ''
            });
            $("header nav").hide();
        } else if ($(window).width() < 481) {
            TweenMax.to(menu, 0.3, {
                css: {
                    right: -menu.width()
                },
                ease: Cubic.easeOut
            });
            TweenMax.to(body, 0.3, {
                css: {
                    left: -134
                },
                ease: Cubic.easeOut
            });
            $(this).removeClass('active');
            $(".mtoggle a").css({
                background: '',
                backgroundColor: ''
            });
            $("header nav").hide();
        }

    })

}

function lightBox() {

    $('.lightbox_trigger').click(function (e) {

        e.preventDefault();

        var image_href = $(this).attr("href");

        if ($('#lightbox').length > 0) {
            $('#content img').attr('src', image_href);
            $('#lightbox').fadeIn(300);
            $('#lightbox').attr('current-index', $(this).attr('data-index'));
        } else {
            var lightbox =
                    '<div id="lightbox">' +
                    '<p>Click to close</p>' +
                    '<div id="content">' +
                    '<a href="" class="prev">prev</a>' +
                    '<img src="' + image_href + '" />' +
                    '<a href="" class="next">next</a>' +
                    '</div>' +
                    '</div>';
            $('body').append(lightbox);
        }

    });


    $('#lightbox .close').click('click', function () {
        $('#lightbox').fadeOut(300);
    });

    $("#lightbox .next,#lightbox .prev").on('click', function (e) {
        e.preventDefault();

        var flag = true;
        new_image = $(".lightbox_trigger[data-index=" + $("#lightbox").attr('current-index') + "]"),
                src_image = "";

        if ($(this).hasClass('next')) {
            new_image = new_image.next('.lightbox_trigger');
        } else {
            new_image = new_image.prev('.lightbox_trigger');
        }

        if (!new_image.length)
            flag = false
        else {
            src_image = new_image.attr('href');
            console.log(src_image);
        }

        if (flag) {
            $("#lightbox").addClass('loading');
            $("#lightbox #content img").animate({opacity: 0}, 300, function () {
                $("#lightbox #content img").attr('src', src_image);
            });



            $("#lightbox #content img").load(function () {
                $('#lightbox').attr('current-index', new_image.attr('data-index'));
                $("#lightbox").removeClass('loading');
                $("#lightbox #content img").delay(500).animate({opacity: 1}, 300);
            });

        } else {
            $("#lightbox").fadeOut(300);
        }
    });

}

function onlyNumber() {
    $(".number_input").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                        // Allow: home, end, left, right, down, up
                                (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
}

function tabAccount() {
    $('#parentHorizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion
        width: 'auto', //auto or any width like 600px
        fit: true, // 100% fit in a container
        tabidentify: 'hor_1', // The tab groups identifier
    });
}

function orgTreeView() {
    $(function () {
        $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
        $('.tree li.parent_li > span').on('click', function (e) {
            var children = $(this).parent('li.parent_li').find(' > ul > li');
            if (children.is(":visible")) {
                children.hide('fast');
                $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
            } else {
                children.show('fast');
                $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
            }
            e.stopPropagation();
        });
    });
}

function tableShoppingCart() {
    if ($(window).width() > 767 && $(window).width() < 1300) {
        $(".header_qty").attr("colspan", "2");
        $(".header_harga_satuan").hide();

    } else if ($(window).width() < 768) {
        $(".header_qty").attr("colspan", "2")
        $(".header_qty span").text("QTY")
        $(".header_harga_satuan,.header_total,.shopping_total_harga").hide()
    }


    $(window).resize(function () {
        $(".header_qty").attr("colspan", "2")
        $(".header_qty span").text("QTY")
        $(".header_harga_satuan,.header_total,.shopping_total_harga").hide()
    });
}

function arrowTransaksi() {
    var index_active = 0;

    $(".boxWizardStat div").each(function () {
        if ($(this).hasClass('btn_wizard_active'))
            index_active = $(this).index() + 1;
    });
    index_active = index_active + 1;
    $(".boxWizardStat div:nth-child(" + index_active + ")").addClass('current');
}
function cloneForm() {
    $(".btn_add").on('click', function (e) {
        e.preventDefault();
        var target = $(".group[group_id=" + $(this).attr('target-clone') + "]");


        target.children(".clone_place").append(target.children(".clone_content").clone());
    });
}