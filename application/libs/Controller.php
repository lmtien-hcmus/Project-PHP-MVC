<?php
class Controller {

    public $title;
    public $init;
    public $modelPartial;
    public function __construct() {
        $this->title = "";
        $this->init = new InitDefaul();
        $this->modelPartial = '';
    }

    function View($viewname, $data = null, $layout = true, $pagination = null) {
        if ($data != null && is_array($data) === true) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }
        $controller_name = get_class($this);
        if ($layout) {
            require("{$this->init->app_path}/{$this->init->view_path}/shared/header.php");
        }
        
        require("{$this->init->app_path}/{$this->init->view_path}/$controller_name/$viewname.php");

        if ($layout) {
            require("{$this->init->app_path}/{$this->init->view_path}/shared/footer.php");
        }
    }
    function set_title_page($_title){
        $this->title = $_title;
    }
    function PartialView($Model = null){
        return $this->modelPartial;
    }

}
