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

    public function __get($attribute) {
        if (property_exists($this, $attribute)) {
            return $this->$attribute;
        }
    }

    public function __set($attribute, $value) {
        if (property_exists($this, $attribute)) {
            $this->$attribute = $value;
        }
    }

    public function AddUser() {
        $sql = "INSERT INTO users(email, password, name, role)
                VALUES(
                    '$this->email',
                    '$this->password',
                    '$this->name',
                    '$this->role'
                )";
        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = "Data berhasil ditambahkan!";
        else
            $this->message = "Data gagal ditambahkan!";
    }

    public function ValidateEmail($inputemail) {
        $sql = "SELECT * FROM users WHERE email = '$inputemail'";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) == 1) {
            $this->hasil = true;
            $data = mysqli_fetch_array($result);
            $this->userid   = $data['userid'];
            $this->email    = $data['email'];
            $this->password = $data['password'];
            $this->name     = $data['name'];
            $this->role     = $data['role'];
        }
    }

    // ---- Method tambahan untuk Admin Dashboard ----

    public function getAllUsers() {
        $sql = "SELECT * FROM users ORDER BY userid ASC";
        $result = mysqli_query($this->connection, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getUserById($userid) {
        $sql = "SELECT * FROM users WHERE userid = '$userid'";
        $result = mysqli_query($this->connection, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function updateUser($userid, $name, $email, $password, $role) {
        $sql = "UPDATE users SET name='$name', email='$email', password='$password', role='$role'
                WHERE userid='$userid'";
        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil)
            $this->message = "Data berhasil diupdate!";
        else
            $this->message = "Data gagal diupdate!";
    }

    public function deleteUser($userid) {
        $sql = "DELETE FROM users WHERE userid='$userid'";
        return mysqli_query($this->connection, $sql);
    }

    public function emailExists($email, $excludeId = null) {
        if ($excludeId) {
            $sql = "SELECT userid FROM users WHERE email='$email' AND userid!='$excludeId'";
        } else {
            $sql = "SELECT userid FROM users WHERE email='$email'";
        }
        $result = mysqli_query($this->connection, $sql);
        return mysqli_num_rows($result) > 0;
    }
}
?>