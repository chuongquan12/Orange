$(document).ready(function(){

   

    $(".icon-close").click(function () { 
        $("#form").hide(750);     
        $(".form-layout").hide();        
    });

    // Order

    $(".icon-order").click(function () {
        $('.icon-order').removeClass('active');
        $(this).toggleClass('active')
    });


     $("#order").click(function (e) { 
        $("#content").load("order.php");
    });

    $(".order-detail__icon-close").click(function (e) { 
        $(".order-detail").hide(750);        
        $(".order-overlay").hide();        
    });

    $(".order-overlay").click(function (e) { 
        $(".order-detail").hide(750);        
        $(".order-overlay").hide();        
    });

    // $(".edit-product").click(function (e) { 
    //     $("#form").show(750);        
    //     $(".form-layout").show();        
    // });

    // $("#add-product").click(function (e) { 
    //     $("#form").show(750);        
    //     $(".form-layout").show();        
    // });

    // Category
    
    $("#category").click(function (e) { 
        $("#content").load("category.php");
    });

    $(".edit-category").click(function (e) { 
        $("#form").show(750);        
        $(".form-layout").show();        
    });

    $("#add-category").click(function (e) { 
        $("#form").show(750);        
        $(".form-layout").show();        
    });

    // Personnel

    $("#personnel").click(function (e) { 
        $("#content").load("personnel.php");
    });

    $(".edit-personnel").click(function (e) { 
        $("#form").show(750);        
        $(".form-layout").show();        
    });

    $("#add-personnel").click(function (e) { 
        $("#form").show(750);        
        $(".form-layout").show();        
    });

     // Product

     $("#product").click(function (e) { 
        $("#content").load("product.php");
    });

    $(".edit-product").click(function (e) { 
        $("#form").show(750);        
        $(".form-layout").show();        
    });

    $("#add-product").click(function (e) { 
        $("#form").show(750);        
        $(".form-layout").show();        
    });

});