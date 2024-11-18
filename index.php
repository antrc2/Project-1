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

require_once "models/accountModel.php";
require_once "models/productModel.php";
require_once "models/categoryModel.php";
require_once "models/errorModel.php";
require_once "models/discountModel.php";

$account = new accountController;
$product = new productController;
$category = new categoryController;
$error = new errorController;
$discount = new discountController;

$act = $_GET['act'] ?? "/";
if ($act == "/") {
    echo "Hi";
    // $home->home();
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
} elseif ($act == "list-discount"){
    $discount->listDiscount();
} elseif ($act == "add-discount"){
    $discount->addDiscount();
} elseif ($act == "update-discount"){
    $discount->updateDiscount($_GET['id']);
} elseif ($act == "delete-discount"){
    $discount->deleteDiscount($_GET['id']);
} elseif ($act == "undo-delete-discount"){
    $discount->undoDeleteDiscount($_GET['id']);
}
//admin sản phẩm
elseif ($act == "danh-sach-admin-san-pham") {
    $product->danhSachSanPham();
} elseif ($act == "form-them-san-pham") {
    $product->formThemSanPham();
} elseif ($act == "them-san-pham") {
    $product->themSanPham();
}elseif($act == "chi-tiet-san-pham"){
    $product->chiTietSanPham();
}elseif($act == "form-sua-san-pham"){
    $product->formSuaSanPham();
}elseif($act == "sua-san-pham"){
    $product->suaSanPham();
}elseif($act == "sua-album-anh-san-pham"){
    $product->suaAlbumAnhSanPham();
}elseif($act == "xoa-san-pham"){
    $product->xoaSanPham();
}
 else {
    $error->notFound();
}
