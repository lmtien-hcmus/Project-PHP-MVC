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
            <a name="products"></a>
            <!-- start grids_of_3 -->
            <?php
            if ($danhSachSanPham != null) {

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
                                <a href="index.php?con=products&act=hienthichitietsanpham&proId=<?php echo $danhSachSanPham[$i]->ProID; ?>">
                                    <img src="public/images/products/thumbs/<?php echo $danhSachSanPham[$i]->Image_thumb; ?>" alt="">
                                    <h3><?php echo $danhSachSanPham[$i]->ProName; ?></h3>
                                    <span class="price"><?php
                                        if ($danhSachSanPham[$i]->Promotion !== '0') {
                                            echo number_format($danhSachSanPham[$i]->Promotion, 0, '.', '.');
                                        } else {
                                            echo number_format($danhSachSanPham[$i]->Price, 0, '.', '.');
                                        }
                                        ?> VNĐ</span>
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
            } else {
                ?>
                <h3>CHƯA CÓ SẢN PHẨM NÀO</h3>
                <?php
            }
            ?>
            <div class="pagination">
                <?php
                if ($phantrang->getTongSoTrang() != 0 && $phantrang->getTongSoTrang() != 1) {
                    $phantrang->hienThiPhanTrang(10);
                }
                ?>
            </div>
        </div>
    </div>
</div>
