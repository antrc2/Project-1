<?php
    class categoryController{
        public $category;
        function __construct()
        {
            $this->category = new categoryModel;
        }
        function listCategory(){
            $categories = $this->category->getListCategory();
            require_once "views/admin/category/readCategory.php";
        }
        function addCategory(){
            if (isset($_POST['btn_addCategory'])){
                $cateName = $_POST['cate_name'];
                $createdAt = time();
                $update_at = time();
                $result = $this->category->addCategory($cateName, $createdAt ,$update_at);
                if($result){
                    header("Location: ?act=list-category");
                } else {

                }
            }
            require_once "views/admin/category/createCategory.php";
        }
        function updateCategory($id){
            $category = $this->category->getOneCategoryById($id);
            if (isset($_POST['btn_updateCategory'])){
                $cateName = $_POST['cate_name'];
                $updatedAt = time();
                $result = $this->category->updateCategory($id,$cateName, $updatedAt);
                if ($result){
                    header("Location: ?act=list-category");
                } else {

                }
            }
            require_once "views/admin/category/updateCategory.php";
        }
        function deleteCategory($id){
            $result = $this->category->deleteCategoryById($id);
            if ($result){
                header("Location: ?act=list-category");
            } else {

            }
        }
        function undoDeleteCategory($id){
            $result = $this->category->undoDeleteCategory($id);
            if ($result){
                header("Location: ?act=list-category");
            } else {

            }
        }
    }
?>