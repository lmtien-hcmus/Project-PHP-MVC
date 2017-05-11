<?php
require 'application/models/m_products.php';
require 'application/libs/Pagination.php';
class products extends Controller {
    public $sanPham, $page, $start, $limit = 9;
            
    function hienThiTatCaSanPham() {
        $this->sanPham = new m_Products();
        $this->page = new Pagination();
        $this->page->timTongSoMauTin("ProID", "ProDucts");
        $this->page->tinhTongSoTrang($this->limit);
        $this->start = $this->page->tinhViTriBatDau($this->limit);
        $this->page->setTrangHienTai(($this->start/ $this->limit)+1);
        
        if(($this->page->getTongMauTin() || $this->page->getTongSoTrang()) == 0){
            $danhSachSanPham = $this->sanPham->docTatCaSanPham();
        }else{
            $danhSachSanPham = $this->sanPham->docTatCaSanPham($this->start, $this->limit);
        }
        
        return $this->View("hienthitatcasanpham", $danhSachSanPham, true, $this->page);
    }

    function hienThiSanPhamTheoLoai() {
        $this->sanPham = new m_Products();
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }
        $this->page = new Pagination();
        $this->page->timTongSoMauTin("Products.ProID", "Products, SubCategories, Categories", "Products.SubCatID = subcategories.SubCatID AND subcategories.CatID = categories.CatID AND subcategories.SubCatID = $id");
        $this->page->tinhTongSoTrang($this->limit);
        $this->start = $this->page->tinhViTriBatDau($this->limit);
        $this->page->setTrangHienTai(($this->start/ $this->limit)+1);
        if(($this->page->getTongMauTin() || $this->page->getTongSoTrang()) == 0){
            $dsSanPham = $this->sanPham->docSanPhamTheoLoai($id);
        }else{
            $dsSanPham = $this->sanPham->docSanPhamTheoLoai($id, $this->start, $this->limit);
        }
        
        return $this->View("hienthisanphamtheoloai", $dsSanPham, true, $this->page);
    }

    function hienThiSanPhamTheoNhom() {
        $this->sanPham = new m_Products();
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }
        $this->page = new Pagination();
        $this->page->timTongSoMauTin("Products.ProID", "Products, SubCategories", "Products.SubCatID = subcategories.SubCatID AND subcategories.SubCatID = $id");
        $this->page->tinhTongSoTrang($this->limit);
        $this->start = $this->page->tinhViTriBatDau($this->limit);
        $this->page->setTrangHienTai(($this->start/ $this->limit)+1);
        if(($this->page->getTongMauTin() || $this->page->getTongSoTrang()) == 0){
            $dsSanPham = $this->sanPham->docSanPhamTheoNhom($id);
        }else{
            $dsSanPham = $this->sanPham->docSanPhamTheoNhom($id, $this->start, $this->limit);
        }
        
        return $this->View("hienthisanphamtheonhom", $dsSanPham, true, $this->page);
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
        $this->sanPham = new m_Products();
        $sanPhamCungLoai = $this->sanPham->docSanPhamTheoLoai($id, 0, 4, true);
        return $sanPhamCungLoai;
    }
    function hienThiSanPhamCungNhom($id){
        $this->sanPham = new m_Products();
        $sanPhamCungNhom = $this->sanPham->docSanPhamTheoNhom($id, 0, 4, true);
        return $sanPhamCungNhom;
    }
}
