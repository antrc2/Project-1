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
                <h1>Đăng nhập</h1>
                <script src="assets/js/validateLogin.js"></script>
                <form action="" onsubmit="return valFormLogin()" method="POST">
                    <div>
                        <label for="">Tài khoản</label>
                        <input type="text" name="username" id="username">
                        <div id="usernameError" class="error"></div>
                    </div>
                    <div>
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password" id="password">
                        <div id="passwordError" class="error"></div>
                    </div>
                    <div>
                        <button name="btn_login">Đăng nhập</button>
                    </div>
                    <div>
                        <p>Chưa có tài khoản? <a href="?act=register">Đăng kí</a></p>
                    </div>
                </form>
            </div>
            <?php  ?>
        </div>
    </div>
</body>
</html>