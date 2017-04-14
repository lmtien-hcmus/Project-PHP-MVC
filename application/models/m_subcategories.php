<?php
class m_Subcategories extends Database{
    
    function docDsChuyenMucCon(){
        $sql = "SELECT * FROM Subcategories";
        $result = $this->SelectAll($sql);
        return $result;
    }
    function docDsChuyenMucConTheoIDCha($id){
        $sql = "SELECT * FROM Subcategories WHERE CatID = $id";
        $result = $this->SelectAll($sql);
        return $result;
    }
    function docDsChuyenMucConTheoID($id){
        $sql = "SELECT * FROM Subcategories WHERE SubCatID = $id";
        $result = $this->Select_Row($sql);
        return $result;
    }
}
