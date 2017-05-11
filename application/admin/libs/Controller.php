<?php

class Controller {

    public $title, $init, $content;

    public function __construct() {
        $this->title = "";
        $this->init = new InitDefaul();
        $this->content = '';
    }

    function View($viewname, $data = null, $layout = true, $pagination = null) {
        if ($data != null) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }
        $controller_name = get_class($this);
        if ($layout) {
            require("{$this->init->view_path}/shared/header.php");
        }

        require("{$this->init->view_path}/$controller_name/$viewname.php");

        if ($layout) {
            require("{$this->init->view_path}/shared/footer.php");
        }
        return $this->content;
    }

    function set_title_page($_title) {
        $this->title = $_title;
    }

    function redirect($url, $permanent = false) {
        if ($permanent) {
            header('HTTP/1.1 301 Moved Permanently');
        }
        header('Location: ' . $url);
        exit();
    }

}
