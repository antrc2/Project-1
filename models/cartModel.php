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
        function checkIssetProductDetailIdInCartOfUser($userId, $productDetailId){
            return $this->conn->query("SELECT * FROM cart_detail JOIN cart ON cart_detail.id = cart_detail.id WHERE user_id = $userId AND product_detail_id=$productDetailId")->fetch();
        }
        function getInformationOfCartDetailByUserIdAndProductDetailId($userId,$productDetailId){
            return $this->checkIssetProductDetailIdInCartOfUser($userId,$productDetailId);
        }
        function addAmountProductDetailToCartDetail($id,$amount){
            $time= time();
            return $this->conn->prepare("UPDATE cart_detail SET amount=$amount, updated_at= $time WHERE id=$id")->execute();
        }
        function addCartDetail(){
            
        }
    }
?>