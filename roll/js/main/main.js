$(document).ready(function(){
	$("#slideHome").slick({
        fade:true,
        autoplay:true,
        arrows:false,
        dots:true,
    });
    $("#slideService").slick({
    	slidesToShow:4,
    	autoplay:true,
        dots:true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    $('#feeling_img').slick({
        asNavFor: '#feeling_text',
        draggable: false,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        centerPadding: '0px',
        adaptiveHeight: false,
        focusOnSelect: true,
        speed: 500,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 520,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    $('#feeling_text').slick({
        asNavFor: '#feeling_img',
        draggable: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        swipe: false,
        adaptiveHeight: false,
        focusOnSelect: true,
        arrows: false,
        autoplay: true,
        speed: 500
    });
    $("#slidePartner").slick({
        slidesToShow:5,
        autoplay:true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 520,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });
});