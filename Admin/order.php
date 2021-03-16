<?php
include "connect.php";
session_start();
// Order Complete
if (isset($_POST['order_complete'])) {

    $sql = "SELECT * FROM `tb_dathang`, `tb_khachhang` WHERE TrangThai = 'Hoàn thành' && tb_khachhang.MSKH = tb_dathang.MSKH";

    $data = mysqli_query($conn, $sql);

?>
    <script>
        $(document).ready(function() {
            $(".icon-order-detail").click(function() {
                SoDonDH = $(this).attr('SoDonDH');

                $.post("order.php", {

                        SoDonDH: SoDonDH,
                        order_detail: true

                    },
                    function(data) {
                        $("#order-detail").html(data);
                    });


            });

        });
    </script>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã đơn</th>
                <th scope="col">TÊN KH</th>
                <th scope="col">ĐỊA CHỈ</th>
                <th scope="col">SĐT</th>
                <th scope="col">TỔNG BILL</th>
                <th scope="col">CHI TIẾT</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key) : ?>
                <tr>
                    <td><?php echo $key['SoDonDH'] ?></td>
                    <td><?php echo $key['HoTenKH'] ?></td>
                    <td><?php echo $key['DiaChi'] ?></td>
                    <td><?php echo $key['SoDienThoai'] ?></td>
                    <td><?php echo $key['TongThanhToan'] ?></td>
                    <td id="tb-list-product-type-2__icon">
                        <span class="icon-tb icon-order-detail" SoDonDH="<?php echo $key['SoDonDH'] ?>">
                            <i class="fas fa-minus-circle"></i>
                        </span>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
    <div id="order-detail"></div>


<?php } elseif (isset($_POST['order_wait']))
// Order Wait


{

    $sql = "SELECT * FROM `tb_dathang`, `tb_khachhang` WHERE TrangThai = 'Chờ xử lý' && tb_khachhang.MSKH = tb_dathang.MSKH";

    $data = mysqli_query($conn, $sql);
?>
    <script>
        $(document).ready(function() {
            $(".icon-order-detail").click(function() {
                SoDonDH = $(this).attr('SoDonDH');

                $.post("order.php", {

                        SoDonDH: SoDonDH,
                        order_detail: true

                    },
                    function(data) {
                        $("#order-detail").html(data);
                    });


            });

            $(".icon-accept").click(function() {
                var SoDonDH = $(this).attr("SoDonDH");
                alert(SoDonDH);

                $.get("action.php", {
                        SoDonDH: SoDonDH,
                        sub_accept_order: true
                    },
                    function(data) {}
                );

            });

            $(".icon-cancel").click(function() {
                var SoDonDH = $(this).attr("SoDonDH");
                alert(SoDonDH);

                $.get("action.php", {
                        SoDonDH: SoDonDH,
                        sub_cancel_order: true
                    },
                    function(data) {}
                );

            });

            // $("#add-save").click(function() {
            //     $("#content").load("personnel.php");
            // });
        });
    </script>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã đơn</th>
                <th scope="col">TÊN KH</th>
                <th scope="col">ĐỊA CHỈ</th>
                <th scope="col">SĐT</th>
                <th scope="col">TỔNG BILL</th>
                <th scope="col">CHI TIẾT</th>
                <th scope="col">XÁC NHẬN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key) : ?>
                <tr>
                    <td><?php echo $key['SoDonDH'] ?></td>
                    <td><?php echo $key['HoTenKH'] ?></td>
                    <td><?php echo $key['DiaChi'] ?></td>
                    <td><?php echo $key['SoDienThoai'] ?></td>
                    <td><?php echo $key['TongThanhToan'] ?></td>
                    <td id="tb-list-product-type-2__icon">
                        <span class="icon-tb icon-order-detail" SoDonDH="<?php echo $key['SoDonDH'] ?>">
                            <i class="fas fa-minus-circle "></i>
                        </span>
                    </td>
                    <td id="tb-list-product-type-2__icon">
                        <span class="icon-accept" SoDonDH="<?php echo $key['SoDonDH'] ?>">
                            <i class="icon-tb">Accept</i>
                        </span>
                        <span class="icon-cancel" SoDonDH="<?php echo $key['SoDonDH'] ?>">
                            <i class="icon-tb">Cancel</i>
                        </span>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
    <div id="order-detail"></div>
<?php } elseif (isset($_POST['order_detail']) && isset($_POST['SoDonDH'])) {
    $SoDonDH = $_POST['SoDonDH'];

    $sql = "SELECT * FROM `tb_chitietdathang`, `tb_hanghoa` WHERE SoDonDH = '$SoDonDH' && tb_chitietdathang.MSHH = tb_hanghoa.MSHH";
    $sql_total = "SELECT * FROM `tb_dathang` WHERE SoDonDH = '$SoDonDH' ";

    $data = mysqli_query($conn, $sql);
    $temp = mysqli_query($conn, $sql_total);

    $total = mysqli_fetch_assoc($temp);


?>
    <div class="order-overlay"></div>
    <div class="order-detail">
        <div class="row justify-content-end">
            <i class="fas fa-times order-detail__icon-close"></i>
        </div>
        <div class="row">
            <span class="order-detail__title">Chi tiết đơn hàng #<?php echo $SoDonDH ?></span>
        </div>
        <hr>
        <div class="row">
            <div class="col order-detail__list-product">
                <?php foreach ($data as $key) : ?>
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="row order-detail__list-product--title"><?php echo $key['TenHH'] ?></span>
                        </div>
                        <div class="col-2">
                            <span class="order-detail__list-product--quantity">x<?php echo $key['SoLuong'] ?></span>
                        </div>
                        <div class="col-2">
                            <span class="order-detail__list-product--quantity"><?php echo $key['GiaDatHang'] ?>$</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col order-detail__list-product--total">
                <span>Phí ship</span>
                <span>25$</span>
            </div>
        </div>
        <div class="row">
            <div class="col order-detail__list-product--total">
                <span>Giá trị đơn hàng</span>
                <span><?php echo $total['TongThanhToan'] ?></span>
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
            // Order Complete
            $("#order-complete").click(function() {
                $.post("order.php", {
                        order_complete: true
                    },
                    function(data) {
                        $("#form").html(data);
                    }
                );
            });

            // Order Wait
            $("#order-wait").click(function() {
                $.post("order.php", {
                        order_wait: true
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
        <br>
        <div class="row justify-content-start">
            <div class="col-3">
                <span class="icon-order " id="order-complete">
                    ĐƠN HOÀN THÀNH
                </span>
            </div>
            <div class="col-6">
                <span class="icon-order" id="order-wait">
                    ĐƠN HÀNG CHỜ XỬ LÍ
                </span>
            </div>
        </div>
        <br>
        <div class="row" id="form">
        </div>
    </div>
<?php } ?>

<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/script-admin.js"></script>