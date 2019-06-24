$(document).ready(function(){
    let offset = 10;
	$(".linkAll a").click(function(){
		$.ajax({
			url:ajax_url.url,
			type:'POST',
			data:{
				action:"partner_readmore",
				offset:offset,
			},
			async:true,
			beforeSend:function(){
				$("html").addClass("loading");
			},
			success:function(result){
				$("html").removeClass("loading");
				$("#resPartner").append(result);
				offset+=10;
			}
		});
		return false;
	});
});