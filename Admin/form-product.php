<!-- EDIT -->

<?php
include "connect.php";
// Lấy thông tin sản phẩm
if (isset($_GET['edit']) && isset($_GET['MaHH'])) {
    $MaHH = $_GET['MaHH'];

    $sql_list_product_type_2 = "SELECT * FROM `tb_nhomhanghoa`";
    $sql_list_trademark = "SELECT * FROM `tb_thuonghieu`";
    $sql_list_product = "SELECT MSHH, TenHH, MoTaHH, SoLuongHang, TenNhom, TenThuongHieu, Hinh, Gia, KhuyenMai, NgayCN, tb_thuonghieu.MaTH, tb_nhomhanghoa.MaNhom  FROM `tb_hanghoa`, `tb_thuonghieu`, `tb_nhomhanghoa` WHERE tb_hanghoa.MaNhom = tb_nhomhanghoa.MaNhom && tb_hanghoa.MaTH = tb_thuonghieu.MaTH && tb_hanghoa.MSHH = $MaHH";

    $result_temp_2 = mysqli_query($conn, $sql_list_product_type_2);
    $result_temp_trademark = mysqli_query($conn, $sql_list_trademark);
    $result_temp = mysqli_query($conn, $sql_list_product);

    $result_product = mysqli_fetch_assoc($result_temp);
?>

    <script>
        $(document).ready(function() {
            // admin --index
            $(".sub-product-edit").click(function() {
                // var idnv = $(this).attr("idnv");

                const mahh = $("#mahh").val();
                const name = $("#name").val();
                const description = $("#description").val();
                const amount = $("#amount").val();
                const manhom = $("#manhom").val();
                const math = $("#math").val();
                const price = $("#price").val();
                const discount = $("#discount").val();
                if (discount == "") discount = 0; // Gán giá trị khuyến mãi bằng 0
                var file_image = $("#image")[0].files[0];
                const image = file_image.name;


                $.get("action.php", {
                    mahh: mahh,
                    name: name,
                    description: description,
                    manhom: manhom,
                    math: math,
                    amount: amount,
                    image: image,
                    price: price,
                    discount: discount,
                    sub_product_edit: true
                });

                $("#tb-list").load("list-product.php");
            });

            $(".sub-product-edit").click(function() {
                $("#tb-list").load("list-product.php");
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
                    <span>CHỈNH SỬA SẢN PHẨM</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Tên sản phẩm: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="hidden" id="mahh" class="form-control" name="mahh" value="<?php echo $result_product['MSHH'] ?>" />
                    <input type="text" id="name" class="form-control" name="name" value="<?php echo $result_product['TenHH'] ?>" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_1"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="description">Mô tả sản phẩm: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="description" class="form-control" name="description" value="<?php echo $result_product['MoTaHH'] ?>" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_2"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="amount">Số lượng sản phẩm: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="amount" class="form-control" name="amount" value="<?php echo $result_product['SoLuongHang'] ?>" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_3"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="manhom">Tên nhóm: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <select class="form-control" id="manhom" name="manhom">
                        <?php
                        foreach ($result_temp_2 as $result_list_product_type_2) :
                        ?>
                            <option value="<?php echo $result_list_product_type_2['MaNhom'] ?>"> <?php echo $result_list_product_type_2['TenNhom'] ?></option>

                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="math">Tên thương hiệu: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <select class="form-control" id="math" name="math">
                        <?php
                        foreach ($result_temp_trademark as $result_list_trademark) :
                        ?>
                            <option value="<?php echo $result_list_trademark['MaTH'] ?>"> <?php echo $result_list_trademark['TenThuongHieu'] ?></option>

                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="image">Hình ảnh sản phẩm: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="price">Giá sản phẩm: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="price" class="form-control" name="price" value="<?php echo $result_product['Gia'] ?>" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="discount">Khuyến mãi: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="discount" class="form-control" name="discount" value="<?php echo $result_product['KhuyenMai'] ?>" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>

        <br />
        <div class="row justify-content-end">
            <div class="col-4 log-re__btn-submit">
                <span class="sub-product-edit" name="sub-product-edit">Lưu</span>
            </div>
        </div>
    </form>
<?php
}
?>


<!-- ADD -->

<?php
include "connect.php";
// Lấy thông tin sản phẩm
if (isset($_GET['add'])) {

    $sql_list_product_type_2 = "SELECT * FROM `tb_nhomhanghoa`";
    $sql_list_trademark = "SELECT * FROM `tb_thuonghieu`";

    $result_temp_2 = mysqli_query($conn, $sql_list_product_type_2);
    $result_temp_trademark = mysqli_query($conn, $sql_list_trademark);

?>

    <script>
        $(document).ready(function() {
            // admin --index
            $(".sub-product-add").click(function() {
                // var idnv = $(this).attr("idnv");

                const name = $("#name").val();
                const description = $("#description").val();
                const amount = $("#amount").val();
                const manhom = $("#manhom").val();
                const math = $("#math").val();
                const image = $("#image").val();
                const price = $("#price").val();
                const discount = $("#discount").val();
                if (discount == "") discount = 0; // Gán giá trị khuyến mãi bằng 0


                $.get("action.php", {
                    name: name,
                    description: description,
                    manhom: manhom,
                    amount: amount,
                    math: math,
                    image: image,
                    price: price,
                    discount: discount,
                    sub_product_add: true
                });

                $("#tb-list").load("list-product.php");
            });

            $(".sub-product-add").click(function() {
                $("#tb-list").load("list-product.php");
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
                    <span>THÊM MỚI SẢN PHẨM</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Tên sản phẩm: </label>
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
                <label for="description">Mô tả sản phẩm: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="text" id="description" class="form-control" name="description" value="" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_2"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="amount">Số lượng sản phẩm: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="number" id="amount" class="form-control" name="amount" value="" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_3"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="manhom">Tên nhóm: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <select class="form-control" id="manhom" name="manhom">
                        <?php
                        foreach ($result_temp_2 as $result_list_product_type_2) :
                        ?>
                            <option value="<?php echo $result_list_product_type_2['MaNhom'] ?>"> <?php echo $result_list_product_type_2['TenNhom'] ?></option>

                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="math">Tên thương hiệu: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <select class="form-control" id="math" name="math">
                        <?php
                        foreach ($result_temp_trademark as $result_list_trademark) :
                        ?>
                            <option value="<?php echo $result_list_trademark['MaTH'] ?>"> <?php echo $result_list_trademark['TenThuongHieu'] ?></option>

                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="image">Hình ảnh sản phẩm: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="file" id="image" class="form-control" name="image" value="" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="price">Giá sản phẩm: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="number" id="price" class="form-control" name="price" value="" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="discount">Khuyến mãi: </label>
            </div>
            <div class="col-7">
                <div class="row">
                    <input type="number" id="discount" class="form-control" name="discount" value="" />
                </div>
                <div class="row">
                    <div><i class="error" id="error_4"></i></div>
                </div>
            </div>
        </div>
        <br />
        <div class="row justify-content-end">
            <div class="col-4 log-re__btn-submit">
                <span class="sub-product-add" name="sub-product-add">Lưu</span>
            </div>
        </div>
    </form>
<?php
}
?>
<!-- DELETE -->
<?php
if (isset($_GET['delete']) && isset($_GET['mahh'])) {
    $MSHH = $_GET['mahh'];
    $sql_list_product = "SELECT * FROM `tb_hanghoa` WHERE MSHH = $MSHH";
    $result_temp = mysqli_query($conn, $sql_list_product);

    $result_list_product = mysqli_fetch_assoc($result_temp);
?>
    <script>
        $(document).ready(function() {
            // admin --index
            $(".sub-product-delete").click(function() {

                var mahh = $("#mahh").val(); // Mã hàng hóa
                $.get("action.php", {
                    mahh: mahh,
                    sub_product_delete: true
                });

                $("#tb-list").load("list-product.php");

            });
            $(".sub-product-delete").click(function() {
                $("#tb-list").load("list-product.php");
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
                    <span>XÓA SẢN PHẨM</span>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="row log-re__ip">
            <div class="col-4">
                <label for="name">Bạn muốn xóa sản phẩm </label>
            </div>
            <div class="col-6">
                <div class="row">
                    <input type="hidden" id="mahh" class="form-control" name="mahh" value="<?php echo $result_list_product['MSHH'] ?>" />
                    <input type="text" id="name" class="form-control" name="name" value="<?php echo $result_list_product['TenHH'] ?>" disabled />
                </div>
            </div>
        </div>
        <br />
        <div class="row justify-content-end">
            <div class="col-2 log-re__btn-submit">
                <span class="sub-product-delete" name="sub-product-delete">Xóa</span>
            </div>
            <div class="col-2 log-re__btn-submit">
                <label class="log-re__item-close" for="delete">Hủy</label>
            </div>
        </div>
    </form>
<?php
}
?>