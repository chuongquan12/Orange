<?php
include "connect.php";
// List Personnel
$sql_list_product_type_2 = "SELECT * FROM `tb_nhomhanghoa`, `tb_thucung` WHERE tb_nhomhanghoa.MaTC = tb_thucung.MaTC";
$result_list_product_type_2 = mysqli_query($conn, $sql_list_product_type_2);
?>

<script>
    $(document).ready(function() {
        // Edit 
        $(".tb-list-product-type-2__edit-icon").click(function() {
            var MaNhom = $(this).attr("MaNhom");
            $.get("form-product-type-2.php", {
                    MaNhom: MaNhom,
                    edit: true
                },
                function(data) {
                    $("#form-edit").html(data);
                }
            );
        });

        // Add
        $(".tb-list-product-type-2__add-icon").click(function() {
            $.get("form-product-type-2.php", {
                    add: true
                },
                function(data) {
                    $("#form-add").html(data);
                }
            );
        });

        // Delete
        $(".tb-list-product-type-2__delete-icon").click(function() {
            var MaNhom = $(this).attr("MaNhom");

            $.get("form-product-type-2.php", {
                    MaNhom: MaNhom,
                    delete: true
                },
                function(data) {
                    // alert(data)
                    $("#form-delete").html(data);
                }
            );

        });
    });
</script>

<div class="col">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">MÃ LOẠI</th>
                <th scope="col">TÊN LOẠI</th>
                <th scope="col">TÊN VẬT NUÔI</th>
                <th scope="col">NGÀY CẬP NHẬT</th>
                <th scope="col">TÙY CHỌN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result_list_product_type_2 as $result) : ?>
                <form action="">
                    <tr>
                        <td><?php echo $result['MaNhom'] ?></td>
                        <td><?php echo $result['TenNhom'] ?></td>
                        <td><?php echo $result['TenThuCung'] ?></td>
                        <td><?php echo $result['NgayCapNhat'] ?></td>
                        <td class="icon-tb" id="tb-list-product-type-2__icon">
                            <span href="">
                                <label for="edit" class="tb-list-product-type-2__edit-icon" MaNhom="<?php echo $result['MaNhom'] ?>" id="tb-list-product-type-2__edit-icon"><i class="fas fa-edit"></i></label>
                                <input type="checkbox" id="edit" hidden class="log-re__input" />
                                <label class="log-re__overlay" for="edit"></label>
                                <div class="register" id="form-edit">
                                </div>
                            </span>
                            <span href="">
                                <label for="delete" class="tb-list-product-type-2__delete-icon" MaNhom="<?php echo $result['MaNhom'] ?>" id="tb-list-product-type-2__delete-icon"><i class="fas fa-trash-alt"></i></label>
                                <input type="checkbox" id="delete" hidden class="log-re__input" />
                                <label class="log-re__overlay" for="delete"></label>
                                <div class="register" id="form-delete">
                                </div>
                            </span>
                        </td>
                    </tr>
                </form>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row justify-content-end">
        <div class="col-2 icon-tb">
            <span href="">
                <label for="add" class="tb-list-product-type-2__add-icon" id="tb-list-product-type-2__add-icon">Thêm Loại Sản Phẩm</label>
                <input type="checkbox" id="add" hidden class="log-re__input" />
                <label class="log-re__overlay" for="add"></label>
                <div class="register" id="form-add">
                </div>
            </span>
        </div>
    </div>
</div>