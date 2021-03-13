<?php
include "connect.php";
// List Product Type 1
$sql_list_product_type_1 = "SELECT * FROM `tb_thucung`";
$result_list_product_type_1 = mysqli_query($conn, $sql_list_product_type_1);
?>

<script>
    $(document).ready(function() {
        // Edit 
        $(".tb-list-product-type-1__edit-icon").click(function() {
            var MaTC = $(this).attr("MaTC");
            $.get("form-product-type-1.php", {
                    MaTC: MaTC,
                    edit: true
                },
                function(data) {
                    $("#form-edit").html(data);
                }
            );
        });

        // Add
        $(".tb-list-product-type-1__add-icon").click(function() {
            $.get("form-product-type-1.php", {
                    add: true
                },
                function(data) {
                    $("#form-add").html(data);
                }
            );
        });

        // Delete
        $(".tb-list-product-type-1__delete-icon").click(function() {
            var MaTC = $(this).attr("MaTC");

            $.get("form-product-type-1.php", {
                    MaTC: MaTC,
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
            <tr>
                <th scope="col">MÃ VẬT NUÔI</th>
                <th scope="col">TÊN VẬT NUÔI</th>
                <th scope="col">NGÀY CẬP NHẬT</th>
                <th scope="col">TÙY CHỌN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result_list_product_type_1 as $result) : ?>
                <tr>
                    <td><?php echo $result['MaTC'] ?></td>
                    <td><?php echo $result['TenThuCung'] ?></td>
                    <td><?php echo $result['NgayCapNhat'] ?></td>
                    <td class="icon-tb" id="tb-list-product-type-1__icon">
                        <span href="">
                            <label for="edit" class="tb-list-product-type-1__edit-icon" MaTC="<?php echo $result['MaTC'] ?>" id="tb-list-product-type-1__edit-icon"><i class="fas fa-edit"></i></label>
                            <input type="checkbox" id="edit" hidden class="log-re__input" />
                            <label class="log-re__overlay" for="edit"></label>
                            <div class="register" id="form-edit">
                            </div>
                        </span>
                        <span href="">
                            <label for="delete" class="tb-list-product-type-1__delete-icon" MaTC="<?php echo $result['MaTC'] ?>" id="tb-list-product-type-1__delete-icon"><i class="fas fa-trash-alt"></i></label>
                            <input type="checkbox" id="delete" hidden class="log-re__input" />
                            <label class="log-re__overlay" for="delete"></label>
                            <div class="register" id="form-delete">
                            </div>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row justify-content-end">
        <div class="col-2 icon-tb">
            <span href="">
                <label for="add" class="tb-list-product-type-1__add-icon" id="tb-list-product-type-1__add-icon">Thêm Thú Cưng</label>
                <input type="checkbox" id="add" hidden class="log-re__input" />
                <label class="log-re__overlay" for="add"></label>
                <div class="register" id="form-add">
                </div>
            </span>
        </div>
    </div>
</div>