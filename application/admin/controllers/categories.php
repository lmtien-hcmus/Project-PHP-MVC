<?php
require 'models/m_Categories.php';

class categories extends Controller{
    
    function xuatTatCaChuyenMuc(){
        $model = new m_Categories();
        return $model->docTatCaChuyenMuc();
    }
}

