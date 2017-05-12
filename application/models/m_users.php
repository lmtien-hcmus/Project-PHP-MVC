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
        $checkExist = "SELECT ID FROM USERS WHERE USERNAME = '$this->username' or Email = '$this->email'";
        $result = $this->Select_Row($checkExist);
        if($result != null){
            return null;
        }
        $sql = "INSERT INTO USERS(username, password, email, fullname, address, phone, sex, level) VALUE('$this->username', '$this->password', '$this->email', '$this->fullName', '$this->address', '$this->phone', '$this->sex', 0)";
        return $this->Insert($sql);
    }
}
