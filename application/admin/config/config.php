<?php

class Config {
    private $init;
    function __construct() {
        $this->init = new InitDefaul();
        $this->controller_path = $this->init->controller_path;
        $this->view_path = $this->init->view_path;
        $this->model_path = $this->init->model_path;
    }

    public function Init() {
        if(isset($_GET["controller"])){
            $controller = $_GET["controller"];
        }
        else{
            $controller = "home";
        }
        if ($controller !== "") {
            if (!file_exists("$this->controller_path/$controller.php")) {
                require("$this->controller_path/404.php");
                return;
            }

            require ("$this->controller_path/$controller.php");

            if (!class_exists($controller)) {
                require("$this->controller_path/404.php");
                return;
            }

            $c = new $controller;
            $act = isset($_GET["act"]) ? $_GET["act"] : "index";
            if (!method_exists($controller, $act)) {
                require ("$this->controller_path/404.php");
                return;
            }
            $c->$act();
        }
    }

}