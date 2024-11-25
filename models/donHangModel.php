<?php
class DonHangModel{
    public $conn;
    public function __construct()
    {
        $this->conn = database();
    }

    public function getAllDonHang(){
        $sql = "SELECT bill.*,trang_thai_don_hang.ten_trang_thai 
        from bill
        JOIN trang_thai_don_hang on bill.status = trang_thai_don_hang.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getChiTietDonHang($id_don_hang){
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


    public function getDonHang($id_don_hang){
        $sql = "SELECT *, (bill_detail.so_luong * product_detail.price) as thanh_tien 
        from bill_detail
        join product on bill_detail.product_id = product.id
        join product_detail on product.id = product_detail.product_id
        WHERE bill_detail.bill_id = $id_don_hang";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getAllTrangThaiDonHang(){
        $sql = "SELECT * from trang_thai_don_hang";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getOneDonHang($id){
        $sql = "SELECT * from bill WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function updateDonHang($id_don_hang,$status){
        $sql = "UPDATE bill SET status = $status WHERE id = $id_don_hang";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return true;
    }
}
?>