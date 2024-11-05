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
    }
?>