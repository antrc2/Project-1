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
        $listLimitProduct = $this->product->getNewestProductButLimit(12);
        require_once "views/user/home/home.php";
    }
    function homee()
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
        $res = "";
        if (isset($_POST['btn_addCart'])) {
            if (isset($_SESSION['username'])) {
                $_POST['username'] = $_SESSION['username'];
                $url = "http://localhost/project-1/index.php?act=add-cart";

                // Khởi tạo cURL
                $ch = curl_init($url);

                // Cấu hình cURL
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Lấy kết quả trả về
                curl_setopt($ch, CURLOPT_POST, true); // Phương thức POST
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST)); // Gửi dữ liệu POST

                // Thực thi cURL và lấy kết quả
                // $response = curl_exec($ch);
            } else {
                $response = json_encode(['status' => false, 'message' => "Bạn chưa đăng nhập"]);
            }
            $res = json_decode($response);
        }
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
        if ($res == "") {
        } else {
            if ($res->status) {
                $icon = "success";
            } else {
                $icon = "error";
            }
            echo SweetAlert2($icon, $res->message);
        }
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
        if (!isset($_SESSION['username'])) {
            header("Location: ?act=login");
        } else {
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
                    // $cartByUserId = [];
                    header("Location: ?act=lich-su-don-hang");
                }
            };
            require_once "views/user/home/thanhtoan.php";
        }
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
    public function commen()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $comment = $_POST['comment'];
            $userInfo = $this->acc->getInformationUserByUsername($_SESSION['username']);

            $hasBought = $this->home->checkUserBoughtProduct($userInfo['id'], $id);

            if ($hasBought) {
                $result = $this->home->addComment($userInfo['id'], $id, $comment);
            }
            header("Location: ?act=chi-tiet-san-pham-khach-hang&id=$id");
        }
    }


    function lichSuDonHang()
    {
        if (isset($_SESSION['username'])) {
            // var_dump($_SESSION['user']);
            // die;
            $user = $this->acc->getInformationUserByUsername($_SESSION['username']);
            //    print_r($user);
            //     die;
            $tai_khoan_id = $user['id'];

            $donHangs = $this->home->getDonHangs($tai_khoan_id);
            require_once "views/user/home/lichsudonhang.php";
        }
    }
    function huyDonHang()
    {
        if (isset($_SESSION['username'])) {
            $user = $this->acc->getInformationUserByUsername($_SESSION['username']);
            $tai_khoan_id = $user['id'];
            $donHangId = $_GET['id'];
            $donHang = $this->home->getDonHang($donHangId);

            if ($donHang['user_id'] != $tai_khoan_id) {
                echo "Bạn không có quyền hủy đơn hàng này";
                exit();
            }
            if ($donHang['status'] != 1) {
                echo "Đơn hàng đã xác nhận không thể huỷ";
                exit();
            }

            $this->home->updateStatusBill($donHangId, 11);

            header("Location:?act=lich-su-don-hang");
        }
    }
}
