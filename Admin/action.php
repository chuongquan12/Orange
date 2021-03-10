<?php
include "connect.php";

// Edit Personnel

if (isset($_GET['sub_personnel_edit']) && isset($_GET['msnv'])) {
    $msnv = $_GET['msnv'];
    $name = $_GET['name'];
    $n_phone = $_GET['n_phone'];
    $address = $_GET['address'];
    $position = $_GET['position'];

    $sql_list_personnel_edit = "UPDATE `tb_nhanvien` SET `HoTenNV` = '$name', `ChucVu` = '$position', `DiaChi` = '$address', `SoDienThoai` = '$n_phone' WHERE `tb_nhanvien`.`MSNV` = '$msnv'";
    mysqli_query($conn, $sql_list_personnel_edit);
}

// Add Personnel

if (isset($_GET['sub_personnel_add'])) {
    $name = $_GET['name'];
    $n_phone = $_GET['n_phone'];
    $address = $_GET['address'];
    $position = $_GET['position'];
    $username = $_GET['username'];
    $password = $_GET['password'];

    $sql_list_personnel_add = "INSERT INTO `tb_nhanvien` (`HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `Username`, `Password`) VALUES ('$name', '$position', '$address', '$n_phone', '$username', '$password')";
    mysqli_query($conn, $sql_list_personnel_add);
}

// Delete Personnel
if (isset($_GET['sub_personnel_delete']) && isset($_GET['msnv'])) {
    $msnv = $_GET['msnv'];

    $sql_list_personnel_delete = "DELETE FROM `tb_nhanvien` WHERE `tb_nhanvien`.`MSNV` = '$msnv'";
    mysqli_query($conn, $sql_list_personnel_delete);
}

// Edit Product Type_1

if (isset($_GET['sub_product_type_1_edit']) && isset($_GET['MaTC'])) {
    $name = $_GET['name'];
    $MaTC = $_GET['MaTC'];

    $sql_list_product_type_1_edit = "UPDATE `tb_thucung` SET `TenThuCung` = '$name', `NgayCapNhat` = CURRENT_DATE() WHERE `tb_thucung`.`MaTC` = '$MaTC'";
    mysqli_query($conn, $sql_list_product_type_1_edit);
}

// Add Product Type_1

if (isset($_GET['sub_product_type_1_add'])) {
    $name = $_GET['name'];

    $sql_list_product_type_1_add = "INSERT INTO `tb_thucung` (`TenThuCung`, `NgayCapNhat`) VALUES ('$name', CURRENT_DATE())";
    mysqli_query($conn, $sql_list_product_type_1_add);
}

// Delete Product Type_1
if (isset($_GET['sub_product_type_1_delete']) && isset($_GET['MaTC'])) {
    $MaTC = $_GET['MaTC'];

    $sql_list_product_type_1_delete = "DELETE FROM `tb_thucung` WHERE `tb_thucung`.`MaTC` = '$MaTC'";
    mysqli_query($conn, $sql_list_product_type_1_delete);
}

// Edit Product Type_2

if (isset($_GET['sub_product_type_2_edit']) && isset($_GET['matc']) && isset($_GET['MaNhom'])) {
    $name = $_GET['name'];
    $MaTC = $_GET['matc'];
    $MaNhom = $_GET['MaNhom'];

    $sql_list_product_type_2_edit = "UPDATE `tb_nhomhanghoa` SET `TenNhom` = '$name', `MaTC` = '$MaTC', `NgayCapNhat` = CURRENT_DATE() WHERE `tb_nhomhanghoa`.`MaNhom` = '$MaNhom'";
    mysqli_query($conn, $sql_list_product_type_2_edit);
}

// Add Product Type_2

if (isset($_GET['sub_product_type_2_add']) && isset($_GET['matc'])) {
    $name = $_GET['name'];
    $MaTC = $_GET['matc'];

    $sql_list_product_type_2_add = "INSERT INTO `tb_nhomhanghoa` (`TenNhom`, `MaTC`, `NgayCapNhat`) VALUES ('$name', '$MaTC', CURRENT_DATE())";
    mysqli_query($conn, $sql_list_product_type_2_add);
}

// Delete Product Type_2
if (isset($_GET['sub_product_type_2_delete']) && isset($_GET['MaNhom'])) {
    $MaNhom = $_GET['MaNhom'];

    $sql_list_product_type_2_delete = "DELETE FROM `tb_nhomhanghoa` WHERE `tb_nhomhanghoa`.`MaNhom` = '$MaNhom'";
    mysqli_query($conn, $sql_list_product_type_2_delete);
}

// Edit Trademark

if (isset($_GET['sub_trademark_edit']) && isset($_GET['math'])) {
    $name = $_GET['name'];
    $MaTH = $_GET['math'];

    $sql_list_trademark_edit = "UPDATE `tb_thuoghieu` SET `TenThuongHieu` = '$name', `NgayCapNhat` = CURRENT_DATE() WHERE `tb_thuonghieu`.`MaTH` = '$MaTH'";
    mysqli_query($conn, $sql_list_trademark_edit);
}

// Add Trademark

if (isset($_GET['sub_trademark_add'])) {
    $name = $_GET['name'];

    $sql_list_trademark_add = "INSERT INTO `tb_thuonghieu` (`MaTH`, `TenThuongHieu`, `NgayCapNhat`) VALUES (NULL, '$name', CURRENT_DATE())";
    mysqli_query($conn, $sql_list_trademark_add);
}

// Delete Trademark
if (isset($_GET['sub_trademark_delete']) && isset($_GET['math'])) {
    $MaTH = $_GET['math'];

    $sql_list_trademark_delete = "DELETE FROM `tb_thuonghieu` WHERE `tb_thuonghieu`.`MaTH` = '$MaTH'";
    mysqli_query($conn, $sql_list_trademark_delete);
}

// Edit Product

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

// Add Product

if (isset($_GET['sub_product_add'])) {
    $name = $_GET['name'];
    $description = $_GET['description'];
    $manhom = $_GET['manhom'];
    $math = $_GET['math'];
    $amount = $_GET['amount'];
    $image = $_GET['image'];
    $price = $_GET['price'];
    $discount = $_GET['discount'];


    $sql_list_product_add = "INSERT INTO `tb_hanghoa` (`MSHH`, `TenHH`, `Gia`, `SoLuongHang`, `MaNhom`, `MaTH`, `Hinh`, `MoTaHH`, `NgayCN`, `KhuyenMai`) 
    VALUES (NULL, '$name', '$price', '$amount', '$manhom', '$math', '$image', '$description', CURRENT_DATE(), '$discount')";
    mysqli_query($conn, $sql_list_product_add);
}

// Delete Product
if (isset($_GET['sub_product_delete']) && isset($_GET['mahh'])) {
    $MSHH = $_GET['mahh'];

    $sql_list_product_delete = "DELETE FROM `tb_hanghoa` WHERE `tb_hanghoa`.`MSHH` = '$MSHH'";
    mysqli_query($conn, $sql_list_product_delete);
}
