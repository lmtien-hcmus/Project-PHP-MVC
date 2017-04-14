<?php
    require 'application/models/m_categories.php';
    require 'application/models/m_subcategories.php';

    $category = new m_Categories();
    $dschuyenmuc = $category->docDsChuyenMuc();

    $subcat = new m_Subcategories();
?>
<div class="wrap">
    <div class="header_btm">
        <div class="menu">
            <ul>
                <li class="active"><a href="index.php">Trang Chủ</a></li>
                <?php
                foreach ($dschuyenmuc as $value) {
                    $dsSubChuyenmuc = $subcat->docDsChuyenMucConTheoIDCha($value->CatID);
                    if ($dsSubChuyenmuc != null) {
                        ?>
                        <li><a href="index.php?con=products&act=hienthisanphamtheoloai&id=<?php echo $value->CatID; ?>"><?php echo $value->CatName ?></a>
                            <ul>
                                <?php
                                foreach ($dsSubChuyenmuc as $value) {
                                    echo "<li><a href='index.php?con=products&act=hienthisanphamtheonhom&id=$value->SubCatID'>$value->SubCatName</a></li>";
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                    }
                    else{
                        echo "<li><a href=\"index.php?con=products&act=hienthisanphamtheoloai&id=$value->CatID\">$value->CatName</a></li>";
                    }
                }
                ?>
                <li><a href="index.php?con=contact?act=index">Liên Hệ</a></li>
                <div class="clear"> </div>
            </ul>
        </div>
        <div id="smart_nav">
            <a class="navicon" href="#menu-left"> </a>
        </div>
        <nav id="menu-left">
            <ul>
                <li class="active"><a href="index.html">Trang Chủ</a></li>
                <?php
                foreach ($dschuyenmuc as $value) {
                    $dsSubChuyenmuc = $subcat->docDsChuyenMucConTheoIDCha($value->CatID);
                    if ($dsSubChuyenmuc != null) {
                        ?>
                        <li><a href="index.php?con=products&act=docsanphamtheoloai&id=<?php echo $value->CatID; ?>"><?php echo $value->CatName; ?></a>
                            <ul>
                                <?php
                                foreach ($dsSubChuyenmuc as $value) {
                                    ?>
                                <li><a href='index.php?con=products&act=docsanphamtheonhom&id=<?php echo $value->SubCatID; ?>'><?php echo $value->SubCatName; ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                    }
                    else{
                        ?>
                        <li><a href="index.php?con=products&act=docsanphamtheoloai&id=<?php echo $value->CatID; ?>"><?php echo $value->CatName; ?></a></li>
                        <?php
                        }
                }
                ?>
                <li><a href="index.php?con=contact?act=index">Liên Hệ</a></li>
                <div class="clear"> </div>
            </ul>
        </nav>
        <div class="header_right">
            <ul>
                <li><a href="#"><i  class="art"></i><span class="color1">30</span></a></li>
                <li><a href="#"><i  class="cart"></i><span>0</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>