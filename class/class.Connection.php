<?php

class Connection {

    protected $connection;

    public function __construct() {

        $this->connection = mysqli_connect(
            "localhost",
            "root",
            "",
            "employee"
        );

        if (!$this->connection) {
            die("Koneksi gagal : " . mysqli_connect_error());
        }
    }
}