<?php
class m_Subcategories extends Database{
    function docTatCaSubCategories(){
        $sql = "SELECT * FROM subcategories";
        return $this->SelectAll($sql);
    }
    function docSubCategoriesTheoID($id){
        $sql = "SELECT * FROM subcategories WHERE SubCatID = $id";
        return $this->SelectAll($sql);
    }
}

