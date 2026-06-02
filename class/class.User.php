<?php
require_once(__DIR__ . '/class.Connection.php');

class User extends Connection {
    private $userid = 0;
    private $email = '';
    private $password = '';
    private $name = '';
    private $role = '';

    public $hasil = false;
    public $message = '';

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
        $emailEscaped = mysqli_real_escape_string($this->connection, $this->email);
        $passwordEscaped = mysqli_real_escape_string($this->connection, $this->password);
        $nameEscaped = mysqli_real_escape_string($this->connection, $this->name);
        $roleEscaped = mysqli_real_escape_string($this->connection, $this->role);

        $sql = "INSERT INTO user (email, password, name, role)
                VALUES ('$emailEscaped', '$passwordEscaped', '$nameEscaped', '$roleEscaped')";
        $this->hasil = mysqli_query($this->connection, $sql);
        
        if($this->hasil) {
            $this->message = 'User berhasil ditambahkan!';
        } else {
            $this->message = 'User gagal ditambahkan!';
        }
    }

    public function UpdateUser() {
        $useridEscaped = mysqli_real_escape_string($this->connection, $this->userid);
        $emailEscaped = mysqli_real_escape_string($this->connection, $this->email);
        $nameEscaped = mysqli_real_escape_string($this->connection, $this->name);
        $roleEscaped = mysqli_real_escape_string($this->connection, $this->role);

        // Update password only if a new one is set
        if (!empty($this->password)) {
            $passwordEscaped = mysqli_real_escape_string($this->connection, $this->password);
            $sql = "UPDATE user 
                    SET email = '$emailEscaped', name = '$nameEscaped', role = '$roleEscaped', password = '$passwordEscaped'
                    WHERE userid = '$useridEscaped'";
        } else {
            $sql = "UPDATE user 
                    SET email = '$emailEscaped', name = '$nameEscaped', role = '$roleEscaped'
                    WHERE userid = '$useridEscaped'";
        }

        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil) {
            $this->message = 'User berhasil diubah!';
        } else {
            $this->message = 'User gagal diubah!';
        }
    }

    public function DeleteUser() {
        $useridEscaped = mysqli_real_escape_string($this->connection, $this->userid);
        $sql = "DELETE FROM user WHERE userid = '$useridEscaped'";
        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil) {
            $this->message = 'User berhasil dihapus!';
        } else {
            $this->message = 'User gagal dihapus!';
        }
    }

    public function SelectAllUser(): array {
        $sql = "SELECT * FROM user ORDER BY name";
        $result = mysqli_query($this->connection, $sql);
        $arrResult = array();
        $count = 0;
        if ($result && mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_array($result)) {
                $objUser = new User();
                $objUser->userid = $data['userid'];
                $objUser->email = $data['email'];
                $objUser->password = $data['password'];
                $objUser->name = $data['name'];
                $objUser->role = $data['role'];
                $arrResult[$count] = $objUser;
                $count++;
            }
        }
        return $arrResult;
    }

    public function SelectOneUser() {
        $useridEscaped = mysqli_real_escape_string($this->connection, $this->userid);
        $sql = "SELECT * FROM user WHERE userid = '$useridEscaped'";
        $resultOne = mysqli_query($this->connection, $sql);
        if ($resultOne && mysqli_num_rows($resultOne) == 1) {
            $this->hasil = true;
            $data = mysqli_fetch_assoc($resultOne);
            $this->userid = $data['userid'];
            $this->email = $data['email'];
            $this->password = $data['password'];
            $this->name = $data['name'];
            $this->role = $data['role'];
        }
    }

    public function ValidateEmail($inputemail) {
        $emailEscaped = mysqli_real_escape_string($this->connection, $inputemail);
        $sql = "SELECT * FROM user WHERE email = '$emailEscaped'";
        $result = mysqli_query($this->connection, $sql);
        
        if ($result && mysqli_num_rows($result) == 1) {
            $this->hasil = true;
            $data = mysqli_fetch_assoc($result);
            $this->userid = $data['userid'];
            $this->password = $data['password'];
            $this->name = $data['name'];
            $this->email = $data['email'];
            $this->role = $data['role'];
        } else {
            $this->hasil = false;
        }
    }
}
?>
