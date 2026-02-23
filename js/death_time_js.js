//am & pm
    $("#defaultCheck1lbl").click(function(){
        $("#defaultCheck1lbl").css("text-decoration", "underline");
        $("#defaultCheck2lbl").css("text-decoration", "none");
        document.getElementById("defaultCheck1").checked = true;
        document.getElementById("defaultCheck2").checked = false;
    });
    $("#defaultCheck2lbl").click(function(){
        $("#defaultCheck1lbl").css("text-decoration", "none");
        $("#defaultCheck2lbl").css("text-decoration", "underline");
        document.getElementById("defaultCheck1").checked = false;
        document.getElementById("defaultCheck2").checked = true;
    });