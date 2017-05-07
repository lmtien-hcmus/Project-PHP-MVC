<?php

class m_Products extends Database {

    public $tenSanPham, $moTa, $noiDung, $loaiSanPham, $nhomSanPham, $giaTien, 
           $giaKhuyenMai, $tenAnhDaiDien, $danhSachAnh, $link ;
    function __construct() {
        $this->tenSanPham = '';
        $this->moTa = '';
        $this->noiDung = '';
        $this->loaiSanPham = '';
        $this->nhomSanPham = '';
        $this->giaTien = '';
        $this->giaKhuyenMai = '';
        $this->tenAnhDaiDien = '';
        $this->danhSachAnh = '';
    }

    function themSanPham() {
        $sql = "INSERT INTO Products (ProName, SubCatID, TinyDes, FullDes, Price , Promotion, Link, Image_thumb, Images_list, Stop_business) VALUE ('$this->tenSanPham', $this->nhomSanPham, '$this->moTa', '$this->noiDung', $this->giaTien, $this->giaKhuyenMai, '$this->link', '$this->tenAnhDaiDien', '$this->danhSachAnh', 0)";
        return $this->Insert($sql);
    }

}
