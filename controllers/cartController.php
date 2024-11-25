<?php
    class cartController{
        public $cart, $acc;
        function __construct()
        {
            $this->cart = new cartModel;
            $this->acc = new accountModel;
        }
        function addCart(){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(!isset($_SESSION['username'])){
                $_SESSION['messages'] = "Bạn chưa đăng nhập";
                $_SESSION['icon'] = "error";
                header("Location: ?act=login");
            } else {
                var_dump($_POST);
                if ($_POST['soluong'] > $_POST['amount']){
                    $_SESSION['messages'] = "Không đủ số lượng sản phẩm";
                    $_SESSION['icon'] = "error";
                    $productDetailId = $_POST['product_detail_id'];
                    $productId=$_POST['product_id'];
                    header("Location: ?act=chi-tiet-san-pham-khach-hang&id=$productId");
                } else {
                    $username = $_SESSION['username'];
                    $userInfo = $this->acc->getInformationUserByUsername($username);
                    $userId = $userInfo['id'];
                    $check = $this->cart->checkIssetCartByUserId($userId);
                    if (!$check){
                        $this->cart->addCart($userId);
                    } else {
                        // I dont know to do anything in here :((( 
                    }
                    
                }   
            }
            } else {
                header("Location: ?act=method-not-allow");    
            }
        }
    }
?>