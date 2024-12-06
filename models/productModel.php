<?php
class SanPhamModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = database();
    }
    public function getAll()
    {
        $sql = "SELECT * FROM category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    function getAllProductWithCate(){
        return $this->conn->query("SELECT *,product.id AS product_id,product.created_at AS product_created_at, product.updated_at AS product_updated_at ,product.status AS product_status, category.status AS category_status FROM product JOIN category ON product.cate_id = category.id")->fetchAll();
    }
    public function getAllProductByIdCate($id_cate){
        return $this->conn->query("SELECT product.*,category.cate_name
            FROM product
            join category on product.cate_id = category.id
            WHERE product.cate_id=$id_cate
             ORDER BY product.id DESC")->fetchAll();
    }
    function getNewestProductButLimit($limit){
        return $this->conn->query("SELECT *,product.id AS product_id, product.status AS product_status, category.status AS category_status FROM product JOIN category ON product.cate_id = category.id ORDER BY product.id DESC LIMIT $limit")->fetchAll();
        // return $this->conn->query("SELECT product.*, product_detail.status FROM product 
        // join product_detail ON product.id = product_detail.product_id
        //  ORDER BY product.id DESC LIMIT $limit")->fetchAll();
    }
    // public function getBanChay($limit){
    //     $sql = "SELECT product.*,  product_detail.*, bill.*,bill_detail.*,product.status AS product_status, category.status AS category_status from product
    //     join category on product.cate_id = category.id
    //     join product_detail ON product.id = product_detail.product_id
    //     join bill_detail ON product_detail.id = bill_detail.product_detail_id
    //     JOIN bill ON bill_detail.bill_id = bill.id
    //     order by bill_detail.so_luong DESC LIMIT $limit";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll();
    //     return $result;
    // }

    public function getBanChay($limit){
        $sql = "SELECT 
            product.id,
            product.name,
            product.image,
            product.detail,
            product.status AS product_status,
            category.status AS category_status,
            MIN(product_detail.price) as min_price,
            SUM(bill_detail.so_luong) as total_sold
        FROM product
        JOIN category ON product.cate_id = category.id
        JOIN product_detail ON product.id = product_detail.product_id
        JOIN bill_detail ON product_detail.id = bill_detail.product_detail_id
        JOIN bill ON bill_detail.bill_id = bill.id
        WHERE product.status = 1
        GROUP BY 
            product.id,
            product.name,
            product.image,
            product.detail,
            product.status,
            category.status
        ORDER BY total_sold DESC 
        LIMIT $limit";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    
    
    public function getAllSanPham()
    {
        try {
            $sql = "SELECT product.*, product_detail.status , product_detail.price, product_detail.amount, product_detail.ram, product_detail.color,category.cate_name, product_detail.id as product_detail_id
            FROM product
            INNER JOIN product_detail ON product.id = product_detail.product_id 
            INNER JOIN category ON product.cate_id = category.id";
            // $sql = "SELECT product.*, product_detail.status , product_detail.price, product_detail.amount, product_detail.ram, product_detail.color,category.cate_name, product_detail.id AS product_detail_id
            // FROM product
            // INNER JOIN product_detail ON product.id = product_detail.product_id 
            // INNER JOIN category ON product.cate_id = category.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function insertSanPham($danhMucId, $tenSanPham, $ngayTao, $ngayNhap, $moTa, $img)
    {
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
    function getOneProduct($id){
        return $this->conn->query("SELECT * FROM product WHERE id=$id")->fetch();
    }
    function getOneProductDetail($id){
        return $this->conn->query("SELECT * FROM product_detail WHERE id=$id")->fetch();
    }
    function updateProduct($id, $name, $detail, $cate_id,$img){
        $time = time();
        if ($img['name'] == ""){
            return $this->conn->prepare("UPDATE product SET name='$name',detail='$detail', updated_at = $time,cate_id = $cate_id WHERE id=$id")->execute();
        } else {
            $nameImg = $img['name'];
            return $this->conn->prepare("UPDATE product SET name='$name',detail='$detail', updated_at = $time,image = '$nameImg',cate_id = $cate_id WHERE id=$id")->execute();
        }
    }
    function addProduct($name,$detail,$cate_id,$img){
        $time = time();
        return $this->conn->prepare("INSERT INTO product (cate_id, name, image, created_at, updated_at, detail) VALUES ($cate_id, '$name', '$img',$time, $time, '$detail')")->execute();
    }
    function updateProductDetail($id, $amount, $ram, $color, $price){
        $time = time();
        return $this->conn->prepare("UPDATE product_detail SET updated_at=$time, amount=$amount, ram=$ram,color='$color',price=$price WHERE id=$id")->execute();
    }
    function deleteProductDetail($id){
        return $this->conn->prepare("UPDATE product_detail SET status=2 WHERE id=$id")->execute();
    }
    function undoDeleteProductDetail($id){
        return $this->conn->prepare("UPDATE product_detail SET status=1 WHERE id=$id")->execute();
    }
    function addProductDetail($product_id, $amount, $ram, $color, $price){
        $time = time();
        return $this->conn->prepare("INSERT INTO product_detail(product_id, created_at, updated_at, price, amount, ram, color) VALUES($product_id,$time, $time, $price, $amount, $ram, '$color')")->execute();
    }
    public function insertChiTietSanPham($product_id, $soLuong, $ram, $mau, $giaSanPham, $status)
    {
        try {
            $sql = "INSERT INTO `product_detail`(`product_id`, `amount`, `ram`, `color`, `price`,`status`)
                     VALUES ($product_id,$soLuong,$ram,'$mau','$giaSanPham','$status')";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            //lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    function deleteProduct($id){
        return $this->conn->prepare("UPDATE product SET status=2 WHERE id=$id")->execute();
    }
    function undoDeleteProduct($id){
        return $this->conn->prepare("UPDATE product SET status=1 WHERe id=$id")->execute();
    }
    public function insertHinhAnh($product_id, $hinhAnh)
    {
        try {
            // Lấy id của product_detail dựa vào product_id
            $sql = "SELECT id FROM product_detail WHERE product_id = :product_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();
            $product_detail_id = $stmt->fetchColumn();

            // Insert vào bảng product_detail_image
            $sql = "INSERT INTO product_detail_image (product_detail_id, image) 
                    VALUES (:product_detail_id, :image)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_detail_id', $product_detail_id);
            $stmt->bindParam(':image', $hinhAnh);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }




    public function updateProductImage($imageId, $newFileName)
    {
        try {
            $sql = "UPDATE product_detail_image SET image = :image WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':image', $newFileName);
            $stmt->bindParam(':id', $imageId);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    //lấy id từng sản phẩm

    public function getProductById($id)
    {
        $sql = "SELECT * FROM `product` WHERE  id = $id";
        $stml = $this->conn->prepare($sql);
        $stml->execute();
        return $stml->fetch();
    }

    function getAllDetailProduct($id){
        try {
            $sql = "SELECT * FROM `product_detail` WHERE  `product_id`= $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $resutl =  $stmt->fetchAll();
            return $resutl;
        }catch (Exception $e) {
            echo "Error: ". $e -> getMessage();
        }
    }
    function getDetailProductByProductDetailId($id){
        return $this->conn->query("SELECT *, product_detail.id as product_detail_id  FROM product_detail JOIN product ON product.id = product_detail.product_id WHERE product_detail.id=$id")->fetch();
    }
    function getDetailProductById($id){
        return $this->conn->query("SELECT *, product_detail.id as product_detail_id, discount.product_detail_id as discount_product_detail_id FROM product_detail JOIN discount ON product_detail.id = discount.product_detail_id JOIN product ON product.id = product_detail.product_id WHERE product_detail.id=$id")->fetch();
    }
    function getDetailProductByIdButWithoutDiscount($id){
        return $this->conn->query("SELECT *, product_detail.id as product_detail_id FROM product_detail JOIN product ON product.id = product_detail.product_id WHERE product_detail.id=$id")->fetch();
    
    }
    public function getChiTietSanPham($id){

        try {
            $sql = "SELECT  product_detail.*, bill_detail.* FROM product_detail
            join bill_detail on product_detail.id = bill_detail.product_detail_id
             WHERE  `product_id`= $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $resutl =  $stmt->fetch();
            return $resutl;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    // public function getAnhSanPham($id){
    //     try {
    //         $sql = "SELECT * FROM `product_detail_image` WHERE  `product_detail_id`= '$id'";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute();
    //         $resutl =  $stmt->fetchAll();
    //         return $resutl;
    //     }  catch (Exception $e) {
    //         echo "Error: ". $e -> getMessage();
    //     }
    // }
    function getListImageByProductDetailId($id){
        return $this->conn->query("SELECT * FROM product_detail_image WHERE product_detail_id = $id")->fetchAll();
    }
    public function getAnhSanPham($id)
    {
        try {
            // Lấy product_detail_id từ product_id trước
            $sql = "SELECT id FROM product_detail WHERE product_id = :product_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_id', $id);
            $stmt->execute();
            $product_detail_id = $stmt->fetchColumn();

            // Sau đó lấy ảnh chi tiết
            $sql = "SELECT * FROM product_detail_image WHERE product_detail_id = :product_detail_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_detail_id', $product_detail_id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateSanPham($id, $danhMucId, $tenSanPham, $img, $ngayNhap, $ngayTao, $moTa)
    {
        try {
            $sql = "UPDATE `product` SET `cate_id`='$danhMucId',`name`='$tenSanPham',`image`='$img',`created_at`='$ngayNhap',`updated_at`='$ngayTao',`detail`='$moTa' WHERE `id`='$id'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            //lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateChiTietSanPham($san_pham_id, $soLuong, $ram, $color, $status, $giaSanPham)
    {
        try {
            $sql = "UPDATE `product_detail` SET `price`='$giaSanPham',`amount`='$soLuong',`ram`='$ram',`color`='$color',`status`='$status' WHERE `product_id`='$san_pham_id'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            //lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function deleteAnhSanPham($id)
    {
        try {
            $sql = "DELETE FROM `product_detail_image` WHERE `id`='$id'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            //lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getImagePathById($id)
    {
        try {
            $sql = "SELECT image FROM product_detail_image WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return './assets/img/' . $result['image'];
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function addAnhSanPham($product_id, $image)
    {
        try {
            $sql = "INSERT INTO product_detail_image (product_detail_id, image) 
                    VALUES (:product_id, :image)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->bindParam(':image', $image);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }





    public function deleteSanPham($id)
    {
        try {
            $sql = "DELETE FROM `product` WHERE `id`='$id'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            //lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function deleteChiTietSanPham($id)
    {
        try {
            $sql = "DELETE FROM `product_detail` WHERE `product_id`='$id'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getBinhLuan($id)
    {
        try {
            $sql = "SELECT review.*, account.username ,account.fullname
            from review
            join account on review.user_id = account.id
            where review.product_id = '$id'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $resutl =  $stmt->fetchAll();
            return $resutl;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getDetailBinhLuan($id) {

         $spl = "SELECT * FROM review where id = '$id'";
         $stmt = $this -> conn -> prepare($spl);
         $stmt ->execute();
         $resutl =  $stmt->fetchAll();
         return $resutl;
    }

    public function updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update){
        try {
            $sql = "UPDATE `review` SET `star`='$trang_thai_update' WHERE id = '$id_binh_luan'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getBinhLuanFromKhachHang($id)
    {
        try {
        $sql = "SELECT review.*, product.name
        from review 
        join product on review.product_id = product.id
        where review.user_id = '$id'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $resutl =  $stmt->fetchAll();
            return $resutl;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    function getAllRam(){
        return $this->conn->query("SELECT DISTINCT ram FROM product_detail ORDER BY ram ASC")->fetchAll();
    }
    function getAllColor(){
        return $this->conn->query("SELECT DISTINCT color FROM product_detail ORDER BY color ASC")->fetchAll();
    }
    
}
