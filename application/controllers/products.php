<?php
require 'application/models/m_products.php';
require 'application/libs/Pagination.php';
class products extends Controller {

    function hienThiTatCaSanPham() {
        
        $page = new Pagination();
        $limit = 2;
        $page->timTongSoMauTin("ProID", "ProDucts");
        $page->tinhTongSoTrang($limit);
        $start = $page->tinhViTriBatDau($limit);
        $page->setTrangHienTai(($start/$limit)+1);
        
        $sanPham = new m_Products();
        $danhSachSanPham = $sanPham->docTatCaSanPham($start, $limit);

        return $this->View("hienthitatcasanpham", $danhSachSanPham, true, $page);
    }

    function hienThiSanPhamTheoLoai() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }
        $sp = new m_Products();
        $dssanpham = $sp->docSanPhamTheoLoai($id);
        return $this->View("hienthisanphamtheoloai", $dssanpham);
    }

    function hienThiSanPhamTheoNhom() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }
        $sp = new m_Products();
        $dssanpham = $sp->docSanPhamTheoNhom($id);
        return $this->View("hienthisanphamtheonhom", $dssanpham);
    }

    function hienThiChiTietSanPham() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }
        $sp = new m_Products();
        $detail = $sp->docSanPhamTheoID($id);
        return $this->View("hienthichitietsanpham", $detail);
    }

}
