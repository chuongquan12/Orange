$(document).ready(function(){
 
    // Cart 

    $(".card-product-body").hover(function () {
        $(this).toggleClass('active')
    });

    // Chỉnh số lượng
    var input_amount = $('#input_amount').val();
    $('#icon_minus').click(function(e){
        if(input_amount == 1) 
                input_amount = 1; 
            else 
                input_amount--;
        $('#input_amount').val(input_amount);
        e.preventDefault();
    })

    $('#icon_plus').click(function(e){
        input_amount++;
        $('#input_amount').val(input_amount);
        e.preventDefault();
    })

    // Message

    $(".message-overlay").click(function () { 
        $(".message").hide(500);
        $(".message-overlay").hide(500);
    });

    // Login Register
    // Login
    $(".btn-login").click(function (e) { 
        $(".login-detail").show(750);
        $(".log-overlay").show();
        $(".register-detail").hide(750);
        $(".res-overlay").hide();
        e.preventDefault();
    });

    $(".log-res__icon-close").click(function () { 
        $(".login-detail").hide(750);
        $(".log-overlay").hide();

    });

    $(".log-overlay").click(function () { 
        $(".login-detail").hide(750);
        $(".log-overlay").hide();
    });
    // Register
    $(".btn-register").click(function (e) { 
        $(".register-detail").show(750);
        $(".res-overlay").show();
        $(".login-detail").hide(750);
        $(".log-overlay").hide();
        e.preventDefault();
    });

    $(".log-res__icon-close").click(function () { 
        $(".register-detail").hide(750);
        $(".res-overlay").hide();

    });

    $(".res-overlay").click(function () { 
        $(".register-detail").hide(750);
        $(".res-overlay").hide();
    });

    // Product Detail

    $(".card-product__img").click(function (e) { 
        $(".product-detail").show(500);
        $(".product-overlay").show();
        e.preventDefault();
    });

    $(".card-product-body__content--title").click(function (e) { 
        $(".product-detail").show(500);
        $(".product-overlay").show();
        e.preventDefault();
    });

    $(".card-product-body--buy__cart").click(function (e) { 
        $(".product-detail").show(500);
        $(".product-overlay").show();
        e.preventDefault();
    }); 

    $(".product-detail__icon-close").click(function () { 
        $(".product-detail").hide(500);
        $(".product-overlay").hide();

    });

    $(".product-overlay").click(function () { 
        $(".product-detail").hide(500);
        $(".product-overlay").hide();
    });

    // Filter

    $(".filter-label-sort").click(function () {
        $('.filter-label-sort').removeClass('active');
        $(this).toggleClass('active')
    });

    $(".filter-label-price").click(function () {
        $('.filter-label-price').removeClass('active');
        $(this).toggleClass('active')
    });

     // Order Detail

     $(".order-icon-detail").click(function (e) { 
        $(".order-detail").show(500);
        $(".order-overlay").show();
        e.preventDefault();
    });

    $(".order-detail__icon-close").click(function () { 
        $(".order-detail").hide(500);
        $(".order-overlay").hide();
    });

    $(".order-overlay").click(function () { 
        $(".order-detail").hide(500);
        $(".order-overlay").hide();
    });


});