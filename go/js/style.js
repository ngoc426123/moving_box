$(document).ready(function(){
    // SLIDEPAGE
    $("#slidePage").slick({
        fade:true,
        // autoplay:true,
        arrows:false,
    });
    // MENU TAB
    $(".menuTab .mc-menu").click(function(){
        if(!$(this).parents(".menuTab").hasClass("active")){
            $(this).parents(".menuTab").addClass("active");
        }
        else{
            $(this).parents(".menuTab").removeClass("active");
        }
    });
    // LANGUAGE TOP
    $(".languageTop .icon").click(function(){
        if(!$(this).parents(".languageTop").hasClass("active")){
            $(this).parents(".languageTop").addClass("active");
        }
        else{
            $(this).parents(".languageTop").removeClass("active");
        }
    });
    // LANGUAGE TOP
    $(".memberTop .icon").click(function(){
        if(!$(this).parents(".memberTop").hasClass("active")){
            $(this).parents(".memberTop").addClass("active");
        }
        else{
            $(this).parents(".memberTop").removeClass("active");
        }
    });
    // BIND
    $(window).bind("click",function(e){
        var target=e.target;
        if(!$(target).parents(".languageTop").hasClass("active")){
            $(".languageTop").removeClass("active");
        }
        if(!$(target).parents(".memberTop").hasClass("active")){
            $(".memberTop").removeClass("active");
        }
    });
    // SEARCH TOP
    $(".searchTop .icon").click(function(){
        if(!$(".mainHead").find(".searchTop").hasClass("active")){
            $(".mainHead").find(".searchTop").addClass("active");
            $("html").addClass("openmenu");
        }
        else{
            $(".mainHead").find(".searchTop").removeClass("active");
            $("html").removeClass("openmenu");
        }
    });
    $(".searchTop input").focus(function(){
        $(this).parents("form").addClass("fd-active");
    });
    $(".searchTop input").blur(function(){
        var _ = $(this);
        setTimeout(function(){
            if(_.val() == ""){
                _.parents("form").removeClass("fd-active");
            }
        },100);
    });
    $(".searchTop .closez").click(function(){
        $(this).parents(".searchTop").removeClass("active");
        $("html").removeClass("openmenu");
    });
});