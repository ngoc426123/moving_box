$(document).ready(function(){
	$(".boxRegis .linkPopup a").fancybox({
        type:'iframe',
        baseClass:'designPopup',
        toolsbar:false,
        smallBtn:true,
    });
    let offset = 6;
	$(".linkAll a").click(function(){
		$.ajax({
			url:ajax_url.url,
			type:'POST',
			data:{
				action:"service_readmore",
				offset:offset,
			},
			async:true,
			beforeSend:function(){
				$("html").addClass("loading");
			},
			success:function(result){
				$("html").removeClass("loading");
				$("#resService").append(result);
				offset+=6;
			}
		});
		return false;
	});
});