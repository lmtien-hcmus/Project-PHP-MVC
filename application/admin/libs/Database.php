<?php

class Database {

    private $conn;

    public function __construct() {
        $this->conn = "";
    }

    function Connect() {
        $init = new InitDefaul();
        try {
            $this->conn = new PDO("mysql:host=$init->host; dbname=$init->db_name", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo "Connect Fail: " . $ex->getMessage();
        }
    }

    function Dis_connect() {
        if ($this->conn != null) {
            $this->conn = null;
        }
    }

    function Insert($sql) {
        $this->Connect();
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $inserted = $this->conn->lastInsertId();
        $this->Dis_connect();
        return $inserted;
    }

    function Update($table, $data, $where) {
        $this->Connect();
        $sql = '';
        foreach ($data as $key => $value) {
            $sql .= "$key = '" . mysql_escape_string($value) . "',";
        }
        $sql = 'UPDATE ' . $table . ' SET ' . trim($sql, ',') . ' WHERE ' . $where;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Delete($table, $where) {
        $this->connect();
        $sql = "DELETE FROM $table WHERE $where";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function SelectAll($sql) {
        $this->Connect();

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
    }

    function Select_Row($sql) {
        $this->Connect();
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            return $row;
        }
    }

}
