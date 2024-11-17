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
        $allDiscount = $this->discount->getAllDiscount();
        if (isset($_POST['btn_addDiscount'])){
            $productDetailId = (int)$_POST['product_detail_id'];
            $discountAmount = (int)$_POST['discountAmount'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $startPrice = (int)$_POST['start_price'];
            $endPrice = (int)$_POST['end_price'];
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
    function updateDiscount($id){
        $discount = $this->discount->getDiscountById((int)$id);
        if (isset($_POST['btn_updateDiscount'])){
            $discountAmount = (int)$_POST['discountAmount'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $startPrice = (int)$_POST['start_price'];
            $endPrice = (int)$_POST['end_price'];
            $result = $this->discount->updateDiscount($id,$discountAmount, $startDate, $endDate, $startPrice, $endPrice);
            if ($result){
                headerAfterXSecondWithSweetAlert2("?act=list-discount",1500,"success","Sửa giảm giá thành công");
            } else {
                require_once  "views/admin/discount/updateDiscount.php";
                echo SweetAlert2("error","Đã xảy ra lỗi");
            }
        }
        require_once "views/admin/discount/updateDiscount.php";
    }
    function deleteDiscount($id){
        $result = $this->discount->deleteDiscount($id);
        var_dump($result);
        if ($result){
            header("Location: ?act=list-discount");
        } else {
            echo SweetAlert2("error","Đã có lỗi xảy ra");
        }
    }
    function undoDeleteDiscount($id){
        $result = $this->discount->undoDeleteDiscount($id);
        if ($result){
            header("Location: ?act=list-discount");
        } else {
            echo SweetAlert2("error","Đã có lỗi xảy ra");
        }
    }
}
?>