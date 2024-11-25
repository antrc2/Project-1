<?php
    class errorController{
        public $error;
        function __construct()
        {
            $this->error = new errorModel;
        }
        function notFound(){
            require_once "views/user/error/404.php";
        }
        function forbidden(){
            
        }
    }
?>