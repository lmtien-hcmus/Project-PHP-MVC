<?php
require 'application/models/m_products.php';
require 'application/libs/Pagination.php';
class products extends Controller {
    public $sanPham;
            
    function hienThiTatCaSanPham() {
        
        $page = new Pagination();
        $limit = 1;
        $page->timTongSoMauTin("ProID", "ProDucts");
        $page->tinhTongSoTrang($limit);
        $start = $page->tinhViTriBatDau($limit);
        $page->setTrangHienTai(($start/$limit)+1);
        
        
        $danhSachSanPham = $this->sanPham->docTatCaSanPham($start, $limit);
        return $this->View("hienthitatcasanpham", $danhSachSanPham, true, $page);
    }

    function hienThiSanPhamTheoLoai() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }
        $dssanpham = $this->sanPham->docSanPhamTheoLoai($id);
        return $this->View("hienthisanphamtheoloai", $dssanpham);
    }

    function hienThiSanPhamTheoNhom() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }
        $dssanpham = $this->sanPham->docSanPhamTheoNhom($id);
        return $this->View("hienthisanphamtheonhom", $dssanpham);
    }

    function hienThiChiTietSanPham() {
        if (isset($_GET["proId"])) {
            $id = $_GET["proId"];
        }
        $this->sanPham = new m_Products();
        $detail = $this->sanPham->docSanPhamTheoID($id);
        return $this->View("hienthichitietsanpham", $detail);
    }
    function hienThiSanPhamCungLoai($id){
        
    }
    function hienThiSanPhamCungNhom($id){
        
    }

}
