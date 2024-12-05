<?php
class DonHangModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = database();
    }

    function getBillByUserId($userId)
    {
        return $this->conn->query("SELECT * FROM bill WHERE status =1 and user_id = $userId")->fetch();
    }
    function addOrUpdateBillByUserId($userId, $fullname, $address, $phone, $total)
    {
        $checkIssetBill = $this->getBillByUserId($userId);
        $time = time();
        if ($checkIssetBill) {
            return $this->conn->prepare("UPDATE bill SET fullname_recieved = '$fullname', address_recieved = '$address', phone_reciedved='$phone', created_at = $time, total = $total WHERE user_id = $userId")->execute();
        } else {
            return $this->conn->prepare("INSERT INTO bill (user_id, fullname_recieved, address_recieved, phone_reciedved, created_at, total) VALUES ($userId, '$fullname','$address','$phone',$time, $total)")->execute();
        }
    }
    function getNewestBillByUserId($userId)
    {
        return $this->conn->query("SELECT * FROM bill WHERE user_id = $userId ORDER BY id DESC ")->fetch();
    }
    function fromCartDetailToBillDetail($userId, $fullname, $address, $phone, $total, $carts, $status = 1)
    {
        $time = time();
        $this->conn->prepare("INSERT INTO bill (user_id, fullname_recieved, address_recieved, phone_reciedved, created_at, total,status, ma_don_hang) VALUES ($userId, '$fullname','$address','$phone',$time, $total,$status, 'hehe')")->execute();
        $newestBill = $this->getNewestBillByUserId($userId);
        // var_dump($newestBill);
        $newestBillid = $newestBill['id'];
        $ma_don_hang = "DH_" . $newestBillid;
        $this->conn->prepare("UPDATE bill SET ma_don_hang='$ma_don_hang' WHERE id=$newestBillid")->execute();
        $result = $this->conn->query("SELECT * from bill WHERE user_id = $userId ORDER BY id DESC ")->fetch();
        $billId = $result['id'];
        foreach ($carts as $cart) {
            $productDetailid = $cart['product_detail_id'];
            $amount = $cart['cart_detail_amount'];
            $price = $cart['cart_detail_price'];
            $thanh_tien = $amount * $price;
            $this->conn->prepare("UPDATE product_detail SET amount = amount - $amount WHERE id=$productDetailid")->execute();
            $this->conn->prepare("INSERT INTO bill_detail(bill_id, product_detail_id, so_luong, thanh_tien) VALUES ($billId, $productDetailid, $amount, $thanh_tien)")->execute();
        }
        return;
    }
    function callbackOrder($data)
    {
        $message = $data['addDescription'];
        $messages = explode(" ", $message);
        $money = $data['creditAmount'];
        foreach ($messages as $message) {
            if ($message != "") {
                $ma_don_hang = "DH_".$message;
                $result = $this->conn->query("SELECT * FROM bill WHERE ma_don_hang = '$ma_don_hang' and status=0")->fetch();
                if ($result) {
                    if ($money >= $result['total']) {
                        $id = $result['id'];
                        $output = $this->conn->query("UPDATE bill SET status=1 WHERE id=$id")->execute();
                        return ['status' => true, 'message' => "Đơn hàng $ma_don_hang đã thanh toán thành công"];
                    } else {
                        return ['status' => false, 'message' => "Đơn hàng $ma_don_hang thanh toán thất bại vì thiếu tiền"];
                    }
                }
            }
        }
        return ['status' => false, 'message' => "Không có đơn hàng nào được thanh toán thành công"];
    }
    public function getAllDonHang()
    {

        $sql = "SELECT bill.*,trang_thai_don_hang.ten_trang_thai 
        from bill
        JOIN trang_thai_don_hang on bill.status = trang_thai_don_hang.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getChiTietDonHang($id_don_hang)
    {
        $sql = "SELECT * from bill
        join account on bill.user_id = account.id
        join trang_thai_don_hang on bill.status = trang_thai_don_hang.id
         WHERE bill.id = $id_don_hang";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    // public function getDonHang($id_don_hang){
    //     $sql = "SELECT * from bill_detail
    //     join product on bill_detail.product_id = product.id
    //     join product_detail on product.id = product_detail.product_id
    //     WHERE bill_detail.bill_id = $id_don_hang";


    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll();
    //     return $result;
    // }

    public function updateDonHang($id_don_hang, $status)
    {
        $sql = "UPDATE bill SET status = $status WHERE id = $id_don_hang";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return true;
    }

    public function getDonHang($id_don_hang)
    {
        $sql = "SELECT *, (bill_detail.so_luong * bill_detail.thanh_tien) as thanh_tien
        from bill_detail
        join product_detail on bill_detail.product_detail_id = product_detail.id
        join product on product.id = product_detail.product_id

        WHERE bill_detail.bill_id = $id_don_hang";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getAllTrangThaiDonHang()
    {
        $sql = "SELECT * from trang_thai_don_hang";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getOneDonHang($id)
    {
        $sql = "SELECT * from bill WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function getDonHangFromKhachHang($id)
    {
        $sql = "SELECT bill.*, trang_thai_don_hang.ten_trang_thai,product.name FROM bill
      join bill_detail on bill.id = bill_detail.bill_id
      join trang_thai_don_hang on bill.status = trang_thai_don_hang.id
      join product_detail on bill_detail.product_detail_id = product_detail.id 
      join product on product_detail.product_id = product.id

      where bill.user_id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
