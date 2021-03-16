<?php
include "connect.php";
session_start();
// Edit
if (isset($_POST['edit_product']) && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM `tb_hanghoa` WHERE MSHH = '$id'";
    $sql_nhom = "SELECT * FROM `tb_nhomhanghoa`";

    $temp = mysqli_query($conn, $sql);
    $temp_nhom = mysqli_query($conn, $sql_nhom);

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
                <span class="form-title">CHỈNH SỬA SẢN PHẨM</span>
            </div>
            <div class="row form-item align-items-center">
                <textarea name="name" id="name" placeholder="Tên sản phẩm" rows="2"><?php echo $data['TenHH'] ?></textarea>
                <input type="hidden" name="MSHH" id="MSHH" value="<?php echo $data['MSHH'] ?>" />
            </div>
            <div class="row form-item align-items-center">
                <textarea name="description" id="description" placeholder="Mô tả sản phẩm" rows="3"><?php echo $data['MoTaHH'] ?></textarea>
            </div>
            <div class="row form-item align-items-center">
                <div class="col-3">
                    <label for="image" class="form-lable">Hình ảnh</label>
                </div>
                <div class="col-9">
                    <input type="file" class="form-input" name="image" id="image" value="<?php echo $data['Hinh'] ?>">
                </div>
            </div>
            <div class="row form-item justify-content-start">
                <div class="col-3">
                    <label for="position" class="form-lable">Xuất xứ</label>
                </div>
                <div class="col-6">
                    <select class="form-input" id="position" name="position">
                        <?php foreach ($temp_nhom as $key) : ?>
                            <option <?php if ($data['MaNhom'] ==  $key['MaNhom']) echo "selected=\"selected\""; ?> value="<?php echo $key['MaNhom'] ?>"><?php echo $key['TenNhom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row form-item align-items-center">
                <div class="col-3">
                    <label for="quantity" class="form-lable">Số lượng</label>
                </div>
                <div class="col-3">
                    <input type="number" name="quantity" id="quantity" min="0" value="<?php echo $data['SoLuongHang'] ?>" />
                </div>
            </div>
            <div class="row form-item align-items-center">
                <div class="col-3">
                    <label for="price" class="form-lable">Giá ($)</label>
                </div>
                <div class="col-3">
                    <input type="number" name="price" id="price" min="0" step="0.05" value="<?php echo $data['Gia'] ?>" />
                </div>
                <div class="col-3">
                    <label for="discout" class="form-lable">SALE (%)</label>
                </div>
                <div class="col-3">
                    <input type="number" name="discout" id="discout" min="0" max="100" value="<?php echo $data['KhuyenMai'] ?>" />
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <span class="form-submit" id="edit-save">Chỉnh sửa</span>
                </div>
            </div>
        </div>
    </div>
<?php } elseif (isset($_POST['add_product'])) {

    $sql_nhom = "SELECT * FROM `tb_nhomhanghoa`";

    $temp_nhom = mysqli_query($conn, $sql_nhom);
?>
    <script>
        $(document).ready(function() {
            $("#add-save-product").click(function() {

                const name = $("#name").val(); //Tên sản phẩm
                const description = $("#description").val(); //Mô tả sản phẩm
                const category = $("#type_1").val(); //Nhóm sản phẩm
                const quantity = $("#quantity").val(); //Số lượng
                const discount = $("#discount").val(); //khuyến mãi
                const price = $("#price").val(); //Giá

                var file_image = $("#file")[0].files[0];
                const file = file_image.name;

                $.get("action.php", {

                    name: name,
                    description: description,
                    category: category,
                    file: file,
                    quantity: quantity,
                    discount: discount,
                    price: price,
                    sub_add_product: true

                });


            });

            $("#add-save-product").click(function() {
                $("#content").load("product.php");
            });
        });
    </script>

    <div class="row form">
        <div class=" col">
            <div class="row justify-content-end">
                <i class="fas fa-times icon-close" id="icon-close"></i>
            </div>
            <div class="row">
                <span class="form-title">THÊM SẢN PHẨM</span>
            </div>
            <div class="row form-item align-items-center">
                <textarea name="name" id="name" placeholder="Tên sản phẩm" rows="2"></textarea>
            </div>
            <div class="row form-item align-items-center">
                <textarea name="description" id="description" placeholder="Mô tả sản phẩm" rows="3"></textarea>
            </div>
            <div class="row form-item align-items-center">
                <div class="col-3">
                    <label for="image" class="form-lable">Hình ảnh</label>
                </div>
                <div class="col-9">
                    <input type="file" class="form-input" id="file" name="sortpic" required="">
                </div>
            </div>
            <div class="row form-item justify-content-start">
                <div class="col-3">
                    <label for="category" class="form-lable">Xuất xứ</label>
                </div>
                <div class="col-6">
                    <select class="form-input" id="type_1" name="type_1">
                        <?php foreach ($temp_nhom as $key) : ?>
                            <option value="<?php echo $key['MaNhom'] ?>"><?php echo $key['TenNhom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row form-item align-items-center">
                <div class="col-3">
                    <label for="quantity" class="form-lable">Số lượng</label>
                </div>
                <div class="col-3">
                    <input type="number" name="quantity" id="quantity" min="0" value="" />
                </div>
            </div>
            <div class="row form-item align-items-center">
                <div class="col-3">
                    <label for="price" class="form-lable">Giá ($)</label>
                </div>
                <div class="col-3">
                    <input type="number" name="price" id="price" min="0" step="0.05" value="" />
                </div>
                <div class="col-3">
                    <label for="discount" class="form-lable">SALE (%)</label>
                </div>
                <div class="col-3">
                    <input type="number" name="discount" id="discount" min="0" max="100" value="" />
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <span class="form-submit" id="add-save-product">Thêm mới</span>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    // Index Category
    $sql = "SELECT * FROM `tb_hanghoa`, `tb_nhomhanghoa` WHERE tb_hanghoa.MaNhom = tb_nhomhanghoa.MaNhom";
    $result = mysqli_query($conn, $sql);

?>
    <script>
        $(document).ready(function() {
            // Edit 
            $(".edit-product").click(function() {
                var MSHH = $(this).attr("MSHH");
                $.post("product.php", {
                        id: MSHH,
                        edit_product: true
                    },
                    function(data) {
                        $("#form").html(data);
                    }
                );
            });

            // Add
            $("#add-product").click(function() {
                $.post("product.php", {
                        add_product: true
                    },
                    function(data) {
                        $("#form").html(data);
                    }
                );
            });

            // Delete
            $(".delete-product").click(function() {
                var MSHH = $(this).attr("MSHH");

                $.get("action.php", {
                        MSHH: MSHH,
                        sub_del_product: true
                    },
                    function(data) {}
                );
                $("#content").load("product.php");

            });
        });
    </script>
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">MÃ SP</th>
                    <th scope="col">TÊN SP</th>
                    <th scope="col">MÔ TẢ</th>
                    <th scope="col">SL</th>
                    <th scope="col">XUẤT XỨ</th>
                    <th scope="col">HÌNH</th>
                    <th scope="col">GIÁ</th>
                    <th scope="col">SALE</th>
                    <th scope="col">NGÀY CN</th>
                    <th scope="col">ĐÃ BÁN</th>
                    <th scope="col">TÙY CHỌN</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $key) : ?>
                    <tr class="align-items-center">
                        <td><?php echo $key['MSHH'] ?></td>
                        <td class="with-title"><?php echo $key['TenHH'] ?></td>
                        <td class="with-title"><?php echo $key['MoTaHH'] ?></td>
                        <td><?php echo $key['SoLuongHang'] ?></td>
                        <td class="with-title-1"><?php echo $key['TenNhom'] ?></td>
                        <td>
                            <img src="<?php echo "../img/product/" . $key['Hinh'] ?>" class="img-fluid" alt="sản phẩm" style="width: 4rem" />
                        </td>
                        <td><?php echo $key['Gia'] ?></td>
                        <td><?php echo $key['KhuyenMai'] ?></td>
                        <td><?php echo $key['NgayCN'] ?></td>
                        <td><?php echo $key['SoLuongHang'] ?></td>
                        <td id="tb-list-product-type-2__icon">
                            <span class="edit-product" MSHH="<?php echo $key['MSHH'] ?>">
                                <i class="fas fa-edit icon-tb"></i>
                            </span>
                            <span class="delete-product" MSHH="<?php echo $key['MSHH'] ?>">
                                <i class="fas fa-trash-alt icon-tb"></i>
                            </span>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="row justify-content-end">
            <div class="col-3">
                <span class="icon-tb" id="add-product">
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