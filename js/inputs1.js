$(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "#ede9e9");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    });

    $("input#bookno").focus(function(){
        $(this).css("background-color", "#9dfaf2");
    });
    $("input#bookno").blur(function(){
        $(this).css("background-color", "#9dfaf2");
    });
     $("input#pageno").focus(function(){
        $(this).css("background-color", "#9dfaf2");
    });
    $("input#pageno").blur(function(){
        $(this).css("background-color", "#9dfaf2");
    });
     $("input#regno").focus(function(){
        $(this).css("background-color", "#9dfaf2");
    });
    $("input#regno").blur(function(){
        $(this).css("background-color", "#9dfaf2");
    });
});