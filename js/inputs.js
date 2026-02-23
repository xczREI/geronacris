$(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "#ede9e9");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    });

    $("input#txt").focus(function(){
        $(this).css("background-color", "#9dfaf2");
    });
    $("input#txt").blur(function(){
        $(this).css("background-color", "#9dfaf2");
    });
});