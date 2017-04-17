<?php
$danhSachSanPham = $data;
$phantrang = $pagination;
?>
<div class="top_bg">
    <div class="wrap">
        <div class="main_top">
            <h2 class="style">Danh sách sản phẩm</h2>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <!-- start grids_of_3 -->
            <?php
            $loopRow = 0;
            $i = 0;
            while ($loopRow < ceil(count($danhSachSanPham) / 3)) {
                $dieuKienLap = 0;
                ?>
                <div class="grids_of_3">
                    <?php
                    while ($dieuKienLap < 3 && $i < count($danhSachSanPham)) {
                        ?>
                        <div class="grid1_of_3">
                            <a href="details.html">
                                <img src="images/pic4.jpg" alt="">
                                <h3><?php echo $danhSachSanPham[$i]->ProName; ?></h3>
                                <span class="price">$145,99</span>
                            </a>
                        </div>
                        <?php
                        $dieuKienLap++;
                        $i++;
                    }
                    $loopRow++;
                    ?>
                    <div class="clear"></div>
                </div>
                <?php
            }
            ?>
            <div class="pagination">
            <?php
            $phantrang->hienThiPhanTrang(3);
            ?>
            </div>
        </div>
    </div>
</div>
