<?php
session_start();
require '../libs/Database.php';
require '../libs/Init.php';
require '../libs/Controller.php';

class Handle_ajax {

    function capNhatSoLuongSanPham() {
        //cập nhật số lượng sản phẩm
        if (isset($_POST["soluong"]) && isset($_POST["id"])) {
            $soLuong = $_POST["soluong"];
            $id = $_POST["id"];
            $price = $_POST["price"];
            $_SESSION['cart'][$id] = $soLuong;
            $thanhTien = ($soLuong * $price);
            echo number_format($thanhTien, 0, '.', '.');
            return;
        }
    }
    function xoaSanPham($id = null) {
        if(isset($_POST["id"])){
            $id = $_POST["id"];
        }
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
        }

        foreach ($_SESSION["cart"] as $proId => $quantity) {
            if ($proId == $id) {
                unset($_SESSION["cart"][$id]);
                echo "true";
                return;
            }
        }
        echo "false";
        return;
    }
}
$acton = "";
if(isset($_POST["action"])){
    $acton = $_POST["action"];
}
switch ($acton) {
    case "update":
        $handle = new Handle_ajax();
        $handle->capNhatSoLuongSanPham();
        break;
    case "delete":
        $handle = new Handle_ajax();
        $handle->xoaSanPham();
        break;
    default:
        break;
}
