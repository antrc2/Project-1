<?php
    class cartModel{
        public $conn;
        function __construct()
        {
            $this->conn = database();
        }
    }
?>