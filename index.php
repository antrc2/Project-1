<?php
    session_start();
    ob_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    require_once "commons/functions.php";

    require_once "controllers/accountController.php";
    require_once "controllers/productController.php";
    require_once "controllers/categoryController.php";
    require_once "controllers/errorController.php";

    require_once "models/accountModel.php";
    require_once "models/productModel.php";
    require_once "models/categoryModel.php";
    require_once "models/errorModel.php";

    $account = new accountController;
    // $product = new productController;
    $category = new categoryController;
    $error = new errorController;

    $act = $_GET['act'] ?? "/";
    if ($act == "/"){
        echo "Hi";
        // $home->home();
    } elseif ($act == "register"){
        $account->register();
    } elseif ($act == "login"){
        $account->login();
    } elseif ($act == "logout"){
        $account->logout();
    } elseif ($act == "list-category"){
        $category->listCategory();
    } elseif ($act == "add-category"){
        $category->addCategory();
    } elseif ($act == "update-category"){
        $category->updateCategory($_GET['id']);
    } elseif ($act == "delete-category"){
        $category->deleteCategory($_GET["id"]);
    } elseif ($act == "undo-delete-category"){
        $category->undoDeleteCategory($_GET['id']);
    }
    else {
        $error->notFound();
    }
?>