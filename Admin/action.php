<?php
include "connect.php";
session_start();

// Order
// // Accept Order

if (isset($_GET['sub_accept_order']) && isset($_GET['SoDonDH'])) {
    $SoDonDH = $_GET['SoDonDH'];

    $sql_accept = "UPDATE `tb_dathang` SET `TrangThai` = 'Hoàn thành' WHERE `tb_dathang`.`SoDonDH` = '$SoDonDH'";
    mysqli_query($conn, $sql_accept);
}

// // Cancel Order

if (isset($_GET['sub_cancel_order']) && isset($_GET['SoDonDH'])) {
    $SoDonDH = $_GET['SoDonDH'];

    $sql_cancel = "UPDATE `tb_dathang` SET `TrangThai` = 'Hủy đơn' WHERE `tb_dathang`.`SoDonDH` = '$SoDonDH'";
    mysqli_query($conn, $sql_cancel);
}

// Personnel
// // Edit Personnel

if (isset($_GET['sub_edit_personnel']) && isset($_GET['MSNV'])) {
    $MSNV = $_GET['MSNV'];
    $name = $_GET['name'];
    $n_phone = $_GET['n_phone'];
    $address = $_GET['address'];
    $position = $_GET['position'];

    $sql_edit = "UPDATE `tb_nhanvien` SET `HoTenNV` = '$name', `ChucVu` = '$position', `DiaChi` = '$address', `SoDienThoai` = '$n_phone' WHERE `tb_nhanvien`.`MSNV` = '$MSNV'";
    mysqli_query($conn, $sql_edit);
}

// // Add Personnel

if (isset($_GET['sub_add_personnel'])) {
    $name = $_GET['name'];
    $n_phone = $_GET['n_phone'];
    $address = $_GET['address'];
    $position = $_GET['position'];
    $username = $_GET['username'];
    $password = $_GET['password'];

    $sql_add = "INSERT INTO `tb_nhanvien` (`HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `Username`, `Password`) VALUES ('$name', '$position', '$address', '$n_phone', '$username', '$password')";
    mysqli_query($conn, $sql_add);
}

// // Delete Personnel
if (isset($_GET['sub_del_personnel']) && isset($_GET['MSNV'])) {
    $MSNV = $_GET['MSNV'];

    $sql_delete = "DELETE FROM `tb_nhanvien` WHERE `tb_nhanvien`.`MSNV` = '$MSNV'";
    mysqli_query($conn, $sql_delete);
}


// Category
// // Edit Category

if (isset($_GET['sub_edit_category']) && isset($_GET['MaNhom'])) {
    $name = $_GET['name'];
    $MaNhom = $_GET['MaNhom'];

    $sql_edit = "UPDATE `tb_nhomhanghoa` SET `TenNhom` = '$name', `NgayCapNhat` = CURRENT_DATE() WHERE `tb_nhomhanghoa`.`MaNhom` = '$MaNhom'";
    mysqli_query($conn, $sql_edit);
}

// // Add Category

if (isset($_GET['sub_add_category'])) {
    $name = $_GET['name'];

    $sql_add = "INSERT INTO `tb_nhomhanghoa` (`TenNhom`, `NgayCapNhat`) VALUES ('$name', CURRENT_DATE())";
    mysqli_query($conn, $sql_add);
}

// // Delete Category
if (isset($_GET['sub_del_category']) && isset($_GET['MaNhom'])) {
    $MaNhom = $_GET['MaNhom'];

    $sql_delete = "DELETE FROM `tb_nhomhanghoa` WHERE `tb_nhomhanghoa`.`MaNhom` = '$MaNhom'";
    mysqli_query($conn, $sql_delete);
}

// Product
// // Edit Product

if (isset($_GET['sub_product_edit']) && isset($_GET['mahh'])) {
    $name = $_GET['name'];
    $mahh = $_GET['mahh'];
    $description = $_GET['description'];
    $manhom = $_GET['manhom'];
    $math = $_GET['math'];
    $amount = $_GET['amount'];
    $image = $_GET['image'];
    $price = $_GET['price'];
    $discount = $_GET['discount'];

    $sql_list_product_edit = "UPDATE `tb_hanghoa` 
        SET 
            `TenHH` = '$name', 
            `Gia` = '$price', 
            `SoLuongHang` = '$amount', 
            `MaNhom` = '$manhom', 
            `MaTH` = '$math', 
            `Hinh` = '$image', 
            `MoTaHH` = '$description', 
            `KhuyenMai` = '$discount', 
            `NgayCN` = CURRENT_DATE() 
        WHERE `tb_hanghoa`.`MSHH` = '$mahh'";
    mysqli_query($conn, $sql_list_product_edit);
}

// // Add Product


if (isset($_GET['sub_add_product'])) {
    $name = $_GET['name'];
    $description = $_GET['description'];
    $category = $_GET['category'];
    $quantity = $_GET['quantity'];
    $file = $_GET['file'];
    $price = $_GET['price'];
    $discount = $_GET['discount'];


    $sql_list_product_add = "INSERT INTO `tb_hanghoa` (`MSHH`, `TenHH`, `Gia`, `SoLuongHang`, `MaNhom`, `Hinh`, `MoTaHH`, `NgayCN`, `KhuyenMai`) 
    VALUES (NULL, '$name', '$price', '$quantity', '$category', '$file', '$description', CURRENT_DATE(), '$discount')";
    mysqli_query($conn, $sql_list_product_add);
}

// // Delete Product
if (isset($_GET['sub_del_product']) && isset($_GET['MSHH'])) {
    $MSHH = $_GET['MSHH'];

    $sql_list_product_delete = "DELETE FROM `tb_hanghoa` WHERE `tb_hanghoa`.`MSHH` = '$MSHH'";
    mysqli_query($conn, $sql_list_product_delete);
}
