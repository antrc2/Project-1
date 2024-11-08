<?php
    session_start();
    ob_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    require_once "commons/functions.php";

    require_once "controllers/accountController.php";
    require_once "controllers/productController.php";
    require_once "controllers/categoryController.php";

    require_once "models/accountModel.php";
    require_once "models/productModel.php";
    require_once "models/categoryModel.php";

    $account = new accountController;
    // $product = new productController;
    // $category = new categoryController;

    $act = $_GET['act'] ?? "/";
    if ($act == "/"){
        // $home->home();
    } elseif ($act == "register"){
        $account->register();
    } elseif ($act == "login"){
        $account->login();
    } elseif ($act == "logout"){
        $account->logout();
    }
    else {
        $error->notFound();
    }
?>