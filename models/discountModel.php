<?php
    class discountModel{
        public $conn;
        function __construct()
        {
            $this->conn = database();
        }
        
        function getAllDiscount(){
            return $this->conn->query("SELECT *, discount.id AS discount_id, discount.status AS status FROM discount JOIN product_detail ON discount.product_detail_id = product_detail.id JOIN product ON product.id = product_detail.product_id")->fetchAll();
        }
        function getDiscountById($id){
            return $this->conn->query("SELECT *, discount.id AS discount_id FROM discount JOIN product_detail ON discount.product_detail_id = product_detail.id WHERE discount.id=$id")->fetch();
        }
        function getAllProductDetail(){
            return $this->conn->query("SELECT * FROM product_detail")->fetchAll();
        }
        function updateDiscount($id,$discountAmount, $startDate, $endDate, $startPrice, $endPrice){
            $startDate = dateTimeToEpochTime($startDate);
            $endDate = dateTimeToEpochTime($endDate);
            return $this->conn->prepare("UPDATE discount SET discount_amount = $discountAmount, start_date = $startDate, end_date = $endDate, start_price=$startPrice, end_price = $endPrice WHERE id=$id")->execute();
        }
        function addDiscount($productDetailId,$discountAmount,$startDate,$endDate,$startPrice,$endPrice){
            $startDate = dateTimeToEpochTime($startDate);
            $endDate = dateTimeToEpochTime($endDate);
            return $this->conn->prepare("INSERT INTO discount(product_detail_id, discount_amount, start_date, end_date, start_price, end_price) VALUES ($productDetailId, $discountAmount, $startDate,$endDate,$startPrice,$endPrice)")->execute();
        }
        function deleteDiscount($id){
            return $this->conn->prepare("UPDATE discount SET status =2 WHERE id=$id")->execute();
        }
        function undoDeleteDiscount($id){
            return $this->conn->prepare("UPDATE discount SET status =1 WHERE id=$id")->execute();
        }
    }
?>