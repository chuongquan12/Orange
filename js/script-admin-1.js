$(document).ready(function(){
    // admin --index
    $("#tb-list").load("list-order.php");
    $("#list-order").addClass("-active");


    // // -----DANH SÁCH ĐƠN HÀNG----- 

    // Click vào danh sách đơn hàng
    $("#list-order").click(function(){
        $("#tb-list").load("list-order.php");


        $("#list-order").addClass("-active");
        $("#list-personnel").removeClass("-active");
        $("#list-product-type-1").removeClass("-active");
        $("#list-product-type-2").removeClass("-active");
        $("#list-trademark").removeClass("-active");
        $("#list-product").removeClass("-active");

    });


    // // -----DANH SÁCH NHÂN VIÊN----- 

    // // Click vào danh sách nhân viên
    $("#list-personnel").click(function(){
        $("#tb-list").load("list-personnel.php");


        $("#list-personnel").addClass("-active");
        $("#list-order").removeClass("-active");
        $("#list-product-type-1").removeClass("-active");
        $("#list-product-type-2").removeClass("-active");
        $("#list-trademark").removeClass("-active");
        $("#list-product").removeClass("-active");

    });

    $("#sub-personnel-edit").click(function() {
        $("#tb-list").load("list-personnel.php");
    });

    // // -----DANH SÁCH VẬT NUÔI----- 

    // // Click vào danh sách vật nuôi 
    $("#list-product-type-1").click(function(){
        $("#tb-list").load("list-product-type-1.php");


        $("#list-product-type-1").addClass("-active");
        $("#list-order").removeClass("-active");
        $("#list-personnel").removeClass("-active");
        $("#list-product-type-2").removeClass("-active");
        $("#list-trademark").removeClass("-active");
        $("#list-product").removeClass("-active");
    
    });

    // // -----DANH SÁCH LOẠI SẢN PHẨM----- 

    // // Click vào danh sách loại sản phẩm 
    $("#list-product-type-2").click(function(){
        
        $("#tb-list").load("list-product-type-2.php");


        $("#list-product-type-2").addClass("-active");
        $("#list-order").removeClass("-active");
        $("#list-personnel").removeClass("-active");
        $("#list-product-type-1").removeClass("-active");
        $("#list-trademark").removeClass("-active");
        $("#list-product").removeClass("-active");

    });

    // // -----DANH SÁCH THƯƠNG HIỆU----- 

    // // Click vào danh sách thương hiệu 

    $("#list-trademark").click(function(){
        $("#tb-list").load("list-trademark.php");

        $("#list-trademark").addClass("-active");
        $("#list-product").removeClass("-active");
        $("#list-order").removeClass("-active");
        $("#list-personnel").removeClass("-active");
        $("#list-product-type-1").removeClass("-active");
        $("#list-product-type-2").removeClass("-active");

    });
   
    // // -----DANH SÁCH SẢN PHẨM----- 

    // // Click vào danh sách sản phẩm
    $("#list-product").click(function(){
        
        $("#tb-list").load("list-product.php");

        
        $("#list-product").addClass("-active");
        $("#list-order").removeClass("-active");
        $("#list-personnel").removeClass("-active");
        $("#list-product-type-1").removeClass("-active");
        $("#list-product-type-2").removeClass("-active");
        $("#list-trademark").removeClass("-active");

    });

 
  });