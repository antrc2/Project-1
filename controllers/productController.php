<?php
class productController
{
    public $modelSanPham;
    function __construct()
    {
        $this->modelSanPham = new SanPhamModel();
    }

    public function danhSachSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once "./views/admin/product/createProduct.php";
    }

    public function formThemSanPham()
    {
        $listDanhMuc = $this->modelSanPham->getAll();
        require_once "./views/admin/product/readProduct.php";
        deleteSession();
    }
    public function themSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            $tenSanPham = $_POST["name"] ?? "";
            $giaSanPham = $_POST["price"] ?? "";
            $soLuong = $_POST["amount"] ?? "";
            if (empty($_FILES['image'])) {
                $img = "";
            } else {
                $img = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "assets/img/" . $img);

            }
            $img_array = $_FILES['img_array'];
            $ngayNhap = time();
            $ngayTao = time();
            $ram = $_POST["ram"] ?? "";
            $mau = $_POST["color"] ?? "";
            $moTa = $_POST["detail"] ?? "";
            $trangThai = isset($_POST['status']) ? $_POST['status'] : 1;
            $danhMucId = isset($_POST['cate_id']) ? $_POST['cate_id'] : 1;
            $errors = [];
            if (empty($tenSanPham)) {
                $errors['name'] = "Tên sản phẩm không được để trống";
            }
            if (empty($giaSanPham)) {
                $errors['price'] = "Giá sản phẩm không được để trống";
            }
            if (empty($soLuong)) {
                $errors['amount'] = "Số lượng sản phẩm không được để trống";
            }
            if (empty($ngayNhap)) {
                $errors['updated_at'] = "Ngày nhập sản phẩm không được để trống";
            }
            if (empty($ngayTao)) {
                $errors['created_at'] = "Ngày tạo sản phẩm không được để trống";
            }
            if (empty($danhMucId)) {
                $errors['cate_id'] = "Danh mục sản phẩm không được để trống";
            }
            if (empty($ram)) {
                $errors['ram'] = "ram sản phẩm không được để trống";
            }
            if (empty($mau)) {
                $errors['color'] = "màu sản phẩm không được để trống";
            }
            // Thay đoạn code này:
            // if ($hinhAnh["error"] !== 0) {
            //     $errors['hinh_anh'] = "Phải chọn hình ảnh";
            // }

            // Thành đoạn code này:
            if (!empty($_FILES['image']) && $_FILES['image']['error'] !== 0) {
                $errors['hinh_anh'] = "Phải chọn hình ảnh";
            }
            $_SESSION["error"] = $errors;
            if (empty($errors)) {
                $product_id = $this->modelSanPham->insertSanPham($danhMucId, $tenSanPham, $giaSanPham, $ngayTao, $ngayNhap, $trangThai, $moTa, $img);
                $chi_tiet_san_pham = $this->modelSanPham->insertChiTietSanPham($product_id, $soLuong, $ram, $mau);
                if(!empty($img_array)){
                    foreach($img_array['name'] as $key => $value){
                        $img_name = $img_array['name'][$key];
                        $img_tmp_name = $img_array['tmp_name'][$key];
                        $img_size = $img_array['size'][$key];
                        $img_error = $img_array['error'][$key];
                        $img_type = $img_array['type'][$key];
                        $img_ext = explode('.', $img_name);
                        $img_ext = strtolower(end($img_ext));
                        $img_new_name = uniqid('', true) . '.' . $img_ext;
                        $img_path = 'assets/img/' . $img_new_name;
                        move_uploaded_file($img_tmp_name, $img_path);
                       $s= $this->modelSanPham->insertHinhAnh($product_id, $img_new_name);
                    }
                    $_SESSION["flash"] = true;
                    header("Location: http://localhost/Project-1/index.php?act=danh-sach-admin-san-pham");
                    exit();
                }
                header("Location: http://localhost/Project-1/index.php?act=danh-sach-admin-san-pham");
                exit();
                } else {
                    $_SESSION["flash"] = true;
                    header("Location: http://localhost/Project-1/index.php?act=form-them-san-pham");
                    exit();
                }
                
            }
        }

}
