$(document).ready(function(){
	$(".myCheckbox").click(function(){
        $(this).siblings().removeClass("active");
        $(this).siblings().find("input").prop('checked', false);
        if(!$(this).hasClass("active")){
            $(this).addClass("active");
            $(this).find("input").prop('checked', true);
        }
        else{
            $(this).removeClass("active");
            $(this).find("input").prop('checked', false);
        }
    });
});