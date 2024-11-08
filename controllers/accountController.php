<?php
    class accountController{
        public $acc;
        function __construct()
        {
            $this->acc = new accountModel;
        }
        function login(){
            if (isset($_POST['btn_login'])){
                $usernameOrEmail = $_POST['usernameOrEmail'];
                $password = $_POST['password'];
                $result = $this->acc->login($usernameOrEmail,$password);
                if ($result['status'] == True){
                    // echo SweetAlert2("success",$result['message']);
                    require_once "views/account/login.php";
                    headerAfterXSecondWithSweetAlert2("?act=/",1000, "success", $result['message']);
                } else {
                    require_once "views/account/login.php";
                    echo SweetAlert2("error",$result['message']);
                }
            }
            require_once "views/account/login.php";
        }
        function register(){
            if (isset($_POST['btn_register'])){
                var_dump($_POST);
                $username = $_POST['username'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $created_at = time();
                $result = $this->acc->register($username, $fullname, $email, $password, $address, $phone, $created_at);
                if ($result['status'] == True){
                    require_once "views/account/register.php";
                    headerAfterXSecondWithSweetAlert2("?act=/",1000, "success", $result['message']);
                } else {
                    require_once "views/account/register.php";
                    echo SweetAlert2("error",$result['message']);
                }
            }
            require_once "views/account/register.php";
        }
        
    }
?>