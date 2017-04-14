<?php

class Pagination extends Database {

    private $tongMauTin;
    private $tongSoTrang;
    private $trangHienTai;

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

    function hienThiPhanTrang() {
        $fullUrl = $_SERVER['REQUEST_URI'];
        if (strpos($fullUrl, "page") != 0) {
            $queryStringPage = strstr($fullUrl, "page");
            $fullUrl = str_replace($queryStringPage, '', $fullUrl);
        } else {
            $fullUrl .= '&';
        }
        if ($this->trangHienTai != 1) {
            ?>
            <a href="<?php echo $fullUrl; ?>page=1&total=<?php echo $this->tongMauTin; ?>" title="Trang đầu">&nbsp; << &nbsp;</a>
            <?php
        }
        if ($this->trangHienTai > 1) {
            ?>
            <a href="<?php echo $fullUrl; ?>page=<?php echo (int) $this->trangHienTai - 1; ?>&total=<?php echo $this->tongMauTin; ?>" title="Trang trước"> &nbsp; < &nbsp; </a>
            <?php
        }
        for ($i = 1; $i <= 3; $i++) {
            if ($i == $this->trangHienTai) {
                echo "<b>$i</b>";
            
            } else {
                ?>
                <a href="<?php echo $fullUrl; ?>page=<?php echo $i; ?>&total=<?php echo $this->tongMauTin; ?>" title="Trang <?php echo $i; ?>"> <?php echo $i; ?> </a>
                <?php
            }
        }
        if ($this->trangHienTai + 1 <= $this->tongSoTrang) {
            ?>
            <a href="<?php echo $fullUrl; ?>page=<?php echo ($this->trangHienTai + 1); ?>&total=<?php echo $this->tongMauTin; ?>" title="Trang sau"> > </a>
            <?php
        }
        if (($this->trangHienTai != $this->tongSoTrang) && ($this->tongSoTrang != 0)) {
            ?>
            <a href="<?php echo $fullUrl; ?>page=<?php echo $this->tongSoTrang; ?>&total=<?php echo $this->tongMauTin; ?>" title="trang cuối">&nbsp; >> &nbsp;</a>
            <?php
        }
    }

}
