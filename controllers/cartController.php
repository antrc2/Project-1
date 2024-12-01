<?php
    class cartController{
        public $cart, $acc, $product;
        function __construct()
        {
            $this->cart = new cartModel;
            $this->acc = new accountModel;
            $this->product = new SanPhamModel;
        }
        function addCart(){
            $limitProduct = $this->product->getNewestProductButLimit(12);
            // require_once "views/user/home/home.php";
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                var_dump($_POST);
            if(!isset($_SESSION['username'])){
                headerAfterXSecondWithSweetAlert2("?act=login",1500,"error","Bạn chưa đăng nhập");
            } else {
                $productId=$_POST['product_id'];
                $productDetailId = $_POST['product_detail_id'];
                if ($_POST['soluong'] > $_POST['amount']){
                    $_SESSION['messages'] = "Không đủ số lượng sản phẩm";
                    $_SESSION['icon'] = "error";
                } else {
                    $username = $_SESSION['username'];
                    $userInfo = $this->acc->getInformationUserByUsername($username);
                    $userId = $userInfo['id'];
                    $check = $this->cart->checkIssetCartByUserId($userId);
                    // var_dump($check);
                    if (!$check){
                        $this->cart->addCart($userId);
                    } else {
                        // I dont know to do anything in here :((( 
                    }
                    $cartInfo = $this->cart->getCartByUserId($userId);
                    // var_dump($cartInfo);
                    $price = $_POST['price'];
                    $amount = $_POST['soluong'];
                    $cartDetailId = $cartInfo['id'];
                    // var_dump($_POST);
                    if ($this->cart->checkIssetProductDetailIdInCartOfUser($userId, $productDetailId, $cartInfo)){
                        $cartDetailInfo = $this->cart->getInformationOfCartDetailByUserIdAndProductDetailId($userId,$productDetailId);
                        // var_dump($cartDetailInfo);
                        $this->cart->addAmountProductDetailToCartDetail($cartDetailId, $productDetailId, $amount, $price, $cartDetailInfo);
                        
                    } else {
                        $this->cart->addCartDetail($cartDetailId, $productDetailId, $amount, $price);
                    }
                }
                header("Location: ?act=chi-tiet-san-pham-khach-hang&id=$productId");   
            }
            } else {
                header("Location: ?act=method-not-allow");    
            }
        }
        function deleteCart(){
            if (isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                $result = $this->cart->deleteCart($username);
                if ($result){
                    $_SESSION['messages'] = "Xóa giỏ hàng thành công";
                    header("Location: ?act=gio-hang");
                    
                }
            } else {
                header("Location: ?act=login");
            }
        }
        function delete_cart($id){
            if (isset($_SESSION['username'])){
                $result = $this->cart->delete_cart($id);
                if($result){
                    $_SESSION['messages'] = "Xóa sản phẩm trong giỏ hàng thành công";
                    header("Location: ?act=gio-hang");
                }
            } else {
                header("Location: ?act=login");
            }
        }
    }
?>