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
        function addCategory($cateName, $createdAt, $update_at){
            return $this->conn->prepare("INSERT INTO category(cate_name, created_at, updated_at) VALUES ('$cateName','$createdAt' ,'$update_at')")->execute();
        }
        function updateCategory($id,$cateName, $updatedAt){
            return $this->conn->prepare("UPDATE category SET cate_name = '$cateName', updated_at=$updatedAt WHERE id=$id")->execute();
        }
        function undoDeleteCategory($id){
            return $this->conn->prepare("UPDATE category SET status=1 WHERE id=$id")->execute();
        }
    }
?>