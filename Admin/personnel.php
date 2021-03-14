<?php
include "connect.php";
session_start();
// Edit
if (isset($_POST['edit_personnel']) && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM `tb_nhanvien` WHERE MSNV = '$id'";
    $temp = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($temp);

?>
    <script>
        $(document).ready(function() {
            $("#edit-save").click(function() {

                const MSNV = $("#MSNV").val(); //Mã số nhân viên 
                const name = $("#name").val(); //Tên nhân viên
                const address = $("#address").val(); //Địa chỉ nhân viên
                const n_phone = $("#n_phone").val(); //Số điện thoại nhân viên
                const position = $("#position").val(); //Chức vụ nhân viên

                $.get("action.php", {

                    MSNV: MSNV,
                    name: name,
                    address: address,
                    n_phone: n_phone,
                    position: position,
                    sub_edit_personnel: true

                });

                $("#content").load("personnel.php");

            });

            $("#edit-save").click(function() {
                $("#content").load("personnel.php");
            });
        });
    </script>

    <div class="row form">
        <div class=" col">
            <div class="row justify-content-end">
                <i class="fas fa-times icon-close" id="icon-close"></i>
            </div>
            <div class="row">
                <span class="form-title">CHỈNH SỬA THÔNG TIN NHÂN VIÊN</span>
            </div>
            <div class="row form-item align-items-center">
                <input class="form-input" type="text" name="name" id="name" placeholder="Họ và tên" value="<?php echo $data['HoTenNV'] ?>" />
                <input type="hidden" name="MSNV" id="MSNV" value="<?php echo $data['MSNV'] ?>" />
            </div>
            <div class="row form-item align-items-center">
                <input class="form-input" type="text" name="n_phone" id="n_phone" placeholder="Số điện thoại" value="<?php echo $data['SoDienThoai'] ?>" />
            </div>
            <div class="row form-item justify-content-between">
                <div class="col-4">
                    <label for="position" class="form-lable">Chức vụ</label>
                </div>
                <div class="col-6">
                    <select class="form-input" id="position" name="position">
                        <option <?php if ($data['ChucVu'] == 'Nhân viên') echo "selected=\"selected\""; ?> value="Nhân viên">Nhân viên</option>
                        <option <?php if ($data['ChucVu'] == 'Quản lý') echo "selected=\"selected\""; ?> value="Quản lý">Quản lý</option>
                    </select>
                </div>
            </div>
            <div class="row form-item align-items-center">
                <textarea name="address" id="address" placeholder="Địa chỉ" rows="3"><?php echo $data['DiaChi'] ?></textarea>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <span class="form-submit" id="edit-save">Chỉnh sửa</span>
                </div>
            </div>
        </div>
    </div>
<?php } elseif (isset($_POST['add_personnel']))
// Add
{ ?>
    <script>
        $(document).ready(function() {
            $("#add-save").click(function() {

                const name = $("#name").val(); //Tên nhân viên
                const address = $("#address").val(); //Địa chỉ nhân viên
                const n_phone = $("#n_phone").val(); //Số điện thoại nhân viên
                const position = $("#position").val(); //Chức vụ nhân viên
                const username = $("#username").val(); //Chức vụ nhân viên
                const password = $("#password").val(); //Chức vụ nhân viên

                $.get("action.php", {

                    name: name,
                    address: address,
                    n_phone: n_phone,
                    position: position,
                    username: username,
                    password: password,
                    sub_add_personnel: true

                });


            });

            $("#add-save").click(function() {
                $("#content").load("personnel.php");
            });
        });
    </script>

    <div class="row form">
        <div class=" col">
            <div class="row justify-content-end">
                <i class="fas fa-times icon-close" id="icon-close"></i>
            </div>
            <div class="row">
                <span class="form-title">THÊM THÔNG TIN NHÂN VIÊN</span>
            </div>
            <div class="row form-item align-items-center">
                <input class="form-input" type="text" name="name" id="name" placeholder="Họ và tên" value="" />
                <input type="hidden" name="MSNV" id="MSNV" value="" />
            </div>
            <div class="row form-item align-items-center">
                <input class="form-input" type="text" name="n_phone" id="n_phone" placeholder="Số điện thoại" value="" />
            </div>
            <div class="row form-item justify-content-between">
                <div class="col-4">
                    <label for="position" class="form-lable">Chức vụ</label>
                </div>
                <div class="col-6">
                    <select class="form-input" id="position" name="position">
                        <option value="Nhân viên">Nhân viên</option>
                        <option value="Quản lý">Quản lý</option>
                    </select>
                </div>
            </div>
            <div class="row form-item align-items-center">
                <textarea name="address" id="address" placeholder="Địa chỉ" rows="3"></textarea>
            </div>

            <div class="row form-item align-items-center">
                <input class="form-input" type="text" name="username" id="username" placeholder="Tên đăng nhập" value="" />
            </div>
            <div class="row form-item align-items-center">
                <input class="form-input" type="password" name="password" id="password" placeholder="Mật khẩu" value="" />
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <span class="form-submit" id="add-save">Thêm mới</span>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    // Index Category
    $sql = "SELECT * FROM `tb_nhanvien`";
    $result = mysqli_query($conn, $sql);

?>
    <script>
        $(document).ready(function() {
            // Edit 
            $(".edit-personnel").click(function() {
                var MSNV = $(this).attr("MSNV");
                $.post("personnel.php", {
                        id: MSNV,
                        edit_personnel: true
                    },
                    function(data) {
                        $("#form").html(data);
                    }
                );
            });

            // Add
            $("#add-personnel").click(function() {
                $.post("personnel.php", {
                        add_personnel: true
                    },
                    function(data) {
                        $("#form").html(data);
                    }
                );
            });

            // Delete
            $(".delete-personnel").click(function() {
                var MSNV = $(this).attr("MSNV");

                $.get("action.php", {
                        MSNV: MSNV,
                        sub_del_personnel: true
                    },
                    function(data) {
                        alert("Xóa nhân viên thành công")
                    }
                );
                $("#content").load("personnel.php");

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
                <?php foreach ($result as $key) : ?>
                    <tr>
                        <td><?php echo $key['MSNV'] ?></td>
                        <td><?php echo $key['HoTenNV'] ?></td>
                        <td><?php echo $key['ChucVu'] ?></td>
                        <td><?php echo $key['SoDienThoai'] ?></td>
                        <td><?php echo $key['DiaChi'] ?></td>
                        <td id="tb-list-product-type-2__icon">
                            <span class="edit-personnel" MSNV="<?php echo $key['MSNV'] ?>">
                                <i class="fas fa-edit icon-tb"></i>
                            </span>
                            <span class="delete-personnel" MSNV="<?php echo $key['MSNV'] ?>">
                                <i class="fas fa-trash-alt icon-tb"></i>
                            </span>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="row justify-content-end">
            <div class="col-3">
                <span class="icon-tb" id="add-personnel">
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