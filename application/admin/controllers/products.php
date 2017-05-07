<?php

require 'models/m_Products.php';
require '../libs/HandleImages.php';
require '../libs/Library.php';

class Products extends Controller {

    function themSanPham() {
        $libs = new Libarary();
        $image = new HandleImages();
        $sanPham = new m_Products();
        if (isset($_POST["btnThemSanPham"])) {

            $sanPham->tenSanPham = $_POST["tenSanPham"];
            $sanPham->moTa = $_POST["moTaSanPham"];
            $sanPham->nhomSanPham = $_POST["nhomSanPham"];
            $sanPham->giaTien = $_POST["giaTien"];
            $sanPham->giaKhuyenMai = $_POST["giaKhuyenMai"];
            $sanPham->tenAnhDaiDien = $_FILES['anhDaiDien']['name'];
            $sanPham->noiDung = $_POST["noiDungSanPham"];

            // START Xử lý upload danh sách ảnh sản phẩm
            foreach ($_FILES['danhSachAnh']['name'] as $name => $value) {
                $name_img_products = stripslashes($_FILES['danhSachAnh']['name'][$name]);
                $baseName_products = pathinfo($name_img_products, PATHINFO_FILENAME);
                $extension_products = pathinfo($name_img_products, PATHINFO_EXTENSION);
                $source_img_products = $_FILES['danhSachAnh']['tmp_name'][$name];

                $count = 1;
                while (file_exists("../../public/images/products/large/" . $name_img_products)) {
                    $name_img_products = $baseName_products . '_' . $count . '.' . $extension_products;
                    $count++;
                }
                $path_img_products = "../../public/images/products/large/" . $name_img_products;
                move_uploaded_file($source_img_products, $path_img_products);

                //resize
                $image->load($path_img_products);
                $image->resize(85, 100);
                $image->save("../../public/images/products/small/" . $name_img_products);

                $sanPham->danhSachAnh .= $name_img_products . ',';
            }
            // END Xử lý upload danh sách ảnh sản phẩm
            //START Xử lý upload ảnh đại diện
            $dem = 1;
            $baseName_products_thumb = pathinfo($sanPham->tenAnhDaiDien, PATHINFO_FILENAME);
            $extension_products_thumb = pathinfo($sanPham->tenAnhDaiDien, PATHINFO_EXTENSION);
            while (file_exists("../../public/images/products/thumbs/" . $sanPham->tenAnhDaiDien)) {
                $sanPham->tenAnhDaiDien = $baseName_products_thumb . '_' . $dem . '.' . $extension_products_thumb;
                $dem++;
            }
            move_uploaded_file($_FILES['anhDaiDien']['tmp_name'], '../../public/images/products/thumbs/' . $sanPham->tenAnhDaiDien);
            //END Xử lý upload ảnh đại diện
            //START thêm vào Database
            $sanPham->danhSachAnh = rtrim($sanPham->danhSachAnh, ',');
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $sanPham->link = $libs->convert_string_to_link($sanPham->tenSanPham) . '-' . date('Y-m-d-His');
            $inserted_id = $sanPham->themSanPham();
        }

        return $this->View("themSanPham");
    }

}
