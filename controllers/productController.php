<?php
class productController
{
    public $modelSanPham;
    public $modelDanhMuc;
    function __construct()
    {
        $this->modelSanPham = new SanPhamModel();
        $this->modelDanhMuc = new categoryModel();
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
            $danhMucId = isset($_POST['cate_id']) ? $_POST['cate_id'] : 1;
            $status = 1;
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
                $errors['ram'] = "Ram sản phẩm không được để trống";
            }
            if (empty($mau)) {
                $errors['color'] = "Màu sản phẩm không được để trống";
            }
            // Thay đoạn code này:
            // if ($hinhAnh["error"] !== 0) {
            //     $errors['hinh_anh'] = "Phải chọn hình ảnh";
            // }

            // Thành đoạn code này:
            if (!empty($_FILES['image']) && $_FILES['image']['error'] !== 0) {
                $errors['image'] = "Phải chọn hình ảnh";
            }
            $_SESSION["error"] = $errors;
            if (empty($errors)) {
                $product_id = $this->modelSanPham->insertSanPham($danhMucId, $tenSanPham, $ngayTao, $ngayNhap, $moTa, $img);
                $chi_tiet_san_pham = $this->modelSanPham->insertChiTietSanPham($product_id, $soLuong, $ram, $mau, $giaSanPham, $status);
                if (!empty($img_array)) {
                    foreach ($img_array['name'] as $key => $value) {
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
                        $s = $this->modelSanPham->insertHinhAnh($product_id, $img_new_name);
                        // var_dump($s);
                        // die();
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
    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];

        $product = $this->modelSanPham->getProductById($id);
        $chiTietSanPham = $this->modelSanPham->getChiTietSanPham($id);
        $anhChitiet = $this->modelSanPham->getAnhSanPham($id);
        $danhmuc = $this->modelDanhMuc->getOneCategoryById($product['cate_id']);
        $listBinhLuan = $this->modelSanPham->getBinhLuan($id);
        require_once "./views/admin/product/chitietsanpham.php";
    }
    //ẩn bình luận
    public function updateTrangThaiBinhLuan(){
        $id_binh_luan = $_POST['id_binh_luan'];
        $name_view = $_POST['name_view'];
        $id_khach_hang = $_POST['id_khach_hang'];
        $binhLuan = $this->modelSanPham->getDetailBinhLuan($id_binh_luan);
        // var_dump($binhLuan);
        // die();
        if ($binhLuan) {
            $trang_thai_update = '';
            if ($binhLuan[0]['star'] == 1) {
                $trang_thai_update = 2;
            } else {
                $trang_thai_update = 1;
            }
            $status =  $this->modelSanPham->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update);
            if ($status) {
                if ($name_view == 'detail_khach'){
                    header("Location: index.php?act=chi-tiet-khach-hang&id_khach_hang=".$id_khach_hang);
                } else {
                    header("Location: index.php?act=chi-tiet-san-pham&id_san_pham= ".$binhLuan[0]['product_id']);
                }
            }
        }

    }
    public function formSuaSanPham()
    {
        $id = $_GET['id_san_pham'];
        $product = $this->modelSanPham->getProductById($id);
        $chiTietSanPham = $this->modelSanPham->getChiTietSanPham($id);
        $listDanhMuc = $this->modelSanPham->getAll();
        $listAnhSanPham = $this->modelSanPham->getAnhSanPham($id);
        require_once "./views/admin/product/suasanpham.php";
        deleteSession();
    }
    public function suaSanPham()
    {
        $id = $_POST['san_pham_id'];
        $sanPham = $this->modelSanPham->getProductById($id);
        $tenSanPham = $_POST['name'] ?? "";
        $giaSanPham = $_POST['price'] ?? "";
        $currentImage = $_POST['current_image'] ?? ''; // Giá trị ảnh hiện tại (nếu có)

        if (!empty($_FILES['image']['name'])) {
            // Người dùng tải ảnh mới lên
            $img = $_FILES['image']['name'];
            $targetPath = "assets/img/" . $img;

            // Di chuyển ảnh mới vào thư mục đích
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                // Ảnh mới được tải lên thành công
                if (!empty($currentImage) && file_exists("assets/img/" . $currentImage)) {
                    // Xóa ảnh cũ nếu tồn tại
                    unlink("assets/img/" . $currentImage);
                }
            } else {
                // Nếu tải lên thất bại, giữ nguyên ảnh cũ
                $img = $currentImage;
            }
        } else {
            // Không tải ảnh mới => giữ nguyên ảnh cũ
            $img = $currentImage;
        }
        $soLuong = $_POST['amount'] ?? "";
        $moTa = $_POST['detail'] ?? "";
        $ram = isset($_POST['ram']) ? $_POST['ram'] : null;
        $color = isset($_POST['color']) ? $_POST['color'] : null;
        $danhMucId = isset($_POST['cate_name']) ? $_POST['cate_name'] : null;
        $status = isset($_POST['status']) ? $_POST['status'] : null;
        $ngayNhap = time();
        $ngayTao = time();

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
        if (empty($ram)) {
            $errors['ram'] = "Bộ nhớ không được để trống";
        }
        if (empty($color)) {
            $errors['color'] = "Màu sắc không được để trống";
        }
        if (empty($danhMucId)) {
            $errors['cate_name'] = "Danh mục không được để trống";
        }
        if ($status === null) {
            $errors['status'] = "Trạng thái không được để trống";
        }



        $_SESSION["error"] = $errors;
        if (empty($errors)) {

            $san_pham_id = $this->modelSanPham->updateSanPham($id, $danhMucId, $tenSanPham, $img, $ngayNhap, $ngayTao, $moTa);
            $chiTietSanPham = $this->modelSanPham->updateChiTietSanPham($id, $soLuong, $ram, $color, $status, $giaSanPham);
            header("Location:index.php?act=danh-sach-admin-san-pham");
            exit();
        } else {
            //nếu có lỗi thì hiển thị lại
            $_SESSION["flash"] = true;
            header("Location:index.php?act=form-sua-san-pham&id_san_pham=" . $id);
            exit();
        }
    }

    //xoá  được sửa ảnh thành thêm
    // public function suaAlbumAnhSanPham() {
    //     $id = $_POST['san_pham_id'];
    //     $img_delete = $_POST['img_delete'] ?? null;
    //     $img_array = $_FILES['img_array'];

    //     // Handle deletions
    //     if (!empty($img_delete)) {
    //         $idsToDelete = explode(',', $img_delete);
    //         foreach ($idsToDelete as $imgId) {
    //             // Get image path before deleting record
    //             $imagePath = $this->modelSanPham->getImagePathById($imgId);
    //             if (file_exists($imagePath)) {
    //                 unlink($imagePath);
    //             }
    //             $this->modelSanPham->deleteAnhSanPham($imgId);
    //         }
    //     }

    //     // Handle new uploads
    //     if (!empty($img_array['name'][0])) {
    //         $uploadDir = 'assets/img/';
    //         foreach ($img_array['name'] as $key => $fileName) {
    //             if ($img_array['error'][$key] === 0) {
    //                 $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    //                 $newFileName = uniqid() . '.' . $extension;
    //                 $uploadPath = $uploadDir . $newFileName;

    //                 if (move_uploaded_file($img_array['tmp_name'][$key], $uploadPath)) {
    //                     $this->modelSanPham->insertHinhAnh($id, $newFileName);
    //                 }
    //             }
    //         }
    //     }

    //     header("Location: index.php?act=danh-sach-admin-san-pham");
    //     exit;
    // }



    //sửa ảnh liệt nút thêm
    public function suaAlbumAnhSanPham()
    {
        $id = $_POST['san_pham_id'];
        $img_delete = $_POST['img_delete'] ?? null;
        $img_array = $_FILES['img_array'];
        $current_img_ids = $_POST['current_img_ids'] ?? [];

        //xoá ảnh
        if (!empty($img_delete)) {
            $idsToDelete = explode(',', $img_delete);
            foreach ($idsToDelete as $imgId) {
                // Get image path before deleting record
                $imagePath = $this->modelSanPham->getImagePathById($imgId);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $this->modelSanPham->deleteAnhSanPham($imgId);
            }
        }

        foreach ($img_array['name'] as $key => $fileName) {
            if ($img_array['error'][$key] === 0) {
                // Tạo tên file mới
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);
                $newFileName = uniqid() . '.' . $extension;

                // Upload file mới
                if (move_uploaded_file($img_array['tmp_name'][$key], 'assets/img/' . $newFileName)) {
                    // Nếu có ID ảnh cũ tương ứng, xóa ảnh cũ và cập nhật record
                    if (isset($current_img_ids[$key])) {
                        $oldImage = $this->modelSanPham->getImagePathById($current_img_ids[$key]);
                        if (file_exists($oldImage)) {
                            unlink($oldImage);

                        }
                        // Cập nhật record với ảnh mới
                        $s = $this->modelSanPham->updateProductImage($current_img_ids[$key], $newFileName);
                    } else {
                        // Thêm ảnh mới nếu không có ảnh cũ
                        $d =  $this->modelSanPham->insertHinhAnh($id, $newFileName);
                        // die();
                    }
                }
            }
        }


        header("Location: index.php?act=danh-sach-admin-san-pham");
        exit;
    }

    public function xoaSanPham()
    {
        $id = $_GET["id_san_pham"];

        // Get all product images first
        $anhChitiet = $this->modelSanPham->getAnhSanPham($id);

        // Delete physical image files
        foreach ($anhChitiet as $anh) {
            $imagePath = './assets/img/' . $anh['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete product details images from database
        foreach ($anhChitiet as $anh) {
            $this->modelSanPham->deleteAnhSanPham($anh['id']);
        }

        // Delete product details
        $this->modelSanPham->deleteChiTietSanPham($id);

        // Delete main product
        $this->modelSanPham->deleteSanPham($id);

        header("Location: index.php?act=danh-sach-admin-san-pham");
        exit();
    }
}
