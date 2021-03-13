<!-- EDIT -->

<?php
include "connect.php";
// Lấy thông tin danh mục
if (isset($_GET['edit']) && isset($_GET['MaTC'])) {
    $MaTC = $_GET['MaTC'];
    $sql_list_product_type_1 = "SELECT * FROM `tb_thucung` WHERE MaTC = $MaTC";
    $result_temp = mysqli_query($conn, $sql_list_product_type_1);

    $result_list_product_type_1 = mysqli_fetch_assoc($result_temp);
?>

    <script>
        // Edit Form
        $(document).ready(function() {
            // admin --index
            $(".sub-product-type-1-edit").click(function() {
                // var idnv = $(this).attr("idnv");

                var MaTC = $("#MaTC").val(); //Mã thú cưng
                var name = $("#name").val(); //Tên thú cưng

                $.get("action.php", {
                    MaTC: MaTC,
                    name: name,
                    sub_product_type_1_edit: true
                });

                $("#tb-list").load("list-product-type-1.php");
            });

            $(".sub-product-type-1-edit").click(function() {
                $("#tb-list").load("list-product-type-1.php");
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
                <label for="name">Tên vật nuôi: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="hidden" id="MaTC" class="form-control" name="MaTC" value="<?php echo $result_list_product_type_1['MaTC'] ?>" />
                    <input type="text" id="name" class="form-control" name="name" value="<?php echo $result_list_product_type_1['TenThuCung'] ?>" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_1"></i></div>
                </div>
            </div>
        </div>
        <br />
        <div class="row justify-content-end">
            <div class="col-4 log-re__btn-submit">
                <span class="sub-product-type-1-edit" name="sub-product-type-1-edit">Lưu</span>
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
            $(".sub-product-type-1-add").click(function() {
                // var idnv = $(this).attr("idnv");

                var name = $("#name").val();

                $.get("action.php", {
                    name: name,
                    sub_product_type_1_add: true
                });

                $("#tb-list").load("list-product-type-1.php");
            });

            $(".sub-product-type-1-add").click(function() {
                $("#tb-list").load("list-product-type-1.php");
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
                    <span>THÊM THÚ CƯNG</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Tên thú cưng: </label>
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
                <span class="sub-product-type-1-add" name="sub-product-type-1-add">Thêm</span>
            </div>
        </div>
    </form>
<?php
}
?>

<!-- DELETE -->
<?php
if (isset($_GET['delete']) && isset($_GET['MaTC'])) {
    $MaTC = $_GET['MaTC'];
    $sql_list_product_type_1 = "SELECT * FROM `tb_thucung` WHERE MaTC = $MaTC";
    $result_temp = mysqli_query($conn, $sql_list_product_type_1);

    $result_list_product_type_1 = mysqli_fetch_assoc($result_temp);
?>
    <script>
        $(document).ready(function() {
            // admin --index
            $(".sub-product-type-1-delete").click(function() {

                var MaTC = $("#MaTC").val();

                $.get("action.php", {
                    MaTC: MaTC,
                    sub_product_type_1_delete: true
                });

                $("#tb-list").load("list-product-type-1.php");

            });
            $(".sub-product-type-1-delete").click(function() {
                $("#tb-list").load("list-product-type-1.php");
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
                    <span>XÓA THÚ CƯNG</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Bạn muốn xóa thú cưng </label>
            </div>
            <div class="col-6">
                <div class="row">
                    <input type="hidden" id="MaTC" class="form-control" name="MaTC" value="<?php echo $result_list_product_type_1['MaTC'] ?>" />
                    <input type="text" id="name" class="form-control" name="name" value="<?php echo $result_list_product_type_1['TenThuCung'] ?>" disabled />
                </div>
            </div>
        </div>
        <br />
        <div class="row justify-content-end">
            <div class="col-2 log-re__btn-submit">
                <span class="sub-product-type-1-delete" name="sub-product-type-1-delete">Xóa</span>
            </div>
            <div class="col-2 log-re__btn-submit">
                <label class="log-re__item-close" for="delete">Hủy</label>
            </div>
        </div>
    </form>
<?php
}
?>