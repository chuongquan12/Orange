<?php
include "connect.php";

// Order Detail
if (isset($_GET['dh'])) {

    $dh = $_GET['dh'];
    $sql_order_detail = "SELECT * FROM `chitietdathang` WHERE SoDonDH = '$dh'";
    $result_order_detail = mysqli_query($conn, $sql_order_detail);
} else {
    $result_order_detail = NULL;
}

?>
<div class="row order-detail">
    <div class="col">
        <div class="row order-detail__title">
            <span>CHI TIẾT ĐƠN HÀNG: </span>
        </div>
        <hr class="hr" />
        <div class="row justify-content-center">
            <div class="col-10 cart-detail__body">
                <?php
                if ($result_order_detail != NULL) {
                    foreach ($result_order_detail as $result_order) :
                ?>
                        <?php
                        $MSHH = $result_order['MSHH'];
                        $sql_product_detail = "SELECT * FROM `hanghoa` WHERE MSHH = '$MSHH'";

                        $result_temp = mysqli_query($conn, $sql_product_detail);
                        $result = mysqli_fetch_assoc($result_temp);
                        ?>
                        <div class="row cart-detail__body--item align-items-center">

                            <div class="col-4 cart-detail__body--item--img">
                                <img src="<?php echo "../" . $result['Hinh'] ?>" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                            </div>
                            <div class="col-6 cart-detail__body--item--title">
                                <div class="row">
                                    <a href=""><?php echo $result['TenHH'] ?></a>
                                </div>
                            </div>
                            <div class="col-1 cart-detail__body--item--amount">
                                <div class="row">
                                    <span><?php echo "x" . $result_order['SoLuong'] ?></span>
                                </div>
                            </div>
                        </div>
                <?php endforeach;
                } ?>
            </div>
        </div>
        <hr class="hr" />
        <div class="row order-detail__price">
            <div class="col">
                <label for="Name">Tổng giá trị</label>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="Name" value="1.000.000 VNĐ" disabled />
            </div>
        </div>
        <br />
    </div>
</div>