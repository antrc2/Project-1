<?php
    class homeController{
        public $home;
        function __construct()
        {
            $this->home = new homeModel;
        }
        function home(){
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
    }
?>