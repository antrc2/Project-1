<?php
class DonHangModel{
    public $conn;
    public function __construct()
    {
        $this->conn = database();
    }
}
?>