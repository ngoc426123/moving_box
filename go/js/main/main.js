$(document).ready(function(){
	$("#slideHome").slick({
        fade:true,
        autoplay:true,
        arrows:false,
        dots:true,
    });
    $("#slideService").on("init",function(){
        total = $(this).find(".slick-dots li").size();
        $(this).append("<div class='slick-counter'><span>01</span>"+_num(total)+"</div>");
    });
    $("#slideService").slick({
    	slidesToShow:2,
    	autoplay:true,
        dots:true,
        responsive: [
            {
                breakpoint:640,
                settings: {
                    slidesToShow:1,
                }
            }
        ]
    });
    function _num(num){
        num=num.toString();
        return (num.length==1)?"0"+num:num;
    }
    $("#slideOpinion").slick({
        fade:true,
        autoplay:true,
        arrows:false,
        dots:true,
    });
    $("#slideProduct").on("init",function(){
        total = $(this).find(".slick-dots li").size();
        $(this).append("<div class='slick-counter'><span>01</span>"+_num(total)+"</div>");
    });
    $("#slideProduct").slick({
        slidesToShow:2,
        autoplay:true,
        dots:true,
        responsive: [
            {
                breakpoint:640,
                settings: {
                    slidesToShow:1,
                }
            }
        ]
    });
    $("#slidePartner").slick({
        slidesToShow:4,
        autoplay:true,
        responsive: [
            {
                breakpoint:991,
                settings: {
                    slidesToShow:3,
                }
            },
            {
                breakpoint:640,
                settings: {
                    slidesToShow:2,
                }
            }
        ]
    });
});