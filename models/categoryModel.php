<?php
    class categoryModel{
        public $conn;
        function __construct()
        {
            $this->conn = database();
        }
        function getListCategory(){
            return $this->conn->query("SELECT * FROM category")->fetchAll();
        }
        function getOneCategoryById($id){
            return $this->conn->query("SELECT * FROM category WHERE id=$id")->fetch();
        }
        function deleteCategoryById($id){
            return $this->conn->prepare("UPDATE category SET status=2 WHERE id=$id")->execute();
        }
        function addCategory($cateName){
            return $this->conn->prepare("INSERT INTO category(cate_name) VALUES ('$cateName')")->execute();
        }
        function updateCategory($id,$cateName){
            return $this->conn->prepare("UPDATE category SET cate_name = '$cateName' WHERE id=$id")->execute();
        }
        function undoDeleteCategory($id){
            return $this->conn->prepare("UPDATE category SET status=1 WHERE id=$id")->execute();
        }
    }
?>