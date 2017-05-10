<?php
if ($data) {
    $chiTietSanPham = $data;
    $danhSachTenAnh = explode('|', $chiTietSanPham->Images_list);
    $sanPhamCungNhom = $this->hienThiSanPhamCungNhom($chiTietSanPham->SubCatID);
    $sanPhamCungLoai = $this->hienThiSanPhamCungLoai($chiTietSanPham->SubCatID);
}
?>
<div class="top_bg">
    <div class="wrap">
        <div class="main_top">
            <h2 class="style">Chi Tiết Sản Phẩm</h2>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="main">
            <!-- start content -->
            <div class="single">
                <!-- start span1_of_1 -->
                <div class="left_content">
                    <div class="span1_of_1">
                        <!-- start product_slider -->
                        <div class="product-view">
                            <div class="product-essential">
                                <div class="product-img-box">
                                    <div class="more-views">
                                        <div class="more-views-container">
                                            <ul>
                                                <?php
                                                $i = 1;
                                                foreach ($danhSachTenAnh as $tenAnh) {
                                                    ?>
                                                    <li>
                                                        <a class="cs-fancybox-thumbs" data-fancybox-group="thumb"  href=""  title="" alt="">
                                                            <img src="" src_main=""  title="" alt="" /></a>            
                                                    </li>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-image"> 
                                        <a class="cs-fancybox-thumbs cloud-zoom" rel="adjustX:30,adjustY:0,position:'right',tint:'#202020',tintOpacity:0.5,smoothMove:2,showTitle:true,titleOpacity:0.5" data-fancybox-group="thumb" href="public/images/products/large/<?php echo $danhSachTenAnh[0]; ?>" title="Women Shorts" alt="Women Shorts">
                                            <img src="public/images/products/large/<?php echo $danhSachTenAnh[0]; ?>" alt="Women Shorts" title="Women Shorts" />
                                        </a>
                                    </div>
                                    <script type="text/javascript">
                                        <?php
                                            $soLuongAnh = count($danhSachTenAnh);
                                            $dem = 1;
                                        ?>
                                        var prodGallery = jQblvg.parseJSON('{"prod_1":{"main":{"orig":"public/images/products/large/<?php echo $danhSachTenAnh[0]; ?>","main":"public/images/products/large/<?php echo $danhSachTenAnh[0]; ?>","thumb":"public/images/products/small/<?php echo $danhSachTenAnh[0]; ?>","label":""},"gallery":{<?php foreach ($danhSachTenAnh as $key => $tenAnh) { 
                                            $chuoiAnh = '"item_' . $key. '":{"orig":"public/images/products/large/'.$tenAnh.'","main":"public/images/products/large/'.$tenAnh.'","thumb":"public/images/products/small/'.$tenAnh.'","label":""},';
                                        if($dem == $soLuongAnh)
                                        {
                                            $chuoiAnh = rtrim($chuoiAnh, ',');
                                        }
                                        echo $chuoiAnh;
                                        $dem++;
                                        }
                                                ?>},"type":"simple","video":false}}'),
                                                gallery_elmnt = jQblvg('.product-img-box'),
                                                galleryObj = new Object(),
                                                gallery_conf = new Object();
                                        gallery_conf.moreviewitem = '<a class="cs-fancybox-thumbs" data-fancybox-group="thumb"  href=""  title="" alt=""><img src="" src_main="" title="" alt="" /></a>';
                                        gallery_conf.animspeed = 200;
                                        jQblvg(document).ready(function () {
                                            galleryObj[1] = new prodViewGalleryForm(prodGallery, 'prod_1', gallery_elmnt, gallery_conf, '.product-image', '.more-views', 'http:');
                                            jQblvg('.product-image .cs-fancybox-thumbs').absoluteClick();
                                            jQblvg('.cs-fancybox-thumbs').fancybox({prevEffect: 'none',
                                                nextEffect: 'none',
                                                closeBtn: true,
                                                arrows: true,
                                                nextClick: true,
                                                helpers: {
                                                    thumbs: {
                                                        position: 'bottom'
                                                    }
                                                }
                                            });
                                            jQblvg('#wrap').css('z-index', '100');
                                            jQblvg('.more-views-container').elScroll({type: 'vertical', elqty: 4, btn_pos: 'border', scroll_speed: 400});

                                        });

                                        function initGallery(a, b, element) {
                                            galleryObj[a] = new prodViewGalleryForm(prods, b, gallery_elmnt, gallery_conf, '.product-image', '.more-views', '');
                                        }
                                        ;

                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- end product_slider -->
                    </div>
                    <!-- start span1_of_1 -->
                    <div class="span1_of_1_des">
                        <div class="desc1">
                            <h3><?php echo $chiTietSanPham->ProName; ?></h3>
                            <?php
                            if ($chiTietSanPham->Promotion == 0) {
                                ?>
                                <h5> <?php echo number_format($chiTietSanPham->Price, 0, '.', '.'); ?> VNĐ</h5>
                                <?php
                            } else {
                                ?>
                                <h5><?php echo number_format($chiTietSanPham->Promotion, 0, '.', '.'); ?> VNĐ<br><span><?php echo number_format($chiTietSanPham->Price, 2, ',', '.'); ?></span></h5>
                                <?php
                            }
                            ?>

                            <div class="available">
                                <div class="btn_form">
                                    <form>
                                        <input type="submit" value="mua hàng" title="" />
                                    </form>
                                </div>
                                <span><a href="#">Đăng nhập để giao dịch</a></span>
                                <p><?php echo $chiTietSanPham->TinyDes; ?></p>
                            </div>
                            <div class="share-desc">
                                <div class="share">
                                    <h4>Chia Sẻ:</h4>
                                    <ul class="share_nav">
                                        <li><a href="#"><img src="public/images/facebook.png" title="facebook"></a></li>
                                        <li><a href="#"><img src="public/images/twitter.png" title="Twiiter"></a></li>
                                        <li><a href="#"><img src="public/images/rss.png" title="Rss"></a></li>
                                        <li><a href="#"><img src="public/images/gpluse.png" title="Google+"></a></li>
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <!-- start left content_bottom -->
                    <div class="left_content_btm">
                      
                        <!-- start tabs -->
                        <section class="tabs">
                            <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked">
                            <label for="tab-1" class="tab-label-1">chi tiết</label>

                            <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2">
                            <label for="tab-2" class="tab-label-2">chính sách hoàn trả</label>

                            <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3">
                            <label for="tab-3" class="tab-label-3">Vận chuyển</label>

                            <div class="clear-shadow"></div>

                            <div class="content">
                                <div class="content-1">
                                    <p class="para top"><span><h3><?php echo $chiTietSanPham->ProName;?></h3></span><br><?php echo $chiTietSanPham->FullDes; ?></p>
                                    <div class="clear"></div>
                                </div>
                                <div class="content-2">
                                    <p class="para"><span>XIN CHÀO </span>- Tận hưởng 30 ngày miễn phí đổi trả cho sản phẩm này. 
Lưu ý các sản phẩm cung cấp bởi các nhà bán hàng (Marketplace), hàng nhập khẩu từ Singapore/ Malaysia sẽ không được áp dụng chính sách đổi sản phẩm.
<br>
Nếu bạn có thắc mắc về sản phẩm, vui lòng liên hệ với bộ phận Chăm Sóc Khách Hàng tại leminhtien1916@gmail.com. </p>
                                    
                                </div>
                                <div class="content-3">
                                    <table width="766" border="1" cellpadding="8" cellspacing="0">
   
    <tbody><tr>
    <th width="250"><h3>KHU VỰC</h3></th>
    <th width="250"><h3>VẬN CHUYỂN</h3></th>
    <th width="250"><h3>THỜI GIAN</h3></th>
    <th width="250"><h3>PHÍ VẬN CHUYỂN</h3></th>
    </tr>

    <tr>
    <td width="250">TP. Hồ Chí Minh, Hà Nội</td>
    <td width="250" style="text-align: center;">3 - 5 ngày làm việc</td>
    <td rowspan="3" style="text-align: center;">Thứ 2 – Sáng Thứ 7<br/>
Sáng: 9:00 – 12:00<br/>
Chiều: 1:00 – 5:00<br/>
</td>
    <td rowspan="3">- MIỄN PHÍ GIAO HÀNG: Giá trị mua hàng cùng <b>1 NHÀ CUNG CẤP</b> ≥ 449,000 VND<br>
                    - Chi tiết phí vận chuyển vui lòng liên hệ leminhtien1916@gmail.com
    </td>
    </tr>

<tr>
    <td width="250">Các thành phố lớn và lân cận</td>
    <td width="250" style="text-align: center;">4 - 7 ngày làm việc</td>
    </tr>

<tr>
    <td width="250">Khu vực khác</td>
    <td width="250" style="text-align: center;">6 - 11 ngày làm việc </td>
    </tr>
<tr><td colspan="4" style="text-align: center; font-weight: bold;">**Lưu ý: Thời gian giao hàng không bao gồm Thứ 7, Chủ Nhật và ngày Lễ, Tết</td></tr>
</tbody></table>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </section>
                        <!-- end tabs -->
                    </div>
                    <!-- end left content_bottom -->
                </div>
                <!-- start left_sidebar -->
                <div class="left_sidebar">

                    <h4>Sản phẩm cùng nhóm</h4>
                    <?php
                    foreach ($sanPhamCungNhom as $sanPham) {
                        $tenAnhDaiDien = explode('|', $sanPham->Images_list);
                        ?>
                    <div class="left_products">
                    <div class="left_img">
                        <img src="public/images/products/small/<?php echo $tenAnhDaiDien[0];?>" alt=""/>
                    </div>
                    <div class="left_text">
                        <p><a href="#"><?php echo $sanPham->ProName ;?></a></p>
                        <?php
                            if($sanPham->Promotion !== 0)
                            {
                                ?>
                                <span class="line"><?php echo number_format($chiTietSanPham->Promotion, 0, '.', '.'); ?> VNĐ</span>
                        <?php
                            }
                        ?>
                        
                        <span><?php echo number_format($chiTietSanPham->Price, 0, '.', '.'); ?> VNĐ</span>
                    </div>
                    <div class="clear"></div>
                </div>
                    <?php
                    }
                    ?>
                    
                    
                    <h4>Sản phẩm cùng loại</h4>
                    <?php
                    foreach ($sanPhamCungLoai as $sanPham) {
                        $tenAnhDaiDien = explode('|', $sanPham->Images_list);
                        ?>
                    <div class="left_products">
                    <div class="left_img">
                        <img src="public/images/products/small/<?php echo $tenAnhDaiDien[0];?>" alt=""/>
                    </div>
                    <div class="left_text">
                        <p><a href="#"><?php echo $sanPham->ProName ;?></a></p>
                        <?php
                            if($sanPham->Promotion !== '0')
                            {
                                ?>
                                <span class="line"><?php echo number_format($sanPham->Promotion, 0, '.', '.'); ?></span>
                        <?php
                            }
                        ?>
                        
                        <span><?php echo number_format($sanPham->Price, 0, '.', '.'); ?> VNĐ</span>
                    </div>
                    <div class="clear"></div>
                </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="clear"></div>
            </div>	
            <!-- end content -->
        </div>
    </div>
</div>