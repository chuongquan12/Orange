<?php
include "connect.php";
// List Product
$sql_list_product = "SELECT MSHH, TenHH, MoTaHH, SoLuongHang, TenNhom, TenThuongHieu, Hinh, Gia, KhuyenMai, NgayCN, tb_thuonghieu.MaTH, tb_nhomhanghoa.MaNhom  FROM `tb_hanghoa`, `tb_thuonghieu`, `tb_nhomhanghoa` WHERE tb_hanghoa.MaNhom = tb_nhomhanghoa.MaNhom && tb_hanghoa.MaTH = tb_thuonghieu.MaTH";
$result_list_product = mysqli_query($conn, $sql_list_product);
?>

<script>
    $(document).ready(function() {
        // Edit 
        $(".tb-list-product__edit-icon").click(function() {
            var MaHH = $(this).attr("mahh");
            $.get("form-product.php", {
                    MaHH: MaHH,
                    edit: true
                },
                function(data) {
                    $("#form-edit").html(data);
                }
            );
        });

        // Add
        $(".tb-list-product__add-icon").click(function() {
            $.get("form-product.php", {
                    add: true
                },
                function(data) {
                    $("#form-add").html(data);
                }
            );
        });

        // Delete
        $(".tb-list-product__delete-icon").click(function() {
            var mahh = $(this).attr("mahh");

            $.get("form-product.php", {
                    mahh: mahh,
                    delete: true
                },
                function(data) {
                    $("#form-delete").html(data);
                }
            );

        });
    });
</script>

<div class="col">
    <table class="table">
        <thead>
            <tr class="row">
                <th class="col">MÃ SP</th>
                <th class="col">TÊN SẢN PHẨM</th>
                <th class="col">MÔ TẢ</th>
                <th class="col">SL</th>
                <th class="col">LOẠI SP</th>
                <th class="col">THƯƠNG HIỆU</th>
                <th class="col">HÌNH</th>
                <th class="col">GIÁ</th>
                <th class="col">KHUYẾN MÃI</th>
                <th class="col">NGÀY CẬP NHẬT</th>
                <th class="col">TÙY CHỌN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result_list_product as $result) : ?>
                <tr class="row align-items-center">
                    <form action="">
                        <td class="col"><?php echo $result['MSHH'] ?></td>
                        <td class="col"><?php echo $result['TenHH'] ?></td>
                        <td class="col"><?php echo $result['MoTaHH'] ?></td>
                        <td class="col"><?php echo $result['SoLuongHang'] ?></td>
                        <td class="col"><?php echo $result['TenNhom'] ?></td>
                        <td class="col"><?php echo $result['TenThuongHieu'] ?></td>
                        <td class="col">
                            <img src="<?php echo "../img/" . $result['Hinh'] ?>" class="img-fluid" alt="Responsive image" alt="sản phẩm" style="width: 30%" />
                        </td>
                        <td class="col"><?php echo $result['Gia'] ?></td>
                        <td class="col"><?php echo $result['KhuyenMai'] ?></td>
                        <td class="col"><?php echo $result['NgayCN'] ?></td>
                        <td class="icon-tb col" id="tb-list-product__icon">
                            <span href="">
                                <label for="edit" class="tb-list-product__edit-icon" mahh="<?php echo $result['MSHH'] ?>" id="tb-list-trademark__edit-icon"><i class="fas fa-edit"></i></label>
                                <input type="checkbox" id="edit" hidden class="log-re__input" />
                                <label class="log-re__overlay" for="edit"></label>
                                <div class="register" id="form-edit">
                                </div>
                            </span>
                            <span href="">
                                <label for="delete" class="tb-list-product__delete-icon" mahh="<?php echo $result['MSHH'] ?>" id="tb-list-trademark__delete-icon"><i class="fas fa-trash-alt"></i></label>
                                <input type="checkbox" id="delete" hidden class="log-re__input" />
                                <label class="log-re__overlay" for="delete"></label>
                                <div class="register" id="form-delete">
                                </div>
                            </span>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row justify-content-end">
        <div class="col-2 icon-tb">
            <span href="">
                <label for="add" class="tb-list-product__add-icon" id="tb-list-trademark__add-icon">Thêm Sản Phẩm</label>
                <input type="checkbox" id="add" hidden class="log-re__input" />
                <label class="log-re__overlay" for="add"></label>
                <div class="register" id="form-add">
                </div>
            </span>
        </div>
    </div>
</div>