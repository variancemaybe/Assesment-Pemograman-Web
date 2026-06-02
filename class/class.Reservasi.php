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