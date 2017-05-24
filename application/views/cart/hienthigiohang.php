
<div class="info-cart">
    <div class="detail-box">
        <span>Giỏ hàng</span>
    </div>
    <table class="banggiohang">
        <tr>
            <th>Sản phẩm</th> 
            <th>Giá</th>
            <th>Số lượng</th> 
            <th>Thành tiền</th> 
            <th>Xóa</th> 
        </tr>
        <?php
        if (!empty($data)) {

            foreach ($data as $sanPham) {
                $soLuong = $_SESSION['cart'][$sanPham->ProID];
                $thanhTien = $soLuong * $sanPham->Price;
                if ($sanPham->Promotion !== '0') {
                    $thanhTien = $soLuong * $sanPham->Promotion;
                }
                ?>
                <tr>
                    <td><a href="index.php?con=products&act=hienthichitietsanpham&proId=<?php echo $sanPham->ProID; ?>" id="proname"><?php echo $sanPham->ProName ?></a>
                        <img src="public/images/products/thumbs/<?php echo $sanPham->Image_thumb; ?>"/>
                    </td>
                    <td><?php
                        if ($sanPham->Promotion !== '0') {
                            echo number_format($sanPham->Promotion, 0, '.', '.');
                        } else {
                            echo number_format($sanPham->Price, 0, '.', '.');
                        }
                        ?></td>
                    <td>
                        <select name="sltSoluong" id="sltSoluong" class="sltSoluong" data-id="<?php echo $sanPham->ProID; ?>" data-price="<?php
                        if ($sanPham->Promotion !== '0') {
                            echo $sanPham->Promotion;
                        } else {
                            echo $sanPham->Price;
                        }
                        ?>" style="border: 1px solid #CCC">
                            <?php
                            for ($i = 1; $i <= 50; $i++) {
                                if ($i == $soLuong) {
                                    echo "<option value='$i' selected='selected'>$i</option>";
                                } else {
                                    echo "<option value='$i'>$i</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td id="thanhTien"><?php echo number_format($thanhTien, 0, '.', '.'); ?></td>
                    <td><button type="button" name="btnXoa" id="btnXoa" data-id="<?php echo $sanPham->ProID; ?>"><i class="fa fa-times"></i></button></td>
                </tr>
                <?php
            }
        }
        ?>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>TỔNG TIỀN </strong></td>
            <td></td>
        </tr>       
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <form name="frmThanhtoan" id="frmThanhtoan" method="POST">
                    <a href="index.php"><button type="button" name="btnThanhToan" id="btnBack">Tiếp Tục Mua Hàng</button></a>

                    <button type="submit" name="btnThanhToan" id="btnThanhToan">Thanh Toán</button>

                </form>
            </td>
        </tr>
    </table>   
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".sltSoluong").change(function () {
            var soluong = $(this).val();
            var id = $(this).attr("data-id");
            var price = $(this).attr("data-price");
            var data_change = "soluong=" + soluong + "&id=" + id + "&price=" + price + "&action=update";
            $.ajax({
                url: "application/handle/handle_ajax.php",
                type: "POST",
                data: data_change,
                async: true,
                success: function (data) {
                    $('#thanhTien').html(data);
                }
            });
        });
        
        $("#btnXoa").click(function(){
            var id = $(this).attr("data-id");
            var data = "id=" + id + "&action=delete";
            $.ajax({
                url: "application/handle/handle_ajax.php",
                type: "POST",
                data: data,
                async: true,
                success: function (deleted) {
                    if(deleted === "true"){
                        location.reload();
                    }
                }
            });
        });
    });
</script>