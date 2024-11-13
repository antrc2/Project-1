<?php
class SanPhamModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = database();
    }
    public function getAll(){
        $sql = "SELECT * FROM category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getAllSanPham()
    {
        try {
            $sql = "SELECT *, product_detail.id AS product_detail_id
                    FROM product
                    INNER JOIN product_detail ON product.id = product_detail.product_id 
                    INNER JOIN category ON product.cate_id = category.id";
                    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function insertSanPham($danhMucId, $tenSanPham, $giaSanPham, $ngayTao, $ngayNhap, $trangThai, $moTa, $img) {
        try {
            $sql = "INSERT INTO `product` (`cate_id`, `name`, `price`, `created_at`, `updated_at`, `status`, `detail`, `image`) 
                    VALUES (:cate_id, :name, :price, :created_at, :updated_at, :status, :detail, :image)";
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':cate_id', $danhMucId, PDO::PARAM_INT);
            $stmt->bindParam(':name', $tenSanPham, PDO::PARAM_STR);
            $stmt->bindParam(':price', $giaSanPham, PDO::PARAM_INT);
            $stmt->bindParam(':created_at', $ngayTao);
            $stmt->bindParam(':updated_at', $ngayNhap);
            $stmt->bindParam(':status', $trangThai, PDO::PARAM_INT);
            $stmt->bindParam(':detail', $moTa, PDO::PARAM_STR);
            $stmt->bindParam(':image', $img, PDO::PARAM_STR);
    
            $stmt->execute();
            
            // Lấy id sản phẩm vừa thêm
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function insertChiTietSanPham($product_id,$soLuong,$ram,$mau){
        try {
            $sql = "INSERT INTO `product_detail`(`product_id`, `amount`, `ram`, `color`)
                     VALUES ($product_id,$soLuong,$ram,'$mau')";
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute();
            
            //lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "Error: ". $e -> getMessage();
        }
    }

}
