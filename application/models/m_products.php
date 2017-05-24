<?php

class m_Products extends Database{
    
    function docTatCaSanPham($start = -1, $limit = -1){
        $sql = "SELECT * FROM Products ORDER BY ProID DESC";
        if($start >= 0 && $limit > 0){
            $sql .= " LIMIT $start, $limit";
        }
        return $this->SelectAll($sql);
    }
    
    function demSoLuongSanPham(){
        $sql = "SELECT ProID FROM Products";
        return count($this->SelectAll($sql));
    }
    
    function docSanPhamCungLoai($id, $start = -1, $limit = -1, $random = false){       
        $sql = "SELECT ProID, ProName, Price, Promotion, Images_list, Image_thumb, products.Link, Categories.CatID FROM Products, Categories, SubCategories WHERE products.SubCatID = subcategories.SubCatID AND subcategories.CatID = categories.CatID AND Categories.CatID = (SELECT  cat.CatID FROM  categories as cat, subcategories as subcat WHERE cat.CatID = subcat.CatID and subcat.SubCatID = $id)";
        
        if($random == true){
            $sql .= " ORDER BY RAND()";
        }
        if($start >= 0 && $limit > 0){
            $sql .= " LIMIT $start, $limit";
        }
        return $this->SelectAll($sql); 
    }
    function docSanPhamTheoLoai($id, $start = -1, $limit = -1, $random = false){       
        $sql = "SELECT ProID, ProName, Price, Promotion, Images_list, Image_thumb, products.Link, Categories.CatID FROM Products, Categories, SubCategories WHERE products.SubCatID = subcategories.SubCatID AND subcategories.CatID = categories.CatID AND Categories.CatID = $id ORDER BY proID DESC";
        
        if($random == true){
            $sql .= " ORDER BY RAND()";
        }
        if($start >= 0 && $limit > 0){
            $sql .= " LIMIT $start, $limit";
        }
        return $this->SelectAll($sql); 
    }
    function docSanPhamTheoNhom($id, $start = -1, $limit = -1, $random = false){
        $sql = "SELECT ProID, ProName, Price, Promotion, Images_list, Image_thumb, products.Link FROM Products, SubCategories WHERE Products.SubCatID = SubCategories.SubCatID AND subcategories.SubCatID = $id";
        if($random == true){
            $sql .= " ORDER BY RAND()";
        }
        if($start >= 0 && $limit > 0){
            $sql .= " LIMIT $start, $limit";
        }
        return $this->SelectAll($sql);
    }
    function docDsSanPhamMoi($limit = 0){
        $sql = '';
        if($limit === 0){
            $sql = "SELECT * FROM Products ORDER BY ProID DESC";
        }
        else {
            $sql = "SELECT * FROM Products ORDER BY ProID DESC LIMIT $limit";
        }
        return $this->SelectAll($sql); 
    }
    function docDsSanPhamXemNhieu($limit = 0){
        $sql = '';
        if($limit === 0){
            $sql = "SELECT * FROM Products ORDER BY View DESC";
        }
        else {
            $sql = "SELECT * FROM Products ORDER BY View DESC LIMIT $limit";
        }
        return $this->SelectAll($sql); 
    }
    function docSanPhamTheoID($id){
        $sql = "SELECT * FROM Products WHERE ProID = $id";
        return $this->Select_Row($sql);
    }
    function capNhatLuotXem($view){
        $sql = "UPDATE products set View = $view";
        
    }
    function docSanPhamTheoDsId($listID){
        $sql = "select ProID, ProName, TinyDes, FullDes, Image_thumb, Price, Promotion from products where ProID in ($listID)";
        return $this->SelectAll($sql);
    }
    
}

