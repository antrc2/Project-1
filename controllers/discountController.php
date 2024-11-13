<?php
class discountController{
    public $discount;
    public $product;
    function __construct()
    {
        $this->discount = new discountModel;
        $this->product = new SanPhamModel;
    }
    function listDiscount(){
        $discounts = $this->discount->getAllDiscount();
        require_once "views/admin/discount/readDiscount.php";
    }
    function addDiscount(){
        $allProduct = $this->product->getAllSanPham();
        if (isset($_POST['btn_addDiscount'])){
            $productDetailId = $_POST['product_detail_id'];
            $discountAmount = $_POST['discountAmount'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $startPrice = $_POST['start_price'];
            $endPrice = $_POST['end_price'];
            $result = $this->discount->addDiscount($productDetailId,$discountAmount,$startDate,$endDate,$startPrice,$endPrice);
            if ($result){
                headerAfterXSecondWithSweetAlert2("?act=list-discount",1500,"success","Thêm giảm giá thành công");
            } else {
                require_once  "views/admin/discount/createDiscount.php";
                echo SweetAlert2("error","Đã xảy ra lỗi");
            }
        }
        require_once "views/admin/discount/createDiscount.php";
    }
}
?>