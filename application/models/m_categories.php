<?php
class m_Categories extends Database{
    //user
    function docDsChuyenMuc(){
        $sql = "SELECT * FROM Categories";
        $result = $this->SelectAll($sql);
        return $result;
    }
    function docChuyenMucTheoid($id){
        $sql = "SELECT * FROM Categories WHERE CatID = $id";
        $result = $this->Select_Row($sql);
        return $result;
    }
}