<?php
class m_Categories extends Database{ 
    function docTatCaChuyenMuc(){
        $sql = "SELECT * FROM categories";
        return $this->SelectAll($sql);
    }
    function docChuyenMucTheoid($id){
        $sql = "SELECT * FROM Categories WHERE CatID = $id";
        $result = $this->Select_Row($sql);
        return $result;
    }
}
