<?php
include "connect.php";
// Lấy thông tin nhân viên
if (isset($_GET['edit']) && isset($_GET['idnv'])) {
    $idnv = $_GET['idnv'];
    $sql_list_personnel = "SELECT * FROM `tb_nhanvien` WHERE MSNV = $idnv";
    $result_temp = mysqli_query($conn, $sql_list_personnel);

    $result_personnel = mysqli_fetch_assoc($result_temp);
?>

    <script>
        $(document).ready(function() {
            // admin --index
            $(".sub-personnel-edit").click(function() {
                // var idnv = $(this).attr("idnv");

                var msnv = $("#msnv").val();
                var name = $("#name").val();
                var n_phone = $("#n_phone").val();
                var address = $("#address").val();
                var position = $("#position").val();

                $.get("action.php", {
                    msnv: msnv,
                    name: name,
                    n_phone: n_phone,
                    address: address,
                    position: position,
                    sub_personnel_edit: true
                });

                $("#tb-list").load("list-personnel.php");
            });

            $(".sub-personnel-edit").click(function() {
                $("#tb-list").load("list-personnel.php");
            });
        });
    </script>

    <form>
        <div class="row justify-content-end">
            <label class="col-1 log-re__item-close" for="edit">
                <i class="fas fa-times"></i>
            </label>
        </div>
        <div class="row">
            <div class="col">
                <div class="row log-re__title-1">
                    <span>CHỈNH SỬA</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Họ và tên NV: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="hidden" id="msnv" class="form-control" name="msnv" value="<?php echo $result_personnel['MSNV'] ?>" />
                    <input type="text" id="name" class="form-control" name="name" value="<?php echo $result_personnel['HoTenNV'] ?>" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_1"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="n-phone">Số điện thoại: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="n_phone" class="form-control" name="n_phone" onkeyup="xuli_2()" value="<?php echo $result_personnel['SoDienThoai'] ?>" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_2"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="address">Địa chỉ: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="address" class="form-control" name="address" onkeyup="xuli_3()" value="<?php echo $result_personnel['DiaChi'] ?>" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_3"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="username">Chức vụ: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="position" class="form-control" name="position" onkeyup="xuli_4()" value="<?php echo $result_personnel['ChucVu'] ?>" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>
        <br />
        <div class="row justify-content-end">
            <div class="col-4 log-re__btn-submit">
                <span class="sub-personnel-edit" name="sub-personnel-edit">Lưu</span>
            </div>
        </div>
    </form>
<?php
}
?>
<?php
if (isset($_GET['add'])) {

?>
    <script>
        $(document).ready(function() {
            // admin --index
            $(".sub-personnel-add").click(function() {
                // var idnv = $(this).attr("idnv");

                var name = $("#name").val();
                var n_phone = $("#n_phone").val();
                var address = $("#address").val();
                var position = $("#position").val();
                var username = $("#username").val();
                var password = $("#password").val();



                $.get("action.php", {
                    name: name,
                    n_phone: n_phone,
                    address: address,
                    position: position,
                    username: username,
                    password: password,
                    sub_personnel_add: true
                });

                $("#tb-list").load("list-personnel.php");
            });

            $(".sub-personnel-add").click(function() {
                $("#tb-list").load("list-personnel.php");
            });
        });
    </script>

    <form>
        <div class="row justify-content-end">
            <label class="col-1 log-re__item-close" for="add">
                <i class="fas fa-times"></i>
            </label>
        </div>
        <div class="row">
            <div class="col">
                <div class="row log-re__title-1">
                    <span>THÊM NHÂN VIÊN</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Họ và tên NV: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="name" class="form-control" name="name" value="" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_1"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="n-phone">Số điện thoại: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="n_phone" class="form-control" name="n_phone" onkeyup="xuli_2()" value="" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_2"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="address">Địa chỉ: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="address" class="form-control" name="address" onkeyup="xuli_3()" value="" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_3"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="username">Chức vụ: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="position" class="form-control" name="position" onkeyup="xuli_4()" value="" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="username">Username: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="username" class="form-control" name="username" value="" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="username">Password: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="password" id="password" class="form-control" name="password" value="" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>
        <br />
        <div class="row justify-content-end">
            <div class="col-4 log-re__btn-submit">
                <span class="sub-personnel-add" name="sub-personnel-add">Thêm</span>
            </div>
        </div>
    </form>
<?php
}
?>
<?php
if (isset($_GET['delete']) && isset($_GET['idnv'])) {
    $idnv = $_GET['idnv'];
    $sql_list_personnel = "SELECT * FROM `tb_nhanvien` WHERE MSNV = $idnv";
    $result_temp = mysqli_query($conn, $sql_list_personnel);

    $result_personnel = mysqli_fetch_assoc($result_temp);
?>
    <script>
        $(document).ready(function() {
            // admin --index
            $(".sub-personnel-delete").click(function() {

                var msnv = $("#msnv").val();
                $.get("action.php", {
                    msnv: msnv,
                    sub_personnel_delete: true
                });

                $("#tb-list").load("list-personnel.php");

            });
            $(".sub-personnel-delete").click(function() {
                $("#tb-list").load("list-personnel.php");
            });

        });
    </script>

    <form>
        <div class="row justify-content-end">
            <label class="col-1 log-re__item-close" for="delete">
                <i class="fas fa-times"></i>
            </label>
        </div>
        <div class="row">
            <div class="col">
                <div class="row log-re__title-1">
                    <span>XÓA NHÂN VIÊN</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Bạn muốn xóa nhân viên </label>
            </div>
            <div class="col-6">
                <div class="row">
                    <input type="hidden" id="msnv" class="form-control" name="msnv" value="<?php echo $result_personnel['MSNV'] ?>" />
                    <input type="text" id="name" class="form-control" name="name" value="<?php echo $result_personnel['HoTenNV'] ?>" disabled />
                </div>
            </div>
        </div>
        <br />
        <div class="row justify-content-end">
            <div class="col-2 log-re__btn-submit">
                <span class="sub-personnel-delete" name="sub-personnel-delete">Xóa</span>
            </div>
            <div class="col-2 log-re__btn-submit">
                <label class="log-re__item-close" for="delete">Hủy</label>
            </div>
        </div>
    </form>
<?php
}
?>