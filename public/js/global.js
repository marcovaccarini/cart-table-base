/*-------------------------------------------------------------------------------------------------------------------------------*/
/*This is main JS file that contains custom scripts used in this template*/
/*-------------------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------*/
/* TABLE OF CONTENTS: */
/*--------------------------------------------------------*/
/* 01 - VARIABLES */
/* 02 - page calculations */
/* 03 - function on document ready */
/* 04 - function on page load */
/* 05 - function on page resize */
/* 06 - function on page scroll */
/* 07 - swiper sliders */
/* 08 - buttons, clicks, hovers */
/* 09 - submit form via AJAX */
/*-------------------------------------------------------------------------------------------------------------------------------*/

$(function() {

    "use strict";

    /*================*/
    /* 01 - VARIABLES */
    /*================*/
    var swipers = [], winW, winH, winScr, _isresponsive, intPoint = 500, smPoint = 768, mdPoint = 992, lgPoint = 1200, addPoint = 1600, _ismobile = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i), urlToCart, sizeId, error;

    /*========================*/
    /* 02 - page calculations */
    /*========================*/
    function pageCalculations(){
        winW = $(window).width();
        winH = $(window).height();
        if($('.menu-button').is(':visible')) _isresponsive = true;
        else _isresponsive = false;

        $('.fixed-header-margin').css({'padding-top':$('header').outerHeight(true)});
        $('.parallax-slide').css({'height':winH});
    }

    /*=================================*/
    /* 03 - function on document ready */
    /*=================================*/
    pageCalculations();
    if($('.search-drop-down .overflow').length && !_ismobile) {
        $('.search-drop-down').addClass('active');
        $('.search-drop-down .overflow').jScrollPane();
        $('.search-drop-down').removeClass('active');
    }
    if(_ismobile) $('body').addClass('mobile');





    /*============================*/
    /* 04 - function on page load */
    /*============================*/
    $(window).load(function(){
        pageCalculations();
        $('#loader-wrapper').fadeOut();
        $('body').addClass('loaded');
        initSwiper();
    });

    /*==============================*/
    /* 05 - function on page resize */
    /*==============================*/
    function resizeCall(){
        pageCalculations();

        $('.navigation:not(.disable-animation)').addClass('disable-animation');

        $('.swiper-container.initialized[data-slides-per-view="responsive"]').each(function(){
            var thisSwiper = swipers['swiper-'+$(this).attr('id')], $t = $(this), slidesPerViewVar = updateSlidesPerView($t), centerVar = thisSwiper.params.centeredSlides;
            thisSwiper.params.slidesPerView = slidesPerViewVar;
            thisSwiper.resizeFix(true);
            if(!centerVar){
                var paginationSpan = $t.find('.pagination span');
                var paginationSlice = paginationSpan.hide().slice(0,(paginationSpan.length+1-slidesPerViewVar));
                if(paginationSlice.length<=1 || slidesPerViewVar>=$t.find('.swiper-slide').length) $t.addClass('pagination-hidden');
                else $t.removeClass('pagination-hidden');
                paginationSlice.show();
            }
        });
    }
    if(!_ismobile){
        $(window).resize(function(){
            resizeCall();
        });
    } else{
        window.addEventListener("orientationchange", function() {
            resizeCall();
        }, false);
    }

    /*==============================*/
    /* 06 - function on page scroll */
    /*==============================*/
    function scrollCalculations(){
        winScr = $(window).scrollTop();
        var headerComp = ($('header').outerHeight()<=200)?$('header').outerHeight():200;
        if(winScr>=headerComp && !$('.header-demo').length) {
            if(!$('header').hasClass('fixed-header')){
                $('header').addClass('fixed-header');
                if(!_ismobile) closePopups();
            }
        }
        else {
            if($('header').hasClass('fixed-header')){
                $('header').removeClass('fixed-header');
                if(!_ismobile) closePopups();
            }
        }
        $('nav').addClass('disable-animation');
    }

    scrollCalculations();
    $(window).scroll(function(){
        scrollCalculations();
    });

    /*=====================*/
    /* 07 - swiper sliders */
    /*=====================*/
    var initIterator = 0;
    /*function reinitSwiper(swiper) {
        setTimeout(function () {
            alert('reInit');
            swiper.resizeFix(true);

        }, 500);
    }*/



    function initSwiper(){
        //$('.swiper-container:not(.initialized)').each(function(){
        $('.swiper-container').each(function(){
            var $t = $(this);

            var index = 'swiper-unique-id-'+initIterator;

            $t.addClass('swiper-'+index + ' initialized').attr('id', index);
            $t.find('.pagination').addClass('pagination-'+index);

            var autoPlayVar = parseInt($t.attr('data-autoplay'), 10);
            if(_ismobile) autoPlayVar = 0;
            var centerVar = parseInt($t.attr('data-center'), 10);
            var simVar = ($t.closest('.circle-description-slide-box').length)?false:true;

            var slidesPerViewVar = $t.attr('data-slides-per-view');
            if(slidesPerViewVar == 'responsive'){
                slidesPerViewVar = updateSlidesPerView($t);
            }
            else slidesPerViewVar = parseInt(slidesPerViewVar, 10);

            var loopVar = parseInt($t.attr('data-loop'), 10);
            var speedVar = parseInt($t.attr('data-speed'), 10);




//console.log('swiper-'+index);

            swipers['swiper-'+index] = new Swiper('.swiper-'+index,{
                speed: speedVar,
                pagination: '.pagination-'+index,
                loop: loopVar,
                paginationClickable: true,
                autoplay: autoPlayVar,
                slidesPerView: slidesPerViewVar,
                keyboardControl: true,
                calculateHeight: true,
                simulateTouch: simVar,
                centeredSlides: centerVar,
                roundLengths: true,
                slideToClickedSlide: true,





                onSlideChangeEnd: function(swiper){
                    var activeIndex = (loopVar===true)?swiper.activeIndex:swiper.activeLoopIndex;
                    if($t.closest('.navigation-banner-swiper').length || $t.closest('.parallax-slide').length){
                        var qVal = $t.find('.swiper-slide-active').attr('data-val');
                        $t.find('.swiper-slide[data-val="'+qVal+'"]').addClass('active');
                    }
                },
                onSlideChangeStart: function(swiper){
                    var activeIndex = (loopVar===true)?swiper.activeIndex:swiper.activeLoopIndex;
                    if($t.hasClass('product-preview-swiper')){
                        swipers['swiper-'+$t.parent().find('.product-thumbnails-swiper').attr('id')].swipeTo(activeIndex);
                        $t.parent().find('.product-thumbnails-swiper .swiper-slide.selected').removeClass('selected');
                        $t.parent().find('.product-thumbnails-swiper .swiper-slide').eq(activeIndex).addClass('selected');
                    }
                    else $t.find('.swiper-slide.active').removeClass('active');
                },

                onSlideClick: function(swiper){
                    if($t.hasClass('product-preview-swiper')){
                        $t.find('.default-image').attr('src', $t.find('.swiper-slide-active img').attr('src'));
                        $t.find('.zoomed-image').attr('src', $t.find('.swiper-slide-active img').data('zoom'));
                        $t.find('.product-zoom-container').addClass('visible').animate({'opacity':'1'});
                    }
                    else if($t.hasClass('product-thumbnails-swiper')){
                        swipers['swiper-'+$t.parent().parent().find('.product-preview-swiper').attr('id')].swipeTo(swiper.clickedSlideIndex);
                        $t.find('.active').removeClass('active');
                        $(swiper.clickedSlide).addClass('active');
                    }

                }

            });

        //    console.log(swipers['swiper-'+index]);






            if(!centerVar){
                if($t.attr('data-slides-per-view')=='responsive'){
                    var paginationSpan = $t.find('.pagination span');
                    var paginationSlice = paginationSpan.hide().slice(0,(paginationSpan.length+1-slidesPerViewVar));
                    if(paginationSlice.length<=1 || slidesPerViewVar>=$t.find('.swiper-slide').length) $t.addClass('pagination-hidden');
                    else $t.removeClass('pagination-hidden');
                    paginationSlice.show();
                }
            }
            initIterator++;

        });



    }


    function updateSlidesPerView(swiperContainer){
        if(winW>=1920 && swiperContainer.parent().hasClass('full-width-product-slider')) return 6;
        if(winW>=addPoint) return parseInt(swiperContainer.attr('data-add-slides'), 10);
        else if(winW>=lgPoint) return parseInt(swiperContainer.attr('data-lg-slides'), 10);
        else if(winW>=mdPoint) return parseInt(swiperContainer.attr('data-md-slides'), 10);
        else if(winW>=smPoint) return parseInt(swiperContainer.attr('data-sm-slides'), 10);
        else if(winW>=intPoint) return parseInt(swiperContainer.attr('data-int-slides'), 10);
        else return parseInt(swiperContainer.attr('data-xs-slides'), 10);
    }

    //swiper arrows
    $('.swiper-arrow-left').click(function(){
        swipers['swiper-'+$(this).parent().attr('id')].swipePrev();
    });

    $('.swiper-arrow-right').click(function(){
        swipers['swiper-'+$(this).parent().attr('id')].swipeNext();
    });


    /*==============================*/
    /* 08 - buttons, clicks, hovers */
    /*==============================*/

    //desktop menu
    $('nav>ul>li').on('mouseover', function(){
        if(!_isresponsive){
            $(this).find('.submenu').stop().fadeIn(300);
        }
    });

    $('nav>ul>li').on('mouseleave', function(){
        if(!_isresponsive){
            $(this).find('.submenu').stop().fadeOut(300);
        }
    });

    //responsive menu
    $('nav li .fa').on('click', function(){
        if(_isresponsive){
            $(this).next('.submenu').slideToggle();
            $(this).parent().toggleClass('opened');
        }
    });

    $('.submenu-list-title .toggle-list-button').on('click', function(){
        if(_isresponsive){
            $(this).parent().next('.toggle-list-container').slideToggle();
            $(this).parent().toggleClass('opened');
        }
    });

    $('.menu-button').on('click', function(){
        $('.navigation.disable-animation').removeClass('disable-animation');
        $('body').addClass('opened-menu');
        $(this).closest('header').addClass('opened');
        $('.opened .close-header-layer').fadeIn(300);
        closePopups();
        return false;
    });

    $('.close-header-layer, .close-menu').on('click', function(){
        $('.navigation.disable-animation').removeClass('disable-animation');
        $('body').removeClass('opened-menu');
        $('header.opened').removeClass('opened');
        $('.close-header-layer:visible').fadeOut(300);
    });

    //toggle menu block for "everything" template
    $('.toggle-desktop-menu').on('click', function(){
        $('.navigation').toggleClass('active');
        $('nav').removeClass('disable-animation');
        $('.search-drop-down').removeClass('active');
    });

    /*tabs*/
    var tabsFinish = 0;
    $('.tab-switcher').on('click', function(){
        if($(this).hasClass('active') || tabsFinish) return false;
        tabsFinish = 1;
        var thisIndex = $(this).parent().find('.tab-switcher').index(this);
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');

        $(this).closest('.tabs-container').find('.tabs-entry:visible').animate({'opacity':'0'}, 300, function(){
            $(this).hide();
            var showTab = $(this).parent().find('.tabs-entry').eq(thisIndex);
            showTab.show().css({'opacity':'0'});
            if(showTab.find('.swiper-container').length) {
                swipers['swiper-'+showTab.find('.swiper-container').attr('id')].resizeFix();
                if(!showTab.find('.swiper-active-switch').length) showTab.find('.swiper-pagination-switch:first').addClass('swiper-active-switch');
            }
            showTab.animate({'opacity':'1'}, function(){tabsFinish = 0;});
        });

    });

    $('.swiper-tabs .title, .links-drop-down .title').on('click', function(){
        $(this).toggleClass('active');
        $(this).next().slideToggle(300);
    });

    /*sidebar menu*/
    $('.sidebar-navigation .title').on('click', function(){
        if($('.sidebar-navigation .title .fa').is(':visible')) {
            $(this).parent().find('.list').slideToggle(300);
            $(this).parent().toggleClass('active');
        }
    });

    /*search drop down*/
    $('.search-drop-down .title').on('click', function(){
        $(this).parent().toggleClass('active');
    });

    $('.search-drop-down .category-entry').on('click', function(){
        var thisDropDown = $(this).closest('.search-drop-down');
        thisDropDown.removeClass('active');
        thisDropDown.find('.title span').text($(this).text());
    });

    /*search popup*/
    $('.open-search-popup').on('click', function(e){
        if(!$('.search-box.popup').hasClass('active')){
            clearTimeout(closecartTimeout);
            $('.cart-box.active').animate({'opacity':'0'}, 300, function(){$(this).removeClass('active');});
            $('.search-box.popup').addClass('active').css({'right':winW - $(this).offset().left-$(this).outerWidth()*0.5-45, 'top':$(this).offset().top-winScr+0.5*$(this).height()+35, 'opacity':'0'}).stop().animate({'opacity':'1'}, 300, function(){
                $('.search-box.popup input').focus();
            });
        }
        else closePopups();
        if(e.pageY-winScr>winH-100) $('.search-box.popup').addClass('bottom-align');
        else $('.search-box.popup').removeClass('bottom-align');
        return false;
    });

    /*cart popup*/

    
    $('.open-cart-popup').on('mouseover', function(e){
        clearTimeout(closecartTimeout);

        if(!$('.cart-box.popup').hasClass('active')){
            closePopups();

            $(".cart-entry:first-child").removeClass('animated');

            if($(this).offset().left>winW*0.5){
                $('.cart-box.popup').addClass('active cart-right').css({'left':'auto', 'right':winW - $(this).offset().left-$(this).outerWidth()*0.5-47, 'top':$(this).offset().top-winScr+15, 'opacity':'0'}).stop().animate({'opacity':'1'}, 300);
            }
            else{
                $('.cart-box.popup').addClass('active cart-left').css({'right':'auto', 'left':$(this).offset().left, 'top':$(this).offset().top-winScr+15, 'opacity':'0'}).stop().animate({'opacity':'1'}, 300);
            }
        }
        //if($(this).offset().left<100) $('.cart-box.popup').addClass('left-align');
        //else if($(this).hasClass('header-functionality-entry') && $(this).closest('header.type-3').length) $('.cart-box.popup').addClass('fixed-header-left');
        //else $('.cart-box.popup').removeClass('left-align');
    });

    $('.open-cart-popup').on('mouseleave', function(){
        closecartTimeout = setTimeout(function(){closePopups();}, 1000);
    });

    var closecartTimeout = 0;
    $('.cart-box.popup').on('mouseover', function(){
        clearTimeout(closecartTimeout);
    });
    $('.cart-box.popup').on('mouseleave', function(){
        closecartTimeout = setTimeout(function(){closePopups();}, 1000);
    });

    function closePopups(){
        $('.popup.active').animate({'opacity':'0'}, 300, function(){$(this).removeClass('active'); $('.cart-box').removeClass('cart-left cart-right');});

    }

    /*main menu mouseover calculations*/
    // $('nav>ul>li').on('mouseover', function(){
    // 	var subFoo = $(this).find('.submenu');
    // 	if(subFoo.length) closePopups();
    // 	if(subFoo.length){
    // 		subFoo.removeClass('left-align right-align');
    // 		if(subFoo.offset().left<0) subFoo.addClass('left-align');
    // 		else if(subFoo.offset().left+subFoo.outerWidth()>winW) subFoo.addClass('right-align');
    // 	}
    // });

    /*departments dropdown (template "fullwidthheader")*/
    $('.departmets-drop-down .title').on('click', function(){
        $(this).parent().find('.list').slideToggle(300);
        $(this).toggleClass('active');
    });

    $('.departmets-drop-down').on('mouseleave', function(){
        $(this).find('.list').slideUp(300);
        $(this).find('.title').removeClass('active');
    });

    /*simple arrows slider*/
    var finishBannerSlider = 0;
    function leftClick(obj_clone, arrow){
        var obj = arrow.parent().parent().find(obj_clone);
        if (finishBannerSlider) return false;
        finishBannerSlider = 1;
        obj.last().clone(true).insertBefore(obj.first());
        obj.last().remove();
        var item_width = obj.outerWidth(true);
        obj.parent().css('left','-'+item_width+'px');
        obj.parent().animate({'left':'0px'},300, function(){finishBannerSlider=0;});
        return false;
    }

    function rightClick(obj_clone, arrow){
        var obj = arrow.parent().parent().find(obj_clone);
        if (finishBannerSlider) return false;
        finishBannerSlider = 1;
        obj.first().clone(true).insertAfter(obj.last());
        var item_width = obj.outerWidth(true);
        obj.parent().animate({'left':'-'+item_width+'px'},300, function(){
            obj.first().remove();
            obj.parent().css('left','0px');
            finishBannerSlider=0;
        });
        return false;
    }

    $('.menu-slider-arrows .left').on('click', function(){
        leftClick('.menu-slider-entry', $(this));
    });

    $('.menu-slider-arrows .right').on('click', function(){
        rightClick('.menu-slider-entry', $(this));
    });

    //product page - zooming image
    var imageObject = {};
    $('.product-zoom-container').on('mouseover', function(e){
        var $t = $(this);
        imageObject.thisW = $t.width();
        imageObject.thisH = $t.height();
        imageObject.zoomW = $t.find('.zoom-area').outerWidth();
        imageObject.zoomH = $t.find('.zoom-area').outerHeight();
        imageObject.thisOf = $t.offset();
        zoomMousemove($(this), e);
    });

    function zoomMousemove(foo, e){
        var $t = foo,
            x = e.pageX - imageObject.thisOf.left,
            y = e.pageY - imageObject.thisOf.top,
            zoomX = x - imageObject.zoomW*0.5,
            zoomY = y - imageObject.zoomH*0.5;
        if(zoomX<0) zoomX = 0;
        else if(zoomX+imageObject.zoomW>imageObject.thisW) zoomX = imageObject.thisW - imageObject.zoomW;
        if(zoomY<0) zoomY = 0;
        else if(zoomY+imageObject.zoomH>imageObject.thisH) zoomY = imageObject.thisH - imageObject.zoomH;
        $t.find('.move-box').css({'left':x*(-2), 'top':y*(-2)});
        $t.find('.zoom-area').css({'left':zoomX, 'top':zoomY});
    }

    $('.product-zoom-container').on('mousemove', function(e){
        zoomMousemove($(this), e);
    });

    $('.product-zoom-container').on('click', function(){
        $(this).animate({'opacity':'0'}, function(){$(this).removeClass('visible');});
    });

    $('.product-zoom-container').on('mouseleave', function(){
        $(this).click();
    });

    //product page - selecting size, quantity, color
    $('.size-selector .entry').on('click', function(){
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
    });

    $('.color-selector .entry').on('click', function(){
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
    });

    $('.number-plus').on('click', function(){
        var divUpd = $(this).parent().find('.number'), newVal = parseInt(divUpd.text(), 10)+1;
        divUpd.text(newVal);
    });

    $('.number-minus').on('click', function(){
        var divUpd = $(this).parent().find('.number'), newVal = parseInt(divUpd.text(), 10)-1;
        if(newVal>=1) {
            divUpd.text(newVal);
        }
        else
        {
            e.prevent.default;
        }
    });

    //accordeon
    $('.accordeon-title').on('click', function(){
        $(this).toggleClass('active');
        $(this).next().slideToggle();
    });

    //open image popup
    $('.open-image').on('click', function(){
        showPopup($('#image-popup'));
        return false;
    });

    //open product popup

        var $modal = $('#product-popup');

        $('.open-product').on('click', function(){
            swipers['swiper-swiper-unique-id-3'].removeAllSlides();
            swipers['swiper-swiper-unique-id-4'].removeAllSlides();


            showPopup($('#product-popup').animate({'opacity':'100'}));




           // e.preventDefault();

            var uid = $(this).attr('data-id');
            var data = [];

            //$('#dynamic-content').hide();

            $.ajax({
                url: 'json/product/'+uid,
                type: 'GET',
                data: '',
                dataType: 'json'
            })

                .done(function(data){
                    console.log(data);

                  //  $('#dynamic-content').hide();
                    var imgHTML = "";

                    $.each(data, function(idx, obj) {
                        //alert(obj.description);

                        //  alert(data);
                        $('#product_name').html(obj.product_name);
                        $('#specification').html('Product code: '+obj.specification);
                        $('#description').html(obj.description);
                        if (obj.custom_discount) {
                           var current = obj.price - (obj.price/100)*obj.custom_discount
                            $('#price').html('<div class=\"prev\">$'+obj.price+'</div><span class=\"sale-price\"> -'+Math.round(obj.custom_discount)+'%</span><div class=\"current\">$'+current.toFixed(2)+'</div>');
                        }
                        else {
                            $('#price').html('<div class=\"current\">'+obj.price+'</div>')
                        }
                        $('#sizes').html('<div class=\"detail-info-entry-title\">Size</div>');
                        $.each(obj.sizes, function(idx, size) {

                            $('#sizes').append('<div class=\"entry\" data-sizeid="'+size.id+'">'+size.name+'</div>');

                        });
                        $('#tags').html('<div class=\"detail-info-entry-title\">Tags:</div> ');
                        $.each(obj.tags, function(id1, tag) {

                            $('#tags').append('<a href=\"special/'+tag.slug+'\">'+tag.title+'</a> / ');
                        });
                        $('#qty').html(1);
                        $('#product_id').val(obj.id);





                        $('#main-swiper').html();

                        $.each(obj.images, function(id, image) {
                            $('#main-swiper').append('<div class=\"swiper-slide\"><div class=\"product-zoom-image\"><img src=\"/img/main/'+image.filename+'\" alt=\"\" data-zoom=\"/img/zoom/zoom-'+image.filename+'\" /></div></div>');
                        });

                        $.each(obj.images, function(id, thumbnail) {
                            $('#thumbnail-swiper').append('<div class=\"swiper-slide swiper-slide-visible\"><div class=\"paddings-container\"><img src=\"/img/main/'+thumbnail.filename+'\"  alt=\"\" /></div></div>');
                        });





                    });


                    initSwiper()
                    swipers['swiper-swiper-unique-id-3'].resizeFix(true);
                    swipers['swiper-swiper-unique-id-4'].resizeFix(true);

                    //product page - selecting size, quantity, color
                    $('.size-selector .entry').on('click', function(){
                        $(this).parent().find('.active').removeClass('active');
                        $(this).addClass('active');
                        $('#size-error').hide();
                    });





                })
                .fail(function(){
                    alert('Json Request Failed...');
                });


            return false;




    });




    //open subscribe popup
    $('.open-subscribe').on('click', function(){
        showPopup($('#subscribe-popup'));
        $('#subscribe-popup .styled-form .field-wrapper input').focus();
        return false;
    });

    $('.close-popup, .overlay-popup .close-layer').on('click', function(){
        $('.overlay-popup.visible').removeClass('active');
        setTimeout(function(){$('.overlay-popup.visible').removeClass('visible');}, 500);
    });

    function showPopup(id){
        id.addClass('visible active');
    }

    //shop - sort arrow
    $('.sort-button').click(function(){
        $(this).toggleClass('active');
    });

    //shop - view button
    $('.view-button.grid').click(function(){
        if($(this).hasClass('active')) return false;
        $('.shop-grid').fadeOut(function(){
            $('.shop-grid').removeClass('list-view').addClass('grid-view');
            $(this).fadeIn();
        });
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
    });

    $('.view-button.list').click(function(){
        if($(this).hasClass('active')) return false;
        $('.shop-grid').fadeOut(function(){
            $('.shop-grid').removeClass('grid-view').addClass('list-view');
            $(this).fadeIn();
        });
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
    });

    //close message
    $('.message-close').on('click', function(){
        $(this).parent().hide();
    });

    //portfolio
    $('.portfolio-entry').on('mouseover', function(){
        $(this).addClass('active');
    });

    $('.portfolio-entry').on('mouseleave', function(){
        $(this).removeClass('active');
    });

    //simple search form focus
    $('.simple-search-form input').on('focus', function(){
        $(this).closest('.simple-search-form').addClass('active');
    });

    $('.simple-search-form input').on('blur', function(){
        $(this).closest('.simple-search-form').removeClass('active');
    });


    /*===========================*/
    /* 09 - submit form via AJAX */
    /*===========================*/

    //  TODO: delete a cart item

    //product page - selecting size, quantity, color
    $('.size-selector .entry').on('click', function(){
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
        $('#size-error').hide();
    });

   urlToCart = "cart";
var product_pics, size_name, html_price, cart_qty, total;
    $("#btn-add-to-cart").click(function (e) {



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();

        sizeId = $('#sizes').parent().find('.active').attr("data-sizeid");

        if (isNaN(sizeId)) {
            $('#size-error').show();
            return false;
        }



        var formData = {

            sizeId,
            product_id: $('#product_id').val(),
            qty: parseInt($('#qty').text()),

        }

        console.log(formData);


        $.ajax({
            url: '/cart',
            type: 'POST',
            data: formData,
            dataType: 'json',

        })

            .done(function(data){
                console.log(data);
                //$('.cart-entry').remove();
cart_qty = 0;
                total = 0;
                $("#cart-item-container").html("");
                $.each(data, function(idc, obj) {
                    var total_item = parseFloat((obj.product['price'] - (obj.product['price']/100)*obj.product['custom_discount'])*obj.qty).toFixed(2);
                    if (obj.product['custom_discount']) {
                        html_price = '<div class=\"prev\">$'+obj.product['price']*obj.qty +'</div> <div class=\"current\">$'+ total_item +'</div>';
                    }
                    else {
                        html_price = '<div class=\"current\">$'+ total_item +'</div>';
                    }

                    $('#cart-item-container').append('<div class=\"cart-entry\" data-custom_discount=\"'+obj.product['custom_discount']+'\" data-price=\"'+obj.price+'\" data-id=\"'+obj.id+'\" data-total_item=\"'+total_item+'\">' +
                        '<a class=\"image\" href=\"'+obj.product.path+'\"><img src=\"/img/small/'+obj.product_images['filename']+'\" alt=\"\" /></a>' +
                        '<div class=\"content\">' +
                        '<a class=\"title\" href=\"'+obj.product.path+'\">'+ obj.product['product_name'] +'</a>' +
                        '<div class=\"quantity\">Quantity: '+ obj.qty + ' | Size: '+obj.sizenames['name']+'</div>' +
                        '<div class=\"price\">'+ html_price +'</div>' +
                        '</div><div class=\"button-x\"><i class=\"fa fa-trash\"></i></div></div>');




                        total += (obj.product['price'] - (obj.product['price']/100)*obj.product['custom_discount'])*obj.qty;
                    console.log(total);
                        cart_qty += obj.qty;

                    });
                $('#cart_total').html('');

                $('#cart_total').append('<div class=\"grandtotal\">Total <span>$'+ parseFloat(total).toFixed(2)+'</span></div>');
                $('#cart_qty').html('('+cart_qty+')');

                //  close the modal and open cart
                $('#product-popup.active').animate({'opacity':'0'}, 300, function(){
                    $(this).removeClass('active');
                    $('#product-popup').removeClass('visible');

                });

                // open cart popup
                clearTimeout(closecartTimeout);

                if(!$('.cart-box.popup').hasClass('active')){
                    e.preventDefault();
                    closePopups();

                    if($('.open-cart-popup').offset().left>winW*0.5){
                        $('.cart-box.popup').addClass('active cart-right').css({'left':'auto', 'right':winW - $('.open-cart-popup').offset().left-$('.open-cart-popup').outerWidth()*0.5-47, 'top':$('.open-cart-popup').offset().top-winScr+15, 'opacity':'0'}).stop().animate({'opacity':'1'}, 500);

                    }
                    else{
                        $('.cart-box.popup').addClass('active cart-left').css({'right':'auto', 'left':$('.open-cart-popup').offset().left, 'top':$('.open-cart-popup').offset().top-winScr+15, 'opacity':'0'}).stop().animate({'opacity':'1'}, 500);

                    }
                    closecartTimeout = setTimeout(function(){closePopups();}, 4000);

                }




                $(".cart-entry:first-child").addClass('animated bounceIn');

            })

            .fail(function(jqXHR){
                console.log('Text: ' + jqXHR.responseText);
              //  alert('Json Request Failed...');
                //  TODO: make better error response
            });

    });


    var Id, increment, decrement, total_item, entry_to_edit, total_cart_qty;

    $(".number-plus, .number-minus").click(function (e) {
        var id = $(this).parent('div').attr('id'); // $(this) refers to button that was clicked
        var className = $(this).attr('class');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();

        if(className.indexOf('plus') !== -1){
            increment = 1;
            var formData = {
                id,
                increment,
            }
        }
        if(className.indexOf('minus') !== -1){
            decrement = 1;
            var formData = {
                id,
                decrement,
            }
        }

        $.ajax({
            url: '/cart/'+id+'/edit/',
            type: 'GET',
            data: formData,
            dataType: 'json',
            complete: function(xhr, textStatus) {

                if(xhr.status == 200){

                    var total_cart_qty = parseInt($('#cart_qty').text().replace(/\D/g,''), 10);
                    var current = parseFloat($( '#'+id ).parent('div').find('.current').text().replace('$',''));
                    var current_price = parseFloat($( '#'+id ).attr('data-current_price'));
                    var total_cart = parseFloat($('.main').text().replace('$','').replace(',',''));

                    if(className.indexOf('plus') !== -1){
                        ++total_cart_qty;
                        current = (current + current_price).toFixed(2);
                        total_cart = (total_cart + current_price).toFixed(2);
                    }
                    if(className.indexOf('minus') !== -1){
                        --total_cart_qty;
                        current = (current - current_price).toFixed(2);
                        total_cart = (total_cart - current_price).toFixed(2);
                    }

                    $('#cart_qty').html('('+ total_cart_qty +')');

                    var entry_qty = parseInt($( '#'+id ).parent().find('.number').text(), 10);

                    $( '#entry-'+id ).first('div').find('span').html(entry_qty);

                    var sale_price = parseFloat($( '#'+id ).parent('div').find('.prev').text().replace('$',''));
                    sale_price = (sale_price + parseFloat($( '#'+id ).attr('data-sale_price'))).toFixed(2);

                    $( '#'+id ).parent('div').find('.prev').html('$' + sale_price);
                    $( '#entry-'+id ).first('div').find('.prev').html('$' + sale_price);

                    $( '#'+id ).parent('div').find('.current').html('$' + current);
                    $( '#entry-'+id ).first('div').find('.current').html('$' + current);

                    total_cart = total_cart.toLocaleString('en-US', {minimumFractionDigits: 2});

                    $('.main').html('$'+ total_cart);

                    $('.grandtotal').first().find('span').html('$'+ total_cart);

                }
            }

        });

    });


});