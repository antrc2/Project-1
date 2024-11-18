<?php
class DonHangController{
    public $donHangModel;
    public function __construct()
    {
        $this->donHangModel = new DonHangModel();
    }
    public function danhSachDonHang(){
        require_once "./views/admin/donhang/listDonHang.php";
    }
}
?>