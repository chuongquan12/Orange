<!-- EDIT -->

<?php
include "connect.php";
// Lấy thông tin danh mục
if (isset($_GET['edit']) && isset($_GET['math'])) {
    $MaTH = $_GET['math'];
    $sql_list_trademark = "SELECT * FROM `tb_thuonghieu` WHERE MaTH = $MaTH";
    $result_temp = mysqli_query($conn, $sql_list_trademark);

    $result_list_trademark = mysqli_fetch_assoc($result_temp);
?>

    <script>
        // Edit Form
        $(document).ready(function() {
            // admin --index
            $(".sub-trademark-edit").click(function() {
                // var idnv = $(this).attr("idnv");

                var math = $("#math").val(); //Mã Thương hiệu
                var name = $("#name").val(); //Tên thương hiệu

                $.get("action.php", {
                    math: math,
                    name: name,
                    sub_trademark_edit: true
                });

                $("#tb-list").load("list-trademark.php");
            });

            $(".sub-trademark-edit").click(function() {
                $("#tb-list").load("list-trademark.php");
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
                    <span>CHỈNH SỬA THƯƠNG HIỆU</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Tên thương hiệu: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="hidden" id="math" class="form-control" name="math" value="<?php echo $result_list_trademark['MaTH'] ?>" />
                    <input type="text" id="name" class="form-control" name="name" value="<?php echo $result_list_trademark['TenThuongHieu'] ?>" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_1"></i></div>
                </div>
            </div>
        </div>
        <br />
        <div class="row justify-content-end">
            <div class="col-4 log-re__btn-submit">
                <span class="sub-trademark-edit" name="sub-trademark-edit">Lưu</span>
            </div>
        </div>
    </form>
<?php
}
?>

<!-- ADD -->

<?php
if (isset($_GET['add'])) {

?>
    <script>
        $(document).ready(function() {
            // admin --index
            $(".sub-trademark-add").click(function() {
                // var idnv = $(this).attr("idnv");

                const name = $("#name").val();
                $.get("action.php", {
                    name: name,
                    sub_trademark_add: true
                });

                $("#tb-list").load("list-trademark.php");
            });

            $(".sub-trademark-add").click(function() {
                $("#tb-list").load("list-trademark.php");
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
                    <span>THÊM THƯƠNG HIỆU</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Tên thương hiệu: </label>
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
        <br />
        <div class="row justify-content-end">
            <div class="col-4 log-re__btn-submit">
                <span class="sub-trademark-add" name="sub-trademark-add">Thêm</span>
            </div>
        </div>
    </form>
<?php
}
?>

<!-- DELETE -->
<?php
if (isset($_GET['delete']) && isset($_GET['math'])) {
    $MaTH = $_GET['math'];
    $sql_list_trademark = "SELECT * FROM `tb_thuonghieu` WHERE MaTH = $MaTH";
    $result_temp = mysqli_query($conn, $sql_list_trademark);

    $result_list_trademark = mysqli_fetch_assoc($result_temp);
?>
    <script>
        $(document).ready(function() {
            // admin --index
            $(".sub-trademark-delete").click(function() {

                var math = $("#math").val(); // Mã thương hiệu
                $.get("action.php", {
                    math: math,
                    sub_trademark_delete: true
                });

                $("#tb-list").load("list-trademark.php");

            });
            $(".sub-trademark-delete").click(function() {
                $("#tb-list").load("list-trademark.php");
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
                    <span>XÓA THƯƠNG HIỆU</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Bạn muốn xóa thương hiệu </label>
            </div>
            <div class="col-6">
                <div class="row">
                    <input type="hidden" id="math" class="form-control" name="math" value="<?php echo $result_list_trademark['MaTH'] ?>" />
                    <input type="text" id="name" class="form-control" name="name" value="<?php echo $result_list_trademark['TenThuongHieu'] ?>" disabled />
                </div>
            </div>
        </div>
        <br />
        <div class="row justify-content-end">
            <div class="col-2 log-re__btn-submit">
                <span class="sub-trademark-delete" name="sub-trademark-delete">Xóa</span>
            </div>
            <div class="col-2 log-re__btn-submit">
                <label class="log-re__item-close" for="delete">Hủy</label>
            </div>
        </div>
    </form>
<?php
}
?>