<?php
include "connect.php";
session_start();
// Edit
if (isset($_POST['edit_category']) && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM `tb_nhomhanghoa` WHERE MaNhom = '$id'";
    $temp = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($temp);

?>
    <script>
        $(document).ready(function() {
            $("#edit-save").click(function() {
                // var idnv = $(this).attr("idnv");

                const name = $("#name").val(); //Nơi xuất xứ
                const MaNhom = $("#MaNhom").val(); //Mã xuất xứ 

                $.get("action.php", {
                    name: name,
                    MaNhom: MaNhom,
                    sub_edit_category: true
                });

                $("#content").load("category.php");

            });

            $("#edit-save").click(function() {
                $("#content").load("category.php");
            });
        });
    </script>

    <div class="row form">
        <div class=" col">
            <div class="row justify-content-end">
                <i class="fas fa-times icon-close" id="icon-close"></i>
            </div>
            <div class="row">
                <span class="form-title">CHỈNH SỬA NƠI XUẤT XỨ</span>
            </div>
            <div class="row form-item align-items-center">
                <input class="form-input" type="text" name="name" id="name" placeholder="Nơi xuất xứ" value="<?php echo $data['TenNhom'] ?>" />
                <input type="hidden" name="MaNhom" id="MaNhom" value="<?php echo $data['MaNhom'] ?>" />
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <span class="form-submit" id="edit-save">Chỉnh sửa</span>
                </div>
            </div>
        </div>
    </div>
<?php } elseif (isset($_POST['add_category']))
// Add
{ ?>
    <script>
        $(document).ready(function() {
            $("#add-save").click(function() {

                const name = $("#name").val(); //Nơi xuất xứ

                console.log(name)
                $.get("action.php", {
                    name: name,
                    sub_add_category: true
                });


            });

            $("#add-save").click(function() {
                $("#content").load("category.php");
            });
        });
    </script>

    <div class="row form">
        <div class=" col">
            <div class="row justify-content-end">
                <i class="fas fa-times icon-close" id="icon-close"></i>
            </div>
            <div class="row">
                <span class="form-title">THÊM NƠI XUẤT XỨ</span>
            </div>
            <div class="row form-item align-items-center">
                <input class="form-input" type="text" name="name" id="name" placeholder="Nơi xuất xứ" />
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <span class="form-submit" id="add-save">Xác nhận</span>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    // Index Category
    $sql = "SELECT * FROM `tb_nhomhanghoa`";
    $result = mysqli_query($conn, $sql);

?>
    <script>
        $(document).ready(function() {
            // Edit 
            $(".edit-category").click(function() {
                var MaNhom = $(this).attr("MaNhom");
                $.post("category.php", {
                        id: MaNhom,
                        edit_category: true
                    },
                    function(data) {
                        $("#form").html(data);
                    }
                );
            });

            // Add
            $("#add-category").click(function() {
                $.post("category.php", {
                        add_category: true
                    },
                    function(data) {
                        $("#form").html(data);
                    }
                );
            });

            // Delete
            $(".delete-category").click(function() {
                var MaNhom = $(this).attr("MaNhom");

                $.get("action.php", {
                        MaNhom: MaNhom,
                        sub_del_category: true
                    },
                    function(data) {
                        // alert("Xóa sản phẩm thành công")
                    }
                );
                $("#content").load("category.php");

            });
        });
    </script>
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">MÃ XUẤT XỨ</th>
                    <th scope="col">NƠI XUẤT XỨ</th>
                    <th scope="col">NGÀY CẬP NHẬT</th>
                    <th scope="col">TÙY CHỌN</th>
                </tr>
            </thead>
            <tbody class="table_body">
                <?php foreach ($result as $key) : ?>
                    <tr>
                        <td><?php echo $key['MaNhom'] ?></td>
                        <td><?php echo $key['TenNhom'] ?></td>
                        <td><?php echo $key['NgayCapNhat'] ?></td>
                        <td id="tb-list-product-type-2__icon">
                            <span class="edit-category" MaNhom="<?php echo $key['MaNhom'] ?>">
                                <i class="fas fa-edit icon-tb"></i>
                            </span>
                            <span class="delete-category" MaNhom="<?php echo $key['MaNhom'] ?>">
                                <i class="fas fa-trash-alt icon-tb"></i>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="row justify-content-end">
            <div class="col-3">
                <span class="icon-tb" id="add-category">
                    Thêm mới
                </span>
            </div>
        </div>
    </div>
    <div class="form-layout"></div>
    <div id="form">
    </div>
<?php } ?>

<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/script-admin.js"></script>