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
                $productDetailId = $_POST['product_detail_id'];
                if ($_POST['soluong'] > $_POST['amount']){
                    $_SESSION['messages'] = "Không đủ số lượng sản phẩm";
                    $_SESSION['icon'] = "error";
                    
                    $productId=$_POST['product_id'];
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
                    $cartInfo = $this->cart->getCartByUserId($userId);
                    $price = $_POST['price'];
                    $amount = $_POST['soluong'];
                    $cartId = $cartInfo['id'];
                    if ($this->cart->checkIssetProductDetailIdInCartOfUser($userId, $productDetailId)){
                        $cartDetailInfo = $this->cart->getInformationOfCartDetailByUserIdAndProductDetailId($userId,$productDetailId);
                        $this->cart->addAmountProductDetailToCartDetail($cartId, $productDetailId, $amount, $price, $cartDetailInfo);
                        
                    } else {
                        $this->cart->addCartDetail($cartId, $productDetailId, $amount, $price);
                    }
                }
                header("Location: ?act=chi-tiet-san-pham-khach-hang&id=$productId");   
            }
            } else {
                header("Location: ?act=method-not-allow");    
            }
        }
    }
?>