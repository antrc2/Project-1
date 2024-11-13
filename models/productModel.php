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
            $sql = "SELECT*
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
    public function insertSanPham($danhMucId,$tenSanPham,$giaSanPham,$ngayTao,$ngayNhap,$trangThai,$moTa,$img){
        try {
            $sql = "INSERT INTO `product`( `cate_id`, `name`, `price`,`created_at`, `updated_at`, `status`, `detail`,`image`) 
                      VALUES ('$danhMucId','$tenSanPham','$giaSanPham','$ngayTao','$ngayNhap','$trangThai','$moTa','$img')";
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute();
            
            //lấy id sản phẩm vừa thêm
            return $this ->conn-> lastInsertId();
        } catch (Exception $e) {
            echo "Error: ". $e -> getMessage();
        }
    }
    public function insertChiTietSanPham($product_id,$soLuong,$ram,$mau){
        try {
            $sql = "INSERT INTO `product_detail`(`product_id`, `amount`, `ram`, `color`)
                     VALUES ('$product_id','$soLuong','$ram','$mau')";
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute();
            
            //lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "Error: ". $e -> getMessage();
        }
    }

}
