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
            $this->user->username = $_POST['txtUsername'];
            $this->user->password = md5($_POST['txtPassword']);
            $this->user->email = $_POST['txtEmail'];
            $this->user->address = $_POST['txtAddress'];
            $this->user->phone = $_POST['txtPhone'];
            $this->user->sex = $_POST['rdSex'];
            if($this->user->sex === 1){
                $this->user->sex = 'Nam';
            }
            else{
                $this->user->sex = 'Nữ';
            }
            $this->data = $this->user->themMotUserMoi();
            if($this->data != null){
                $this->redirect('index.php?con=user&act=login&receive=1#login');
            }
        }
        return $this->View("register", $this->data);
    }
}
