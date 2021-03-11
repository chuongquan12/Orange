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

});