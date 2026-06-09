<?php

class Reservasi {
    private $nama;
    private $email;
    private $tanggal;
    private $meja;
    private $area;

    public function __construct($nama, $email, $tanggal, $meja, $area)
    {
        $this->nama = $nama;
        $this->email = $email;
        $this->tanggal = $tanggal;
        $this->meja = $meja;
        $this->area = $area;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTanggal()
    {
        return $this->tanggal;
    }

    public function setTanggal($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    public function getMeja()
    {
        return $this->meja;
    }

    public function setMeja($meja)
    {
        $this->meja = $meja;
    }

    public function getArea()
    {
        return $this->area;
    }

    public function setArea($area)
    {
        $this->area = $area;
    }

    public function __toString()
    {
        $dateObj = date_create($this->tanggal);
        $formattedDate = date_format($dateObj, "d F Y");

        return "Ringkasan Reservasi:\n" .
            "- Nama    : {$this->nama}\n" .
            "- Email   : {$this->email}\n" .
            "- Tanggal : {$formattedDate}\n" .
            "- Meja    : {$this->meja}\n" .
            "- Area    : {$this->area}\n";
    }
}

?>

<?php
require_once('../class/class.Mail.php');

if(isset($_POST['btnSumbit'])) {
    $inputemail = $_POST['email'];
    $objUser = new User();
    $objUser->ValidateEmail($inputemail);
    $objUser->hasil = false;
    if ($objUser->hasil) {
        echo "<script> alert('Email sudah terdaftar!'); </script>";
    }
    else {
        $objUser->email=$_POST['email'];
        $objUser->password=$_POST['password'];
        $objUser->namespace=$_POST['namespace'];
        $objUser->role=['employee'];
        $objUser->AddUser();
        if ($objUser->hasil) {
            $message = "
            <h2>Registration Successful</h2>
            <p>Thank you for registering, " . $objUser->email . "!</p>
            <p>Your account has been created successfully.</p>
            <ul>
                <li>Email: " . $objUser->email . "</li>
                <li>Namespace: " . $objUser->namespace . "</li>
                <li>Role: " . implode(", ", $objUser->role) . "</li>
            </ul>

            <p> Silah
            "
    }
}