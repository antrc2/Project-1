<?php

session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once "commons/functions.php";

require_once "controllers/accountController.php";
require_once "controllers/productController.php";
require_once "controllers/categoryController.php";
require_once "controllers/errorController.php";
require_once "controllers/discountController.php";
require_once "controllers/donhangController.php";
require_once "controllers/homeController.php";
require_once "controllers/cartController.php";
require_once "controllers/thongkeControler.php";

require_once "models/thongke.php";
require_once "models/accountModel.php";
require_once "models/productModel.php";
require_once "models/categoryModel.php";
require_once "models/errorModel.php";
require_once "models/discountModel.php";
require_once "models/donHangModel.php";
require_once "models/homeModel.php";
require_once "models/cartModel.php";

$account = new accountController;
$product = new productController;
$category = new categoryController;
$error = new errorController;
$discount = new discountController;
$order = new DonHangController;
$cart = new cartController;
$home = new homeController;
$thongke = new thongkeController;
$act = $_GET['act'] ?? "/";

//view người dùng
if ($act == "/" || $act == "") {
    $home->home();
} elseif ($act == "chi-tiet-san-pham-khach-hang") {
    $home->productDetail($_GET['id']);
} elseif ($act == "gio-hang") {
    $home->gioHang();
} elseif ($act == "thanh-toan") {
    $home->thanhToan();
} elseif ($act == "san-pham") {
    $home->sanPham();
} elseif ($act == "lien-he") {
    $home->lienHe();
} elseif($act == "lich-su-don-hang"){
    $home->lichSuDonHang();
}elseif ($act == "huy-don-hang") {
    $home->huyDonHang();
} elseif($act == 'chi-tiet-don-hang-thanh-toan'){
    $home->chiTietDonHangThanhToan();
}
// Cần giao diện

elseif ($act == "list-product-detail"){
    $product->listProductDetail($_GET['id']);
} elseif ($act == "update-product"){
    $product->updateProduct($_GET['id']);
} elseif ($act == "delete-product"){
    $product->deleteProduct($_GET['id']);
} elseif ($act == "undo-delete-product"){
    $product->undoDeleteProduct($_GET['id']);
} elseif ($act == "update-product-detail"){
    $product->updateProductDetail($_GET['id']);
} elseif ($act == "delete-product-detail"){
    $product->deleteProductDetail($_GET['id']);
} elseif ($act == "undo-delete-product-detail"){
    $product->undoDeleteProductDetail($_GET['id']);
} elseif ($act == "add-product-detail"){
    $product->addProductDetail($_GET['id']);
} elseif ($act == "add-product"){
    $product->addProduct();
} elseif ($act == "danh-sach-admin-san-pham") {
    $product->danhSachSanPham();
} elseif ($act == "callback"){
    $order->callbackOrder();
} elseif ($act == "pay-method"){
    $home->payMethod($_GET['id']);
}



elseif ($act == "add-cart") {
    $cart->addCart();
} elseif ($act == "deletecart") {
    $cart->deleteCart();
} elseif ($act == "delete-cart") {
    $cart->delete_cart($_GET['id']);
} elseif ($act == "register") {
    $account->register();
} elseif ($act == "login") {
    $account->login();
} elseif ($act == "logout") {
    $account->logout();
} elseif ($act == "list-category") {
    $category->listCategory();
} elseif ($act == "add-category") {
    $category->addCategory();
} elseif ($act == "update-category") {
    $category->updateCategory($_GET['id']);
} elseif ($act == "delete-category") {
    $category->deleteCategory($_GET["id"]);
} elseif ($act == "undo-delete-category") {
    $category->undoDeleteCategory($_GET['id']);
} elseif ($act == "list-discount") {
    $discount->listDiscount();
} elseif ($act == "add-discount") {
    $discount->addDiscount();
} elseif ($act == "update-discount") {
    $discount->updateDiscount($_GET['id']);
} elseif ($act == "delete-discount") {
    $discount->deleteDiscount($_GET['id']);
} elseif ($act == "undo-delete-discount") {
    $discount->undoDeleteDiscount($_GET['id']);
}
//admin sản phẩm
elseif ($act == "form-them-san-pham") {
    $product->formThemSanPham();
} elseif ($act == "them-san-pham") {
    $product->themSanPham();
} elseif ($act == "chi-tiet-san-pham") {
    $product->chiTietSanPham();
} elseif ($act == "form-sua-san-pham") {
    $product->formSuaSanPham();
} elseif ($act == "sua-san-pham") {
    $product->suaSanPham();
} elseif ($act == "sua-album-anh-san-pham") {
    $product->suaAlbumAnhSanPham();
} elseif ($act == "xoa-san-pham") {
    $product->xoaSanPham();
}
//dơn hàng
elseif ($act == "danh-sach-don-hang") {
    $order->danhSachDonHang();
} elseif ($act == "chi-tiet-don-hang") {
    $order->chiTietDonHang();
} elseif ($act == "sua-don-hang") {
    $order->fromsuaDonHang();
}
//quản lí tài khoản quản trị
elseif ($act == "danh-sach-quan-tri") {
    $account->danhSachQuanTri();
} elseif ($act == "form-them-tai-khoan-quan-tri") {
    $account->formThemTaiKhoanQuanTri();
} elseif ($act == "them-tai-khoan-quan-tri") {
    $account->themTaiKhoanQuanTri();
} elseif ($act == "form-sua-tai-khoan-quan-tri") {
    $account->formsuaTaiKhoanQuanTri();
} elseif ($act == "sua-tai-khoan-quan-tri") {
    $account->suaTaiKhoanQuanTri();
} elseif ($act == "reset-tai-khoan") {
    $account->resetTaiKhoan();
}


//bình luận
elseif ($act == "update-trang-thai-binh-luan") {
    $product->updateTrangThaiBinhLuan();
}
elseif($act=='commen'){
    $home->commen();
} elseif ($act == "statistic"){
    $order->statistic();
}
//quản lí tài khoản khách hàng
elseif ($act == "danh-sach-khach-hang") {
    $account->danhSachKhachHang();
} elseif ($act == "form-sua-tai-khoan-khach-hang") {
    $account->formSuaTaiKhoanKhachHang();
} elseif ($act == "sua-tai-khoan-khach-hang") {
    $account->suaTaiKhoanKhachHang();
} elseif ($act == "chi-tiet-khach-hang") {
    $account->chiTietKhachHang();
} elseif ($act == "forbidden") {
    $error->forbidden();
} elseif ($act == "method-not-allow") {
    $error->methodNotAllow();
} elseif($act == 'thong-ke'){
    $thongke->thongKe();
}


else {
    $error->notFound();
}
$icon = isset($_SESSION['icon']) ? $_SESSION['icon'] : "success";
if (isset($_SESSION['messages'])) {
    $message = $_SESSION['messages'];
    echo SweetAlert2($icon, $message);
    unset($_SESSION['messages']);
}