<?php
    class accountController{
        public $acc;
        function __construct()
        {
            $this->acc = new accountModel;
        }
        function login(){
            if (isset($_SESSION['username'])){
                header("Location: ?act=/");
            }
            if (isset($_POST['btn_login'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $result = $this->acc->login($username,$password);
                if ($result['status'] == True){
                    $_SESSION['username'] = $username;
                    require_once "views/account/login.php";
                    headerAfterXSecondWithSweetAlert2("?act=/",1500, "success", $result['message']);
                } else {
                    require_once "views/account/login.php";
                    echo SweetAlert2("error",$result['message']);
                }
            }
            require_once "views/account/login.php";
        }
        function register(){
            if (isset($_SESSION['username'])){
                header("Location: ?act=/");
            }
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
                    $_SESSION['username'] = $username;
                    require_once "views/account/register.php";
                    headerAfterXSecondWithSweetAlert2("?act=/",1500, "success", $result['message']);
                } else {
                    require_once "views/account/register.php";
                    echo SweetAlert2("error",$result['message']);
                }
            }
            require_once "views/account/register.php";
        }
        function logout(){
            if (isset($_SESSION['username'])){
                unset($_SESSION['username']);
                header("Location: ?act=/");
            } else {
                header("Location: ?act=login");
            }
        }
        
    }
?>