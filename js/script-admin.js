$(document).ready(function(){

    $("#category").click(function (e) { 
        $("#content").load("category.php");
    });

    $(".icon-close").click(function () { 
        $("#form").hide(750);     
        $(".form-layout").hide();        
    });       

    $(".edit-category").click(function (e) { 
        $("#form").show(750);        
        $(".form-layout").show();        
    });

    $("#add-category").click(function (e) { 
        $("#form").show(750);        
        $(".form-layout").show();        
    });

});