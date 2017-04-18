<?php

class Pagination extends Database {

    private $tongMauTin;
    private $tongSoTrang;
    private $trangHienTai;
    private $trangDau;
    private $trangCuoi;

    function getTongMauTin() {
        return $this->tongMauTin;
    }

    function getTongSoTrang() {
        return $this->tongSoTrang;
    }

    function getTrangHienTai() {
        return $this->trangHienTai;
    }

    function setTrangHienTai($trang) {
        $this->trangHienTai = $trang;
    }

    function timTongSoMauTin($key, $table) {
        if (isset($_GET["total"])) {
            $this->tongMauTin = $_GET["total"];
        } else {
            $sql = "SELECT $key FROM $table";
            $result = $this->SelectAll($sql);
            $this->tongMauTin = count($result);
        }
    }

    function tinhTongSoTrang($limit) {
        $this->tongSoTrang = ceil($this->tongMauTin / $limit);
    }

    function tinhViTriBatDau($limit) {
        if (isset($_GET["page"])) {
            $pages = $_GET["page"];
            return (($pages - 1) * $limit);
        }
        return 0;
    }

    function hienThiPhanTrang($soTrangHienThi) {

        // Xử lý chuỗi trên url
        $fullUrl = $_SERVER['REQUEST_URI'];
        if (strpos($fullUrl, "page") != 0) {
            $queryStringPage = strstr($fullUrl, "page");
            $fullUrl = str_replace($queryStringPage, '', $fullUrl);
        } else {
            $fullUrl .= '&';
        }

        // Xử lý hiển thị số trang
        $middle = ceil($soTrangHienThi / 2);
        if ($this->tongSoTrang < $soTrangHienThi) {
            $this->trangDau = 1;
            $this->trangCuoi = $this->tongSoTrang;
        } else {
            $this->trangDau = $this->trangHienTai - $middle + 1;
            $this->trangCuoi = $this->trangHienTai + $middle - 1;
            if ($this->trangDau < 1) {
                $this->trangDau = 1;
                $this->trangCuoi = $soTrangHienThi;
            } else if ($this->trangCuoi > $this->tongSoTrang) {
                $this->trangCuoi = $this->tongSoTrang;
                $this->trangDau = $this->tongSoTrang - $soTrangHienThi + 1;
            }
        }
        ?>
        <ul>
        <?php
        if ($this->trangHienTai != 1) {
            ?>
                <li><a href="<?php echo $fullUrl; ?>page=1&total=<?php echo $this->tongMauTin; ?>" title="Trang đầu"><<</a></li>
                <?php
            }
            if ($this->trangHienTai > 1) {
                ?>
                <li><a href="<?php echo $fullUrl; ?>page=<?php echo (int) $this->trangHienTai - 1; ?>&total=<?php echo $this->tongMauTin; ?>" title="Trang trước"><</a></li>
                <?php
            }

            for ($i = $this->trangDau; $i <= $this->trangCuoi; $i++) {
                if ($i == $this->trangHienTai) {
                    echo "<li class='curpage'>$i</li>";
                } else {
                    ?>
                    <li><a href="<?php echo $fullUrl; ?>page=<?php echo $i; ?>&total=<?php echo $this->tongMauTin; ?>" title="Trang <?php echo $i; ?>"> <?php echo $i; ?> </a></li>
                    <?php
                }
            }

            if ($this->trangHienTai + 1 <= $this->tongSoTrang) {
                ?>
                <li><a href="<?php echo $fullUrl; ?>page=<?php echo ($this->trangHienTai + 1); ?>&total=<?php echo $this->tongMauTin; ?>" title="Trang sau"> > </a></li>
                <?php
            }
            if (($this->trangHienTai != $this->tongSoTrang) && ($this->tongSoTrang != 0)) {
                ?>
                <li><a href="<?php echo $fullUrl; ?>page=<?php echo $this->tongSoTrang; ?>&total=<?php echo $this->tongMauTin; ?>" title="trang cuối">>></a></li>
                <?php
            }
            ?>
        </ul>
            <?php
        }

    }
    ?>
