<?php
class homeController
{
    public $home;
    public $cart;
    public $product;
    public $discount;
    public $acc;
    public $bill;
    function __construct()
    {
        $this->home = new homeModel;
        $this->product = new SanPhamModel;
        $this->discount = new discountModel;
        $this->cart = new cartModel;
        $this->acc = new accountModel;
        $this->bill = new DonHangModel;
    }
    function home()
    {
        $limitProduct = $this->product->getNewestProductButLimit(12);
        $uniqueProducts = [];
        $seenIds = [];

        foreach ($limitProduct as $product) {
            if (!in_array($product['id'], $seenIds)) {
                $uniqueProducts[] = $product;
                $seenIds[] = $product['id'];
            }
        }
        $limitProduct = $uniqueProducts;
        require_once "views/user/home/home.php";


        // Kết quả sau khi loại bỏ id trùng nhau
    }
    function productDetail($id)
    {
        $oneProduct = $this->product->getProductById($id);
        $listBinhLuan = $this->product->getBinhLuan($id);
        $anhChitiet = $this->product->getAnhSanPham($id);
        // var_dump($oneProduct);
        // die();
        if ($oneProduct) {
            // var_dump($oneProduct);
            $detailProducts = $this->product->getAllDetailProduct($oneProduct['id']);
            if (isset($_POST['btn_detailProduct'])) {
                $isPost = true;
                $id = $_POST['id'];
                $check = $this->discount->getDiscountProductDetailId($id);
                if ($check) {
                    $variant = $this->product->getDetailProductById($id);
                    if ($variant['start_date'] < time() & $variant['end_date'] >= time()) {
                        $discount = $variant['discount_amount'];
                    } else {
                        $discount = 0;
                    }
                    if ($variant['start_price'] < $variant['price']) {
                        if ($variant['end_price'] <= $variant['price']) {
                            $amount = $variant['end_price'];
                        } else {
                            $amount = $variant['price'];
                        }
                    } else {
                        $amount = 0;
                    }
                } else {
                    $variant = $this->product->getDetailProductByIdButWithoutDiscount($id);
                    $amount = $variant['price'];
                    $discount = 0;
                }
                $discountAmount = calculatorPriceAfterDiscount($amount, $discount);
            } else {
                $isPost = false;
            }
        }
        require_once "views/user/home/chitietsanpham.php";
    }
    function gioHang()
    {
        if (!isset($_SESSION['username'])) {
            require_once "views/user/home/giohang.php";
            headerAfterXSecondWithSweetAlert2("?act=login", 1500, "error", "Bạn chưa đăng nhập");
        } else {
            $userInfo = $this->acc->getInformationUserByUsername($_SESSION['username']);
            $cartByUserId = $this->cart->getCartByUserId($userInfo['id']);
            if (empty($cartByUserId)) {
                $cartDetailByCartId = [];
            } else {
                $cartDetailByCartId = $this->cart->getCartDetailById($cartByUserId['id']);
            }

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $cartDetailId = $_POST['cart_detail_id'];
                $productDetailId = $_POST['product_detail_id'];
                $amount = $_POST['quantity'];
                $productDetail = $this->product->getDetailProductByProductDetailId($productDetailId);
                if ($amount > $productDetail['amount']) {
                    $productDetailAmount = $productDetail['amount'];
                    require_once "views/user/home/giohang.php";
                    echo SweetAlert2("error", "Sản phẩm $name có giá là $price không đủ số lượng ($productDetailAmount)");
                } else {
                    $result = $this->cart->setAmountProductDetailToCartDetailById($cartDetailId, $amount);
                }
            }
            if (empty($cartByUserId)) {
                $cartDetailByCartId = [];
            } else {
                $cartDetailByCartId = $this->cart->getCartDetailById($cartByUserId['id']);
            }
            require_once "views/user/home/giohang.php";
        }
    }
    function thanhToan()
    {

        $userInfo = $this->acc->getInformationUserByUsername($_SESSION['username']);
        $cartByUserId = $this->cart->getCartByUserId($userInfo['id']);
        if (empty($cartByUserId)) {
            $cartDetailByCartId = [];
        } else {
            $cartDetailByCartId = $this->cart->getCartDetailById($cartByUserId['id']);
        }
        $total = 0;
        foreach ($cartDetailByCartId as $value) {
            $total += $value['cart_detail_price'] * $value['cart_detail_amount'];
        }
        if (isset($_POST['btn_checkout'])) {
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $payMethod = $_POST['httt_ma'];
            // $this->bill->addOrUpdateBillByUserId($userInfo['id'], $fullname, $address, $phone, $total);
            $count = 0;
            // var_dump($cartDetailByCartId);
            foreach ($cartDetailByCartId as $cart) {
                // var_dump($cart['product_detail_id']);
                // var_dump($cartDetailByCartId);
                $detailProduct = $this->product->getDetailProductByProductDetailId($cart['product_detail_id']);
                // var_dump($detailProduct['amount']);
                if ($cart['cart_detail_amount'] > $detailProduct['amount']) {
                    $count++;
                    $name = $detailProduct['name'];
                    $price = $detailProduct['price'];
                    $amount = $detailProduct['amount'];
                    require_once "views/user/home/thanhtoan.php";
                    echo SweetAlert2("error", "Sản phẩm $name có giá là $price không đủ số lượng ($amount)");
                    break;
                }
            }
            if ($count == 0) {
                $this->bill->fromCartDetailToBillDetail($userInfo['id'], $fullname, $address, $phone, $total, $cartDetailByCartId);
                $this->cart->deleteCart($_SESSION['username']);
                $cartByUserId = [];
            }
        }
        ;
        require_once "views/user/home/thanhtoan.php";
    }
    function lienHe()
    {
        require_once "views/user/home/lienhe.php";
    }
    function sanPham()
    {
        $cate_id = $_GET['id_cate'] ?? 0;
        $products = $this->product->getAllProductByIdCate($cate_id);
        require_once "views/user/home/sanpham.php";
    }
    public function commen() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $comment = $_POST['comment'];
            $userInfo = $this->acc->getInformationUserByUsername($_SESSION['username']);
        
            $hasBought = $this->home->checkUserBoughtProduct($userInfo['id'], $id);
            
            if($hasBought) {
                $result = $this->home->addComment($userInfo['id'], $id, $comment);
            } 
            header("Location: ?act=chi-tiet-san-pham-khach-hang&id=$id");
           
        }
    }
  
    
    
}
