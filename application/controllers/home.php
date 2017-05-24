<?php
require 'application/models/m_products.php';
class home extends Controller
{  
    public $totalcart;
    function index(){
        $products = new m_Products();
        $sanphammoi = $products->DocDsSanPhamMoi(6);
        $sanphamxemnhieu = $products->DocDsSanPhamXemNhieu(6);
        $this->set_title_page("đây là trang chủ");
        $dssanpham = array();
        if($sanphammoi != null && $sanphamxemnhieu != null){
            $dssanpham = array_merge($sanphammoi, $sanphamxemnhieu);
        } 
        return $this ->View("index", $dssanpham);
    }
}