$(document).ready(function(){
	function convert_text_to_haha(object){
        var text_local="";
        var text_span="";
        var text_return="";
        var char="";
        var text_simple=object.text();
        var array_text=text_simple.split(" ");
        for (var i = 0; i < array_text.length ; i++) {
            text_local=array_text[i];
            char="";
            text_span="";
            for (var j = 0; j < text_local.length ; j++) {
                char="<span class='char'>"+text_local[j]+"</span>";
                text_span+=char;
            }
            text_span="<span class='word'>"+text_span+"</span> ";
            text_return+=text_span;
        }
        text_return="<span class='wrap'>"+text_return+"</span>";
        object.empty().html(text_return);
    }
    $("#mv-landingpage .boxMV .t1").each(function(){
        convert_text_to_haha($(this));
    });
    $("#mv-landingpage .boxMV .t1").each(function(){
        var time = 0.1;
        $(this).find(".char").each(function(){
            $(this).css({
                "-webkit-animation-delay": time+"s",
                "-o-animation-delay": time+"s",
                "animation-delay": time+"s",
            });
            time+=0.03;
        });
    });
});