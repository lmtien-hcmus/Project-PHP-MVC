<?php

class m_Users extends Database{
    public $username, $password, $email, $fullName, $address, $level, $sex, $phone;
    
    function __construct() {
        $this->username = '';
        $this->password = '';
        $this->email = '';
        $this->fullName = '';
        $this->address = '';
        $this->level = 0;
        $this->phone = '';
        $this->sex = '';
    }
    function docUserThongTinLogin($username, $password){
        $username = addslashes($username);
        $username = strtolower($username);
        $password = md5($password);
        $sql = "SELECT * FROM USERS WHERE username = '$username' AND password = '$password'";
        $user = $this->Select_Row($sql);
        return $user;
    }
    function themMotUserMoi(){
        
    }
}
