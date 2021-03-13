<?php
include "connect.php";
// List Trademark
$sql_list_trademark = "SELECT * FROM `tb_thuonghieu`";
$result_list_trademark = mysqli_query($conn, $sql_list_trademark);
?>

<script>
    $(document).ready(function() {
        // Edit 
        $(".tb-list-trademark__edit-icon").click(function() {
            var math = $(this).attr("math"); //Id Mã thương hiệu
            $.get("form-trademark.php", {
                    math: math,
                    edit: true
                },
                function(data) {
                    $("#form-edit").html(data);
                }
            );
        });

        // Add
        $(".tb-list-trademark__add-icon").click(function() {
            $.get("form-trademark.php", {
                    add: true
                },
                function(data) {
                    $("#form-add").html(data);
                }
            );
        });

        // Delete
        $(".tb-list-trademark__delete-icon").click(function() {
            var math = $(this).attr("math"); //Id Mã thương hiệu

            $.get("form-trademark.php", {
                    math: math,
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
                <th scope="col">MÃ THƯƠNG HIỆU</th>
                <th scope="col">TÊN THƯƠNG HIỆU</th>
                <th scope="col">NGÀY CẬP NHẬT</th>
                <th scope="col">TÙY CHỌN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result_list_trademark as $result) : ?>
                <form action="">
                    <tr>
                        <td><?php echo $result['MaTH'] ?></td>
                        <td><?php echo $result['TenThuongHieu'] ?></td>
                        <td><?php echo $result['NgayCapNhat'] ?></td>
                        <td class="icon-tb" id="tb-list-product-type-1__icon">
                            <span href="">
                                <label for="edit" class="tb-list-trademark__edit-icon" math="<?php echo $result['MaTH'] ?>" id="tb-list-trademark__edit-icon"><i class="fas fa-edit"></i></label>
                                <input type="checkbox" id="edit" hidden class="log-re__input" />
                                <label class="log-re__overlay" for="edit"></label>
                                <div class="register" id="form-edit">
                                </div>
                            </span>
                            <span href="">
                                <label for="delete" class="tb-list-trademark__delete-icon" math="<?php echo $result['MaTH'] ?>" id="tb-list-trademark__delete-icon"><i class="fas fa-trash-alt"></i></label>
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
                <label for="add" class="tb-list-trademark__add-icon" id="tb-list-trademark__add-icon">Thêm Thương Hiệu</label>
                <input type="checkbox" id="add" hidden class="log-re__input" />
                <label class="log-re__overlay" for="add"></label>
                <div class="register" id="form-add">
                </div>
            </span>
        </div>
    </div>
</div>