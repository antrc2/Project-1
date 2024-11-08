<?php
    class accountModel{
        public $conn;
        function __construct()
        {
            $this->conn = database();
        }
        function hashPassword($password,$salt = null){
            if ($salt == null){
                $salt = bin2hex(random_bytes(8));
            }
            $hashedPassword = hash("sha256", $salt.$password);
            return "${salt}$${hashedPassword}";
        }
        function checkHashedPassword($hashedPassword, $password){
            $salt = explode("$", $hashedPassword)[0];
            $newHashedPassword = $this->hashPassword($password,$salt);
            return $newHashedPassword == $hashedPassword;
        }
        function checkIssetEmail($email){
            return $this->conn->query("SELECT * FROM account WHERE email = '$email'")->fetch();
        }
        function checkIssetUsername($username){
            return $this->conn->query("SELECT * FROM account WHERE username = '$username'")->fetch();
        }
        function checkIssetPhone($phone){
            return $this->conn->query("SELECT * FROM account WHERE phone = '$phone'")->fetch();
        }
        function getInformationUserByUsername($username){
            return $this->conn->query("SELECT * FROM account WHERE username='$username'")->fetch();
        }
        function getInformationUserById($id){
            return $this->conn->query("SELECT * FROM account WHERE id=$id")->fetch();
        }
        function getInformationUserByEmail($email){
            return $this->conn->query("SELECT * FROM account WHERE email='$email'")->fetch();
        }
        function login($username, $password){
            if (!$this->checkIssetUsername($username)){
                return (['status'=>False, "message"=>"Tài khoản không tồn tại"]);
            }
            $hashedPassword = $this->getInformationUserByUsername($username)['password'];
            if ($this->checkHashedPassword($hashedPassword, $password)){
                return (['status'=>True, "message"=>"Đăng nhập thành công"]);
            } else {
                return (['status'=>False, "message"=>"Sai mật khẩu"]);
            }

        }
        function register($username, $fullname, $email, $password, $address, $phone, $created_at){
            if ($this->checkIssetUsername($username)){
                return (['status'=>False, "message"=>"Tài khoản đã tồn tại"]);
            }
            if ($this->checkIssetEmail($email)){
                return (['status'=>False, "message"=>"Email đã tồn tại"]);
            }
            if ($this->checkIssetPhone($phone)){
                return (["status"=>False, "message"=>"Số điện thoại đã tồn tại"]);
            }
            $hashedPassword = $this->hashPassword($password);
            $check = $this->conn->prepare("INSERT INTO account(username,fullname,password,email,address,phone,created_at,updated_at) VALUES('$username', '$fullname','$hashedPassword', '$email', '$address','$phone',$created_at, $created_at)")->execute();
            if ($check){
                return (['status'=>True, "message"=>"Đăng kí tài khoản thành công"]);
            } else {
                return (['status'=>False, "message"=>"Đã có lỗi xảy ra"]);
            }
        }
    }
?>