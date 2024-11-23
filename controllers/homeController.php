<?php
    class homeController{
        public $home;
        public $product;
        function __construct()
        {
            $this->home = new homeModel;
            $this->product = new SanPhamModel;
        }
        function home(){
            $limitProduct = $this->product->getNewestProductButLimit(6);
            require_once "views/user/home/home.php";
        }

        function productDetail(){
            require_once "views/user/home/chitietsanpham.php";
        }
        function gioHang(){
            require_once "views/user/home/giohang.php";
        }
        function thanhToan(){
            require_once "views/user/home/thanhtoan.php";
        }
        function sanPham(){
            $cate_id = $_GET['id_cate'] ?? 0;
            $products = $this->product->getAllProductByIdCate($cate_id);
            require_once "views/user/home/sanpham.php";
        }
    }
?>