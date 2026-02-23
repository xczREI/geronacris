//his & her
    $("#gender1lbl").click(function(){
        $("#gender1lbl").css("text-decoration", "underline");
        $("#gender2lbl").css("text-decoration", "none");
        document.getElementById("gender1").checked = true;
        document.getElementById("gender2").checked = false;
    });
    $("#gender2lbl").click(function(){
        $("#gender1lbl").css("text-decoration", "none");
        $("#gender2lbl").css("text-decoration", "underline");
        document.getElementById("gender1").checked = false;
        document.getElementById("gender2").checked = true;
    });