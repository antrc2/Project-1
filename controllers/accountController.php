<?php
    class accountController{
        public $acc;
        function __construct()
        {
            $this->acc = new accountModel;
        }
        function login(){
            if (isset($_SESSION['username'])){
                header("Location: ?act=/");
            }
            if (isset($_POST['btn_login'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $result = $this->acc->login($username,$password);
                if ($result['status'] == True){
                    $_SESSION['username'] = $username;
                    require_once "views/account/login.php";
                    headerAfterXSecondWithSweetAlert2("?act=/",1500, "success", $result['message']);
                    $_SESSION['messages'] = "Đăng nhập thành công";
                } else {
                    require_once "views/account/login.php";
                    echo SweetAlert2("error",$result['message']);
                }
            }
            require_once "views/account/login.php";
        }
        function register(){
            if (isset($_SESSION['username'])){
                header("Location: ?act=/");
            }
            if (isset($_POST['btn_register'])){
                $username = $_POST['username'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $created_at = time();
                $result = $this->acc->register($username, $fullname, $email, $password, $address, $phone, $created_at);
                if ($result['status'] == True){
                    $_SESSION['username'] = $username;
                    require_once "views/account/register.php";
                    headerAfterXSecondWithSweetAlert2("?act=/",1500, "success", $result['message']);
                    $_SESSION['messages'] = "Đăng kí thành công";
                } else {
                    require_once "views/account/register.php";
                    echo SweetAlert2("error",$result['message']);
                }
            }
            require_once "views/account/register.php";
        }
        function logout(){
            if (isset($_SESSION['username'])){
                unset($_SESSION['username']);
                header("Location: ?act=/");
            } else {
                header("Location: ?act=login");
            }
        }

        function danhSachQuanTri(){
            $listAccount = $this->acc->getAll(2);
            require_once "views/admin/quanLiTaiKhoan/quanTri/listAccount.php";
        }
        function formThemTaiKhoanQuanTri(){
           
            require_once "views/admin/quanLiTaiKhoan/quanTri/addQuanTri.php";
            unset($_SESSION['errors']);
            deleteSession();
        }
        function themTaiKhoanQuanTri(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
              $username = $_POST['username'];
              $fullname = $_POST['fullname'];
              $email = $_POST['email'];
              $address = $_POST['address'];
              $phone = $_POST['phone'];
              $created_at = time();
              $update_at = time();
              $password = password_hash("123456", PASSWORD_BCRYPT);
              $role = 2;
              $status = 1;
              $errors = [];

              if (empty($username)) {
                $errors['username'] = "Tên tài khoản không được để trống";
            }
            if (empty($email)) {
                $errors['email'] = "Tên email tài khoản không được để trống";
            }
            if (empty($fullname)) {
                $errors['fullname'] = "Họ và Tên tài khoản không được để trống";
            }
            if (empty($address)) {
                $errors['address'] = "Địa chỉ không được để trống";
            }
            if (empty($phone)) {
                $errors['phone'] = "Số điện thoại tài khoản không được để trống";
            }
            $_SESSION['errors'] = $errors;
            if (empty($errors)){
               
                $result = $this->acc->themTaiKhoanQuanTri($username, $password, $fullname, $email, $address, $phone, $created_at,$role,$status,$update_at);
                unset($_SESSION['errors']); 
                header("Location: index.php?act=danh-sach-quan-tri");
                exit();
            }
              
          }
        
            header("Location: index.php?act=form-them-tai-khoan-quan-tri");
            exit();
          }
        function formsuaTaiKhoanQuanTri(){
            $id = $_GET['id'];
            $d=  $this->acc->  getRole($id);
            $account = $this->acc->getAccountById($id);
            require_once "views/admin/quanLiTaiKhoan/quanTri/editQuanTri.php";
            unset($_SESSION['errors']);
            deleteSession();
        }
        function suaTaiKhoanQuanTri(){
                $id = $_POST['tai_khoan_id'];
                $username = $_POST['username'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $created_at = time();
                $update_at = time();
                $status = isset($_POST['status']) ? $_POST['status'] : null;
                $role = 2;
                $errors = [];
  
                if (empty($username)) {
                  $errors['username'] = "Tên tài khoản không được để trống";
              }
              if (empty($email)) {
                  $errors['email'] = "Tên email tài khoản không được để trống";
              }
              if (empty($fullname)) {
                  $errors['fullname'] = "Họ và Tên tài khoản không được để trống";
              }
              if (empty($address)) {
                  $errors['address'] = "Địa chỉ không được để trống";
              }
              if (empty($phone)) {
                  $errors['phone'] = "Số điện thoại tài khoản không được để trống";
              }
              $_SESSION['errors'] = $errors;
              if (empty($errors)){
                 
                  $result = $this->acc->suaTaiKhoanQuanTri($id, $username, $fullname, $email, $address, $phone, $created_at,$status,$update_at,$role);
                //   var_dump($result);
                //   die();
                  unset($_SESSION['errors']); 
                  header("Location: index.php?act=danh-sach-quan-tri");
                  exit();
              }
                
        }

        function resetTaiKhoan(){
            $id = $_GET['id'];
            $tai_khoan_id =$this->acc->getAccountById($id);
            $pass = password_hash("123456", PASSWORD_BCRYPT);
            $this->acc->resetTaiKhoan($id, $pass);
            header("Location: index.php?act=danh-sach-quan-tri");
            if($tai_khoan_id['role'] == 1){
                header("Location: index.php?act=danh-sach-quan-tri");
            }else{
                header("Location: index.php?act=danh-sach-khach-hang");
            }
            exit();
        }


        function danhSachKhachHang(){
            $listAccount = $this->acc->getAll(1);
            require_once "views/admin/quanLiTaiKhoan/khachHang/listAccount.php";
        }
        function formSuaTaiKhoanKhachHang(){
            
            $id = $_GET['id'];
            $account = $this->acc->getAccountById($id);
            require_once "views/admin/quanLiTaiKhoan/khachHang/editKhachHang.php";
            unset($_SESSION['errors']);
            deleteSession();
        }
        function suaTaiKhoanKhachHang(){
            $id = $_POST['tai_khoan_id'];
            $username = $_POST['username'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $created_at = time();
            $update_at = time();
            $status = isset($_POST['status']) ? $_POST['status'] : null;
            $role = 1;
            $errors = [];

            if (empty($username)) {
              $errors['username'] = "Tên tài khoản không được để trống";
          }
          if (empty($email)) {
              $errors['email'] = "Tên email tài khoản không được để trống";
          }
          if (empty($fullname)) {
              $errors['fullname'] = "Họ và Tên tài khoản không được để trống";
          }
          if (empty($address)) {
              $errors['address'] = "Địa chỉ không được để trống";
          }
          if (empty($phone)) {
              $errors['phone'] = "Số điện thoại tài khoản không được để trống";
          }
          $_SESSION['errors'] = $errors;
          if (empty($errors)){
             
              $result = $this->acc->suaTaiKhoanKhachHang($id, $username, $fullname, $email, $address, $phone, $created_at,$status,$update_at,$role);
              unset($_SESSION['errors']); 
              header("Location: index.php?act=danh-sach-khach-hang");
              exit();
          }
        }
    }
?>