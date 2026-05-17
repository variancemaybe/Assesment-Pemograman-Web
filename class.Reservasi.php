<?php

class Reservasi
{
    // Properti private buat encapsulation
    private $nama;
    private $email;
    private $tanggal;
    private $meja;
    private $area;

    // Constructor buat mengisi data awal
    public function __construct($nama, $email, $tanggal, $meja, $area)
    {
        $this->nama = $nama;
        $this->email = $email;
        $this->tanggal = $tanggal;
        $this->meja = $meja;
        $this->area = $area;
    }

    // Getter buat nama
    public function getNama()
    {
        return $this->nama;
    }

    // Setter buat nama
    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    // Getter buat email
    public function getEmail()
    {
        return $this->email;
    }

    // Setter buat email
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter buat tanggal
    public function getTanggal()
    {
        return $this->tanggal;
    }

    // Setter buat tanggal
    public function setTanggal($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    // Getter buat meja
    public function getMeja()
    {
        return $this->meja;
    }

    // Setter buat meja
    public function setMeja($meja)
    {
        $this->meja = $meja;
    }

    // Getter buat area
    public function getArea()
    {
        return $this->area;
    }

    // Setter buat area
    public function setArea($area)
    {
        $this->area = $area;
    }

    // Magic Method __toString() buat nampilin ringkasan reservasi
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
