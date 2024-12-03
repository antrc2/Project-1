<?php
class homeModel
{

    public $conn;
    function __construct()
    {
        $this->conn = database();
    }
  

    public function checkUserBoughtProduct($user_id, $product_id)
    {
        $sql = "SELECT bill.*,product_detail.*,product.* FROM bill
                         JOIN bill_detail ON bill.id = bill_detail.bill_id
                        JOIN product_detail  ON bill_detail.product_detail_id = product_detail.id
                        JOIN product ON product_detail.product_id = product.id 
                        WHERE bill.user_id = ? AND product_detail.product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id, $product_id]);
        return $stmt->fetch();
    }
    public function addComment($user_id, $product_id, $comment)
    {
        $sql = "INSERT INTO review (user_id, product_id, comment, star, created_at) 
                        VALUES (?, ?, ?, 1, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$user_id, $product_id, $comment, time()]);
    }
    public function getDonHangs($tai_khoan_id){
        $sql = "SELECT bill.*, trang_thai_don_hang.ten_trang_thai FROM bill
        join trang_thai_don_hang on bill.status = trang_thai_don_hang.id
         WHERE user_id = $tai_khoan_id";
         $stmt = $this->conn->prepare($sql);
         $stmt->execute();
         return $stmt->fetchAll();
    }
    public function getDonHang($donHangId){
        $sql = "SELECT * FROM bill WHERE id = $donHangId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function updateStatusBill($donHangId, $status){
        $sql = "UPDATE bill SET status =? WHERE id =?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$status, $donHangId]);
    }
}
