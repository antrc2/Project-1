<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tài Khoản</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <script src="assets/js/validateLogin.js"></script>
    <script src="assets/js/validateRegister.js"></script>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <!-- <link href="lib/animate/animate.min.css" rel="stylesheet">/ -->
    <link rel="stylesheet" href="views/client/lib/animate/animate.min.css">
    <link href="views/clientlib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <!-- <link href="/views/client/css/admin.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="views/client/css/admin.css">
    <!-- Template Stylesheet -->
    <style>
        .error {
            color: red;
            font-size: 12px;
            text-align: left;
        }
    </style>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="index.php?act=register" onsubmit="return valFormRegister()" method="POST">
                <h1>Đăng kí</h1>
                <div>
                    <input type="text" id="username" name="username" placeholder="Tài khoản">
                    <div id="usernameError" class="error"></div>
                </div>
                <div>
                    <input type="text" id="fullname" name="fullname" placeholder="Họ và tên">
                    <div id="fullnameError" class="error"></div>
                </div>
                <div>

                    <input type="email" id="email" name="email" placeholder="Email">
                    <div id="emailError" class="error"></div>
                </div>
                <div>
                    <input type="text" id="address" name="address" placeholder="Địa chỉ">
                    <div id="addressError" class="error"></div>
                </div>
                <div>

                    <input type="text" id="phone" name="phone" placeholder="Số điện thoại">
                    <div id="phoneError" class="error"></div>
                </div>
                <div>

                    <input type="password" id="password" name="password" placeholder="Mật khẩu">
                    <div id="passwordError" class="error"></div>
                </div>
                <div>

                    <input type="password" id="rePassword" name="rePassword" placeholder="Nhập lại mật khẩu">
                    <div id="rePasswordError" class="error"></div>
                </div>
                <div>
                    <button name="btn_register">Đăng kí tài khoản</button>
                </div>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="index.php?act=login" onsubmit="return valFormLogin()" method="post">
                <h1>Đăng nhập</h1>
                <span>Use your account</span>
                <div>
                    <input type="text" id="usernamee" name="username" placeholder="Tài khoản" />
                    <div id="usernameeError" class="error"></div>
                </div>
                <div>
                    <input type="password" id="passwordd" name="password" placeholder="Mật khẩu" />
                    <div id="passworddError" class="error"></div>
                </div>
                <a href="#">Quên pass password?</a>
                <button name="btn_login">Login</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h2>Đăng nhập</h2>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h2>Đăng kí </h2>
                    <button class="ghost" id="signUp">Đăng kí</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
    </script>
</body>

</html>