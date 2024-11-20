<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div>
            <?php  ?>
            <div>
                <h1>Đăng kí</h1>
                <script src="assets/js/validateRegister.js"></script>
                <form action="" onsubmit="return valFormRegister()" method="POST">
                    <div>
                        <label for="">Tài khoản</label>
                        <input type="text" name="username" id="username">
                        <div id="usernameError" class="error"></div>
                    </div>
                    <div>
                        <label for="">Họ và tên</label>
                        <input type="text" name="fullname" id="fullname">
                        <div id="fullnameError" class="error"></div>
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email" id="email">
                        <div id="emailError" class="error"></div>
                    </div>
                    <div>
                        <label for="">Địa chỉ</label>
                        <input type="text" name="address" id="address">
                        <div id="addressError" class="error"></div>
                    </div>
                    <div>
                        <label for="">Số điện thoại</label>
                        <input type="text" name="phone" id="phone">
                        <div id="phoneError" class="error"></div>
                    </div>
                    <div>
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password" id="password">
                        <div id="passwordError" class="error"></div>
                    </div>
                    <div>
                        <label for="">Nhập lại mật khẩu</label>
                        <input type="password" name="rePassword" id="rePassword">
                        <div id="rePasswordError" class="error"></div>
                    </div>
                    <div>
                        <button name="btn_register">Đăng kí tài khoản</button>
                    </div>
                    <div>
                        <p>Đã có tài khoản? <a href="?act=login">Đăng nhập</a></p>
                    </div>
                </form>
            </div>
            <?php  ?>
        </div>
    </div>
</body>

</html>