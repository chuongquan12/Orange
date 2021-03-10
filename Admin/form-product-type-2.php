<?php
include "connect.php";
// Lấy thông tin danh mục
if (isset($_GET['edit']) && isset($_GET['MaNhom'])) {
    $MaNhom = $_GET['MaNhom'];
    $sql_list_product_type_1 = "SELECT * FROM `tb_thucung`";
    $sql_list_product_type_2 = "SELECT * FROM `tb_nhomhanghoa` WHERE MaNhom = '$MaNhom'";

    $result_temp_1 = mysqli_query($conn, $sql_list_product_type_1);
    $result_temp_2 = mysqli_query($conn, $sql_list_product_type_2);

    $result_list_product_type_2 = mysqli_fetch_assoc($result_temp_2);
?>

    <script>
        // Edit Form
        $(document).ready(function() {
            // admin --index
            $(".sub-product-type-2-edit").click(function() {
                // var idnv = $(this).attr("idnv");

                const name = $("#name").val(); //Tên loại sản phẩm
                const MaNhom = $("#MaNhom").val(); //Mã loại sản phẩm 
                const matc = $("#MaTC").val(); //Mã thú cưng

                $.get("action.php", {
                    name: name,
                    matc: matc,
                    MaNhom: MaNhom,
                    sub_product_type_2_edit: true
                });

                $("#tb-list").load("list-product-type-2.php");
            });

            $(".sub-product-type-2-edit").click(function() {
                $("#tb-list").load("list-product-type-2.php");
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
                    <span>CHỈNH SỬA LOẠI SẢN PHẨM</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Tên loại sản phẩm: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="hidden" id="MaNhom" class="form-control" name="MaNhom" value="<?php echo $result_list_product_type_2['MaNhom'] ?>" />
                    <input type="text" id="name" class="form-control" name="name" value="<?php echo $result_list_product_type_2['TenNhom'] ?>" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_1"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="MaTC">Tên vật nuôi: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <select class="form-control" id="MaTC" name="MaTC">
                        <?php
                        foreach ($result_temp_1 as $result_list_product_type_1) :
                        ?>
                            <option matc="<?php echo $result_list_product_type_1['MaTC'] ?>" class="matc" value="<?php echo $result_list_product_type_1['MaTC'] ?>"> <?php echo $result_list_product_type_1['TenThuCung'] ?></option>

                        <?php endforeach; ?>

                    </select>
                </div>
                <div class=" row">
                    <div><i class="error" id="error_2"></i></div>
                </div>
            </div>
        </div>
        <br />
        <div class="row justify-content-end">
            <div class="col-4 log-re__btn-submit">
                <span class="sub-product-type-2-edit" name="sub-product-type-2-edit">Lưu</span>
            </div>
        </div>
    </form>
<?php
}
?>
<!-- ADD -->

<?php
if (isset($_GET['add'])) {

    $sql_list_product_type_1 = "SELECT * FROM `tb_thucung`";

    $result_temp_1 = mysqli_query($conn, $sql_list_product_type_1);


?>
    <script>
        $(document).ready(function() {
            // admin --index
            $(".sub-product-type-2-add").click(function() {
                // var idnv = $(this).attr("idnv");

                const name = $("#name").val();
                const matc = $("#MaTC").val(); //Mã thú cưng

                $.get("action.php", {
                    name: name,
                    matc: matc,
                    sub_product_type_2_add: true
                });

                $("#tb-list").load("list-product-type-2.php");
            });

            $(".sub-product-type-2-add").click(function() {
                $("#tb-list").load("list-product-type-2.php");
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
                    <span>THÊM LOẠI SẢN PHẨM</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Tên loại sản phẩm: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="name" class="form-control" name="name" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_1"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="MaTC">Tên vật nuôi: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <select class="form-control" id="MaTC" name="MaTC">
                        <?php
                        foreach ($result_temp_1 as $result_list_product_type_1) :
                        ?>
                            <option value="<?php echo $result_list_product_type_1['MaTC'] ?>" class="matc"> <?php echo $result_list_product_type_1['TenThuCung'] ?></option>

                        <?php endforeach; ?>

                    </select>
                </div>
                <div class=" row">
                    <div><i class="error" id="error_2"></i></div>
                </div>
            </div>
        </div>
        <br />
        <div class="row justify-content-end">
            <div class="col-4 log-re__btn-submit">
                <span class="sub-product-type-2-add" name="sub-product-type-2-add">Lưu</span>
            </div>
        </div>
    </form>
<?php
}
?>

<!-- DELETE -->
<?php
if (isset($_GET['delete']) && isset($_GET['MaNhom'])) {
    $MaNhom = $_GET['MaNhom'];
    $sql_list_product_type_2 = "SELECT * FROM `tb_nhomhanghoa` WHERE MaNhom = $MaNhom";
    $result_temp = mysqli_query($conn, $sql_list_product_type_2);

    $result_list_product_type_2 = mysqli_fetch_assoc($result_temp);
?>
    <script>
        $(document).ready(function() {
            // admin --index
            $(".sub-product-type-2-delete").click(function() {

                var MaNhom = $("#MaNhom").val();

                $.get("action.php", {
                    MaNhom: MaNhom,
                    sub_product_type_2_delete: true
                });

                $("#tb-list").load("list-product-type-2.php");

            });
            $(".sub-product-type-2-delete").click(function() {
                $("#tb-list").load("list-product-type-2.php");
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
                    <span>XÓA LOẠI SẢN PHẨM</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Bạn muốn xóa loại sản phẩm </label>
            </div>
            <div class="col-6">
                <div class="row">
                    <input type="hidden" id="MaNhom" class="form-control" name="MaNhom" value="<?php echo $result_list_product_type_2['MaNhom'] ?>" />
                    <input type="text" id="name" class="form-control" name="name" value="<?php echo $result_list_product_type_2['TenNhom'] ?>" disabled />
                </div>
            </div>
        </div>
        <br />
        <div class="row justify-content-end">
            <div class="col-2 log-re__btn-submit">
                <span class="sub-product-type-2-delete" name="sub-product-type-2-delete">Xóa</span>
            </div>
            <div class="col-2 log-re__btn-submit">
                <label class="log-re__item-close" for="delete">Hủy</label>
            </div>
        </div>
    </form>
<?php
}
?>