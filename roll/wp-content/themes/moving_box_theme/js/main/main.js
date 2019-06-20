$(document).ready(function(){
	$("#slideHome").slick({
        fade:true,
        autoplay:true,
        arrows:false,
        dots:true,
    });
    $("#slideService").slick({
    	slidesToShow:3,
    	autoplay:true,
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
    $("#slidePartner").slick({
        slidesToShow:6,
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