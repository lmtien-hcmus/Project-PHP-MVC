<?php

include ('application/models/m_products.php');

class cart extends Controller {

    public $danhSachSanPham;

    function xemGioHang() {
        $sanPham = new m_Products();
        $listId = array();
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $proId => $soLuong) {
                $listId[] .= "'" . $proId . "'";
            }
            $strId = implode(",", $listId);
            $this->danhSachSanPham = $sanPham->docSanPhamTheoDsId($strId);
        }
        return $this->View('hienthigiohang', $this->danhSachSanPham);
    }
    
    function xoaSanPhamKhoiGioHang($id) {
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
        }

        foreach ($_SESSION["cart"] as $proId => $quantity) {
            if ($proId == $id) {
                unset($_SESSION["cart"][$id]);
                return;
            }
        }
    }

}
