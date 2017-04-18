<?php
$danhSachSanPhamMoi = array_slice($data, 0, count($data) / 2);
$danhSachSanPhamXemNhieu = array_slice($data, count($data) / 2, count($data));
?>
<!-- start image1_of_3 -->
<div class="top_bg">
    <div class="wrap">
        <div class="main1">
            <div class="image1_of_3">
                <img src="public/images/img1.jpg" alt=""/>
                <a href="details.html"><span class="tag">on sale</span></a>
            </div>
            <div class="image1_of_3">
                <img src="public/images/img2.jpg" alt=""/>
                <a href="details.html"><span class="tag">special offers</span></a>
            </div>
            <div class="image1_of_3">
                <img src="public/images/img3.jpg" alt=""/>
                <a href="details.html"><span class="tag">must have</span></a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <div class="top_main">
                <h2>Sản Phẩm Mới</h2>
                <a href="index.php?con=products&act=hienthitatcasanpham">Xem tất cả</a>
                <div class="clear"></div>
            </div>
            <!-- start grids_of_3 -->
            <?php
            $loopRow = 0;
            $i = 0;
            while ($loopRow < ceil(count($danhSachSanPhamMoi) / 3)) {
                $dieuKienLap = 0;
                ?>
                <div class="grids_of_3">
                    <?php
                    while ($dieuKienLap < 3 && $i < count($danhSachSanPhamMoi)) {
                        
                        ?>
                        <div class="grid1_of_3">
                            <a href="details.html">
                                <img src="images/pic4.jpg" alt="">
                                <h3><?php echo $danhSachSanPhamMoi[$i]->ProName; ?></h3>
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

            <div class="top_main">
                <h2>Sản phẩm xem nhiều</h2>
                <a href="index.php?con=products&act=hienthitatcasanpham">Xem tất cả</a>
                <div class="clear"></div>
            </div>
            <!-- start grids_of_3 -->
            <?php
            $loopRow = 0;
            $i = 0;
            while ($loopRow < ceil(count($danhSachSanPhamXemNhieu) / 3)) {
                $dieuKienLap = 0;
                ?>
                <div class="grids_of_3">
                    <?php
                    while ($dieuKienLap < 3 && $i < count($danhSachSanPhamXemNhieu)) {
                        ?>
                        <div class="grid1_of_3">
                            <a href="details.html">
                                <img src="images/pic4.jpg" alt="">
                                <h3><?php echo $danhSachSanPhamXemNhieu[$i]->ProName; ?></h3>
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
            <!-- start grids_of_2 -->
            <div class="grids_of_2">
                <div class="grid1_of_2">
                    <div class="span1_of_2">
                        <h2>free shipping</h2>
                        <p>Lorem Ipsum is simply dummy  typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                    <div class="span1_of_2">
                        <h2>testimonials</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using [...]</p>
                    </div>
                </div>
                <div class="grid1_of_2 bg">
                    <h2>blog news</h2>
                    <div class="grid_date">
                        <div class="date1"> 
                            <h4>apr 01</h4>
                        </div>
                        <div class="date_text">
                            <h4><a href="#"> Donec vehicula est ac augue consectetur,</a></h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> 
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="grid_date">
                        <div class="date1"> 
                            <h4>feb 01</h4>
                        </div>
                        <div class="date_text">
                            <h4><a href="#"> The standard chunk of Lorem Ipsum used since ,,</a></h4>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from </p> 
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
