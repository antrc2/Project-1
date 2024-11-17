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
            $sql = "SELECT product.*, product_detail.status , product_detail.price, product_detail.amount, product_detail.ram, product_detail.color,category.cate_name
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
    public function insertSanPham($danhMucId, $tenSanPham, $ngayTao, $ngayNhap, $moTa, $img) {
        try {
            $sql = "INSERT INTO `product` (`cate_id`, `name`, `created_at`, `updated_at`, `detail`, `image`) 
                    VALUES (:cate_id, :name, :created_at, :updated_at, :detail, :image)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cate_id', $danhMucId, PDO::PARAM_INT);
            $stmt->bindParam(':name', $tenSanPham, PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $ngayTao);
            $stmt->bindParam(':updated_at', $ngayNhap);
            $stmt->bindParam(':detail', $moTa, PDO::PARAM_STR);
            $stmt->bindParam(':image', $img, PDO::PARAM_STR);
            $stmt->execute();
            // Lấy id sản phẩm vừa thêm
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function insertChiTietSanPham($product_id,$soLuong,$ram,$mau, $giaSanPham,$status){
        try {
            $sql = "INSERT INTO `product_detail`(`product_id`, `amount`, `ram`, `color`, `price`,`status`)
                     VALUES ($product_id,$soLuong,$ram,'$mau','$giaSanPham','$status')";
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute();
            
            //lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "Error: ". $e -> getMessage();
        }
    }
    public function insertHinhAnh($product_id,$hinhAnh){
        try {
            $sql = "INSERT INTO `product_detail_image`( `product_detail_id`, `image`) 
            VALUES ('$product_id','$hinhAnh')";
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute();
            //lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "Error: ". $e -> getMessage();
        }
    }

    //lấy id từng sản phẩm

    public function getProductById($id){
            $sql = "SELECT * FROM `product` WHERE  id = $id";
            $stml = $this -> conn->prepare($sql);
            $stml->execute();
            return $stml ->fetch();
        
    }
    public function getChiTietSanPham($id){
        try {
            $sql = "SELECT * FROM `product_detail` WHERE  `product_id`= $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $resutl =  $stmt->fetch();
            return $resutl;
        }catch (Exception $e) {
            echo "Error: ". $e -> getMessage();
        }
    }
    public function getAnhSanPham($id){
        try {
            $sql = "SELECT * FROM `product_detail_image` WHERE  `product_detail_id`= '$id'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $resutl =  $stmt->fetchAll();
            return $resutl;
        }  catch (Exception $e) {
            echo "Error: ". $e -> getMessage();
        }
    }
    public function updateSanPham($id,$danhMucId,$tenSanPham,$img,$ngayNhap,$ngayTao,$moTa){
        try {
            $sql = "UPDATE `product` SET `cate_id`='$danhMucId',`name`='$tenSanPham',`image`='$img',`created_at`='$ngayNhap',`updated_at`='$ngayTao',`detail`='$moTa' WHERE `id`='$id'";
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute();
            //lấy id sản phẩm vừa thêm
            return true;
        }  catch (Exception $e) {
            echo "Error: ". $e -> getMessage();
        }
    }

    public function updateChiTietSanPham($san_pham_id,$soLuong,$ram,$color,$status,$giaSanPham){
        try {
            $sql = "UPDATE `product_detail` SET `price`='$giaSanPham',`amount`='$soLuong',`ram`='$ram',`color`='$color',`status`='$status' WHERE `product_id`='$san_pham_id'";
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute();
            //lấy id sản phẩm vừa thêm
            return true;
        }  catch (Exception $e) {
            echo "Error: ". $e -> getMessage();
        }
    }
}
