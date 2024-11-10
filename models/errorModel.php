<?php
    class errorModel{
        public $conn;
        function __construct()
        {
            $this->conn = database();
        }
    }
?>