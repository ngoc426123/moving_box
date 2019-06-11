$(document).ready(function(){
	$("#slideThumbnail").slick({
		slideToShow : 3,
		variableWidth: true,
		autoplay:true,
		centerMode: true,
  		centerPadding: '0px',
  		responsive: [
            {
                breakpoint:600,
                settings: {
                    slidesToShow:1,
                    variableWidth: false,
                    centerMode: false,
                }
            }
        ]
	});
	$(".productColor ul li a").click(function(){
		$(this).parent("li").siblings().removeClass("active");
        if(!$(this).parent("li").hasClass("active")){
            $(this).parent("li").addClass("active");
        }
        else{
            $(this).parent("li").removeClass("active");
        }
        return false;
    });
    $("#slideOther").slick({
    	slidesToShow : 3,
    	autoplay:true,
    	responsive: [
            {
                breakpoint:991,
                settings: {
                    slidesToShow:2,
                }
            },
            {
                breakpoint:600,
                settings: {
                    slidesToShow:1,
                }
            }
        ]
    });
    $(".linkAll a").click(function(){
        $.ajax({
            url:'4_xe_moi_nhap_more_1.html',
            type:'post',
            async:true,
            beforeSend:function(){
                $("html").addClass("openmenu2 loading");
            },
            success:function(e){
                setTimeout(function(){
                    $("#mvb-product .row").append(e);
                    $("html").removeClass("openmenu2 loading");
                },2000);
            }
        });
        return false;
    });
});