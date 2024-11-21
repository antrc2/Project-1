function valFormLogin() {
    var allowedNicknameCharacters = /^[a-zA-Z0-9_]*$/;
    var username = document.getElementById("usernamee").value;
    var password = document.getElementById("passwordd").value;
    var usernameError = document.getElementById("usernameeError");
    var passwordError = document.getElementById("passworddError");
    var error = 0;
    if (username == "") {
        usernameError.innerText = "Bạn phải nhập tài khoản";
        error++;
    } else {
        if (!allowedNicknameCharacters.test(username)) {
            usernameError.innerText = "Tài khoản không xác định";
            error++;
        } else {
            usernameError.innerText = '';
        }
    }
    if (password == "") {
        passwordError.innerText = "Bạn phải nhập mật khẩu";
        error++;
    } else {
        passwordError.innerText = '';
    }
    if (error === 0) {
        return true;
    } else {
        return false;
    }
}