<?php

class Reservasi
{
    // Properti private untuk encapsulation
    private $nama;
    private $email;
    private $tanggal;
    private $meja;
    private $area;

    // Constructor untuk mengisi data awal
    public function __construct($nama, $email, $tanggal, $meja, $area)
    {
        $this->nama = $nama;
        $this->email = $email;
        $this->tanggal = $tanggal;
        $this->meja = $meja;
        $this->area = $area;
    }

    // Getter untuk nama
    public function getNama()
    {
        return $this->nama;
    }

    // Setter untuk nama
    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    // Getter untuk email
    public function getEmail()
    {
        return $this->email;
    }

    // Setter untuk email
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter untuk tanggal
    public function getTanggal()
    {
        return $this->tanggal;
    }

    // Setter untuk tanggal
    public function setTanggal($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    // Getter untuk meja
    public function getMeja()
    {
        return $this->meja;
    }

    // Setter untuk meja
    public function setMeja($meja)
    {
        $this->meja = $meja;
    }

    // Getter untuk area
    public function getArea()
    {
        return $this->area;
    }

    // Setter untuk area
    public function setArea($area)
    {
        $this->area = $area;
    }

    // Magic Method __toString() untuk menampilkan ringkasan reservasi
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