<?php
class Baza {
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "olimpijada");

        if ($this->conn->connect_error) {
            die("Greška pri povezivanju: " . $this->conn->connect_error);
        }
    }
}
?>


