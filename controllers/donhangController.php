<?php
class DonHangController
{
    public $donHangModel, $cart, $product;
    public function __construct()
    {
        $this->donHangModel = new DonHangModel();
        $this->cart = new cartModel;
        $this->product = new SanPhamModel;
    }
    public function danhSachDonHang()
    {
        $listDonHang = $this->donHangModel->getAllDonHang();
        require_once "./views/admin/donhang/listDonHang.php";
    }
    public function chiTietDonHang()
    {
        $id_don_hang = $_GET['id_don_hang'];
        $listChiTietDonHang = $this->donHangModel->getChiTietDonHang($id_don_hang);
        $listDonHang = $this->donHangModel->getOneDonHang($id_don_hang);

        $sanPhamDonHang  = $this->donHangModel->getDonHang($id_don_hang);
        // var_dump($sanPhamDonHang);
        $listTrangThaiDonHang = $this->donHangModel->getAllTrangThaiDonHang();
        require_once "./views/admin/donhang/chiTietDonHang.php";
    }
    public function fromsuaDonHang()
    {
        $id_don_hang = $_POST['id'] ?? "";
        $status = $_POST['status'] ?? "";
        $this->donHangModel->updateDonHang($id_don_hang, $status);
        header("Location: index.php?act=chi-tiet-don-hang&id_don_hang=" . $id_don_hang);
        exit();
    }
    function callbackOrder()
    {
        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data, true);
        // echo json_encode($messages);
        $result = $this->donHangModel->callbackOrder($data);
        echo json_encode($result);
    }
    function statistic()
    {
        $rams = $this->product->getAllRam();
        $colors = $this->product->getAllColor();
        if (isset($_POST['btn_search'])) {
            $fullname = $_POST['fullname'];
            $buyFrom = $_POST['buy-from'];
            $buyTo = $_POST['buy-to'];
            $nameProduct = $_POST['name-product'];
            $priceFrom = $_POST['price-from'];
            $priceTo = $_POST['price-to'];
            $amountFrom = $_POST['amount-from'];
            $amountTo = $_POST['amount-to'];
            $totalFrom = $_POST['total-from'];
            $totalTo = $_POST['total-to'];
            $maDonHang = $_POST['ma_don_hang'];
            $ram = $_POST['ram'];
            $color = $_POST['color'];
            $statistics = $this->donHangModel->statistic($fullname,$buyFrom,$buyTo,$nameProduct,$priceFrom,$priceTo,$amountFrom,$amountTo,$totalFrom,$totalTo,$maDonHang,$ram,$color);
        } else {
            $statistics = $this->donHangModel->statistic();
        }
        // var_dump($statistics);
        require_once "views/admin/donhang/statistic.php";
    }
}
