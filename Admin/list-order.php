<?php

include "connect.php";
// List Order
$sql_list_order = "SELECT * FROM `tb_khachhang`, `tb_dathang` WHERE tb_khachhang.MSKH = tb_dathang.MSKH";
$result_list_order = mysqli_query($conn, $sql_list_order);

?>
<script>
    $(document).ready(function() {
        // admin --index
        $(".icon-tb").click(function() {
            var idOrder = $(this).attr("idorder");
            $.get("form-order.php", {
                    dh: idOrder
                },
                function(data) {
                    $("#order-detail").html(data);
                }
            );
        });
    });
</script>
<div class="col" id="tb-list-order">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">MÃ ĐƠN</th>
                <th scope="col">TÊN KH</th>
                <th scope="col">SĐT</th>
                <th scope="col">ĐỊA CHỈ</th>
                <th scope="col">TÊN NV</th>
                <th scope="col">CHI TIẾT</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result_list_order as $result) : ?>
                <tr>
                    <td><?php echo $result['SoDonDH'] ?></td>
                    <td><?php echo $result['HoTenKH'] ?></td>
                    <td><?php echo $result['SoDienThoai'] ?></td>
                    <td><?php echo $result['DiaChi'] ?></td>
                    <td>0924668320</td>
                    <td class="icon-tb" id="idorder" idorder="<?php echo $result['SoDonDH'] ?>">
                        <span><i class="fas fa-minus-circle"></i></span>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
</div>
<div class="col-3" id="order-detail">
</div>