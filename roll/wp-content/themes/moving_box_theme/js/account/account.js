$(document).ready(function(){
	$("a.popupAccount").fancybox({
        type:'iframe',
        baseClass:'designPopup',
        toolsbar:false,
        smallBtn:true,
    });
    $(".menuManager .mc-menu").click(function(){
        if(!$(this).parents(".menuManager").hasClass("active")){
            $(this).parents(".menuManager").addClass("active");
        }
        else{
            $(this).parents(".menuManager").removeClass("active");
        }
    });
});