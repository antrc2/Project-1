<?php
    class cartModel{
        public $conn;
        function __construct()
        {
            $this->conn = database();
        }
        function checkIssetCartByUserId($id){
            return $this->conn->query("SELECT * FROM cart WHERE user_id=$id")->fetch();
        }
        function addCart($userId){
            $time = time();
            return $this->conn->prepare("INSERT INTO cart(user_id, created_at, updated_at) VALUES($userId,$time,$time)")->execute();
        }
        function getCartByUserId($userId){
            return $this->checkIssetCartByUserId($userId);
        }
    }
?>