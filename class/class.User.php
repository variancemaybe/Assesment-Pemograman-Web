<?php

require_once("class.Connection.php");

class User extends Connection {

    private $userid = "";
    private $email = "";
    private $password = "";
    private $name = "";
    private $role = "";
    private $emp;

    public $hasil = false;
    public $message = "";

    public function __get($attribute){
        if(property_exists($this, $attribute)){
            return $this->$attribute;
        }
    }

    public function __set($attribute, $value){
        if(property_exists($this, $attribute)){
            $this->$attribute = $value;
        }
    }

    public function AddUser(){

        $sql = "INSERT INTO users(email,password,name,role)
                VALUES(
                    '$this->email',
                    '$this->password',
                    '$this->name',
                    '$this->role'
                )";

        $this->hasil = mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message = "Data berhasil ditambahkan!";
        else
            $this->message = "Data gagal ditambahkan!";
    }

    public function ValidateEmail($inputemail){

        $sql = "SELECT * FROM users
                WHERE email = '$inputemail'";

        $result = mysqli_query($this->connection, $sql);

        if(mysqli_num_rows($result) == 1){

            $this->hasil = true;

            $data = mysqli_fetch_array($result);

            $this->userid   = $data['userid'];
            $this->email    = $data['email'];
            $this->password = $data['password'];
            $this->name     = $data['name'];
            $this->role     = $data['role'];
        }
    }
}
?>