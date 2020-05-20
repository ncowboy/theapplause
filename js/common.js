$(function () {

    //SVG Fallback
    if (!Modernizr.svg) {
        $("img[src*='svg']").attr("src", function () {
            return $(this).attr("src").replace(".svg", ".png");
        });
    }
    ;

    //Chrome Smooth Scroll
    try {
        $.browserSelector();
        if ($("html").hasClass("chrome")) {
            $.smoothScroll();
        }
    } catch (err) {

    }
    ;

    $("img, a").on("dragstart", function (event) {
        event.preventDefault();
    });

});

$(window).load(function () {

    $(".loader_inner").fadeOut();
    $(".loader").delay(400).fadeOut("slow");

});

$(".one_acc .main_acc").click(function () {

    $(this).parents('.one_acc').toggleClass('active');
});
$(".search_menu .val").click(function () {

    $(this).parents('.search_menu').toggleClass('active');
});
$(".search_menu ul li").click(function () {
    var text = $(this).text();
    var val = $(this).attr('data-val');

    $(this).parents(".search_menu").find('.val').val(text);
    $(this).parents(".search_menu").find('.set_val').val(val);
    $('.search_menu').removeClass('active');
});
$(".menu i").click(function () {
    $(".mobile_menu #nav-icon1").trigger("click");

});
$(".mobile_menu_hide li a").click(function () {
    console.log('ok');
    if ($(this).parents('li ul').hasClass('sub-menu')) {
        event.preventDefault();
        $(this).parents("li").toggleClass('more_menu');
    }

});

$(document).ready(function () {
    $("input[type=tel]").mask("+7(999)999-99-99");
    $('.mobile_menu #nav-icon1').click(function () {
        $(this).toggleClass('open');
        $("body").toggleClass('shadow');
        $(".mobile_menu_hide").toggleClass('active');
    });


});


$('.slider_l').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 550,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: false,
                dots: true
            }
        }
    ]
});


$(document).ready(function () {
    var menu = $('#original_menu').html();
    $('#mob_menu').html(menu);
});
$(document).on('click', 'a[href=""],a[href="#"]', function () {
    return false;
});
$(document).on('click', '.mob_butthon_search', function () {
    $('.mobile_form_search').toggleClass('show');
    $(this).toggleClass('show');
})
$(document).on('click', ' .social', function () {
    $(this).toggleClass('active');
})
jQuery(function ($) {
    $(document).mouseup(function (e) { // событие клика по веб-документу
        var div = $(".social.active"); // тут указываем ID элемента
        if (!div.is(e.target) // если клик был не по нашему блоку
            && div.has(e.target).length === 0) { // и не по его дочерним элементам
            div.removeClass('active');
        }
    });
});


$(function () {
    var w_h = $(window).height();
    var doc_h = $(document).height();
    var footer_h = $('footer').height();
    doc_h = doc_h - footer_h;
    $(window).scroll(function () {
        var to_up = parseInt($('#to_up').offset().top);


        if ($(this).scrollTop() > w_h) {
            $('#to_up').addClass('show');

            if ((doc_h + 150) < to_up) {
                $('#to_up').css('bottom', footer_h + 20 + 'px');
            } else {
                $('#to_up').css('bottom', '5%');
            }

        } else {
            $('#to_up').removeClass('show');
        }

    });
    $('#to_up').click(function () {
        $('body,html').animate({scrollTop: 0}, 800);
    });

});

$('ol[start]').each(function() {

    var val = parseFloat($(this).attr("start")) - 1;

    $(this).css('counter-increment','step-counter '+ val);

});

$('ol[start]').each(function() {

    var val = parseFloat($(this).attr("start")) - 1;

    $(this).css('counter-increment','counter '+ val);

});