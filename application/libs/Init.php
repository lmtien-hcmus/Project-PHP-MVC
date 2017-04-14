<?php
class InitDefaul{
    public $app_path, $controller_path, $view_path, $model_path, $host, $db_name, $username, $password;

    public function __construct() {
        $this->app_path = "application";
        $this->controller_path = "controllers";
        $this->view_path = "views";
        $this->model_path = "models";
        
        $this->host = "localhost";
        $this->db_name = "mvc_fashion";
        $this->username = "root";
        $this->password = "";
    }
}
    
