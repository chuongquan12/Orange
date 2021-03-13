<?php
include "connect.php";

// List Personnel
$sql_list_personnel = "SELECT * FROM `tb_nhanvien`";
$result_list_personnel = mysqli_query($conn, $sql_list_personnel);

?>

<script>
    $(document).ready(function() {
        // Edit 
        $(".tb-list-personnel__edit-icon").click(function() {
            var idnv = $(this).attr("idnv");
            $.get("form-personnel.php", {
                    idnv: idnv,
                    edit: true
                },
                function(data) {
                    $("#form-edit").html(data);
                }
            );
        });

        // Add
        $(".tb-list-personnel__add-icon").click(function() {
            $.get("form-personnel.php", {
                    add: true
                },
                function(data) {
                    $("#form-add").html(data);
                }
            );
        });

        // Delete
        $(".tb-list-personnel__delete-icon").click(function() {
            var idnv = $(this).attr("idnv");

            $.get("form-personnel.php", {
                    idnv: idnv,
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
                <th scope="col">MÃ NV</th>
                <th scope="col">TÊN NV</th>
                <th scope="col">CHỨC VỤ</th>
                <th scope="col">SĐT</th>
                <th scope="col">ĐỊA CHỈ</th>
                <th scope="col">TÙY CHỌN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result_list_personnel as $result) : ?>
                <tr>
                    <td><?php echo $result['MSNV'] ?></td>
                    <td><?php echo $result['HoTenNV'] ?></td>
                    <td><?php echo $result['ChucVu'] ?></td>
                    <td><?php echo $result['SoDienThoai'] ?></td>
                    <td><?php echo $result['DiaChi'] ?></td>
                    <td class="icon-tb" id="tb-list-personnel__icon">
                        <span href="">
                            <label for="edit" class="tb-list-personnel__edit-icon" idnv="<?php echo $result['MSNV'] ?>" id="tb-list-personnel__edit-icon"><i class="fas fa-edit"></i></label>
                            <input type="checkbox" id="edit" hidden class="log-re__input" />
                            <label class="log-re__overlay" for="edit"></label>
                            <div class="register" id="form-edit">
                            </div>
                        </span>
                        <span href="">
                            <label for="delete" class="tb-list-personnel__delete-icon" idnv="<?php echo $result['MSNV'] ?>" id="tb-list-personnel__delete-icon"><i class="fas fa-trash-alt"></i></label>
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
                <label for="add" class="tb-list-personnel__add-icon" id="tb-list-personnel__add-icon">Thêm NV <i class="fas fa-user-plus"></i></label>
                <input type="checkbox" id="add" hidden class="log-re__input" />
                <label class="log-re__overlay" for="add"></label>
                <div class="register" id="form-add">
                </div>
            </span>
        </div>
    </div>
</div>