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
    
    function getTrangHienTai(){
        return $this->trangHienTai;
    }
    
    function setTrangHienTai($trang){
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

}
