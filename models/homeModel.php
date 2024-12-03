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
    
}
