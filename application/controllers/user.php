<?php

require 'application/models/m_users.php';

class user extends Controller {

    public $user, $data;

    function login() {
        
        if (isset($_POST['btnLogin'])) {
            $this->user = new m_Users();
            $this->user->username = $_POST['txtUsername'];
            $this->user->password = $_POST['txtPassword'];
            if (($this->user->username && $this->user->password) !== '') {
                $this->data = $this->user->docUserThongTinLogin($this->user->username, $this->user->password);
            }
            if ($this->data != null) {
                $_SESSION['user'] = $this->data;
                $_SESSION['auth'] = 1;
                if ($this->data->Level === 1) {
                    $this->redirect("admin/");
                }
                $this->redirect("index.php");
            }
        }
        return $this->View("login", $this->data);
    }

    function register() {
        if(isset($_POST['btnRegister'])){
            $this->user = new m_Users();
            $this->user->fullName = $_POST['firstName'] . ' ' . $_POST['lastName'];
            $this->user->username = $_POST['username'];
            $this->user->password = md5($_POST['txtPassword']);
            $this->user->email = $_POST['txtEmail'];
            
        }
        return $this->View("register");
    }
}
