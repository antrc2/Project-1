<?php
class thongkeController {
    public $thongke;
    public $product;
    public $category; 
    public $account;
    public $donHang;

    public function __construct() {
        $this->thongke = new thongKeModel();
        $this->product = new SanPhamModel();
        $this->category = new categoryModel();
        $this->account = new accountModel();
        $this->donHang = new donHangModel();
    }
    
    public function thongKe(){

        
    }
}
?>
