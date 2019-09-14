$(document).ready(function(){

    $("#users").hide();
    $("#btnUsers").click(function(e){
        e.preventDefault();
   if($("#users").is(':visible')){
            $("#users").hide();
           
        } else {
            $("#users").show();
          
           
        }
    });

    $("#dest").hide();
    $("#btnDest").click(function(e){
        e.preventDefault();
   if($("#dest").is(':visible')){
            $("#dest").hide();
           
        } else {
            $("#dest").show();
          
           
        }
    });

    $("#statistics").hide();
    $("#btnShow").click(function(e){
        e.preventDefault();
   if($("#statistics").is(':visible')){
            $("#statistics").hide();
           
        } else {
            $("#statistics").show();
          
           
        }
    });




});