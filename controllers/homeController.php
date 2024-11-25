<?php
class homeController
{
    public $home;
    public $product;
    public $discount;
    function __construct()
    {
        $this->home = new homeModel;
        $this->product = new SanPhamModel;
        $this->discount = new discountModel;
    }
    function home()
    {
        $limitProduct = $this->product->getNewestProductButLimit(6);
        require_once "views/user/home/home.php";
    }

    function productDetail($id)
    {
        $oneProduct = $this->product->getProductById($id);
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
                var_dump($amount);
                $discountAmount = calculatorPriceAfterDiscount($amount, $discount);
            } else {
                $isPost = false;
            }
        }
        require_once "views/user/home/chitietsanpham.php";
    }
    function gioHang()
    {
        require_once "views/user/home/giohang.php";
    }
    function thanhToan()
    {
        require_once "views/user/home/thanhtoan.php";
    }
    function sanPham()
    {
        $cate_id = $_GET['id_cate'] ?? 0;
        $products = $this->product->getAllProductByIdCate($cate_id);
        require_once "views/user/home/sanpham.php";
    }
}
