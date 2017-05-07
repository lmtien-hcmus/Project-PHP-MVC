<?php
require '../libs/Database.php';
require '../libs/Init.php';
require '../libs/Controller.php';

class Handle_Ajax extends Database{
    function getListSubcategories($id = 1){
        if(isset($_POST["action"]) && $_POST["action"] == "getSubcategories"){
            $id = $_POST["id"];
        }
        $sql = "SELECT * FROM subcategories WHERE CatID = $id";
        return $this->SelectAll($sql);
    }
}

$acton = "";
if(isset($_POST["action"])){
    $acton = $_POST["action"];
}
switch ($acton) {
    case "getSubcategories":
        $handle = new Handle_Ajax();
        $sub = $handle->getListSubcategories();
        echo json_encode($sub, JSON_UNESCAPED_UNICODE);
        break;
    default:
        break;
}


