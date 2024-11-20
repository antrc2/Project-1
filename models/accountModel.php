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
        function getAll($status) {
            $sql = "SELECT account.*, role.role_name FROM account 
                    JOIN role ON account.role_id = role.id
                    WHERE account.status = :status";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
       
        
        function themTaiKhoanQuanTri($username, $password, $fullname, $email, $address, $phone, $created_at,$role,$status,$update_at){
            $sql = "INSERT INTO `account`(`fullname`, `username`, `email`, `password`, `address`, `phone`, `created_at`, `updated_at`, `status`, `role_id`) 
                    VALUES ('$fullname','$username','$email','$password','$address','$phone','$created_at','$update_at','$status','$role')";
                   $stmt= $this->conn->prepare($sql);
                   $stmt->execute();
                   return true;

        }
        function getAccountById($id){
            $sql = "SELECT *  FROM account WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        }
        function getRole($id){
            $sql = "SELECT * FROM role WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        }
        function suaTaiKhoanQuanTri($id, $username, $fullname, $email, $address, $phone, $created_at,$status,$update_at,$role){
            $sql = "UPDATE `account` SET `fullname`='$fullname', `username`='$username', `email`='$email', `address`='$address', `phone`='$phone', `created_at`='$created_at', `updated_at`='$update_at', `status`='$status', `role_id`='$role' WHERE id=$id";
            $stmt= $this->conn->prepare($sql);
            $stmt->execute();
            return true;
        }
    }
?>