function valFormRegister() {
    var allowedNicknameCharacters = /^[a-zA-Z0-9_]*$/;
    var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var passwordRegex = /^[!-~]*$/;
    var phoneRegex = /^[0-9]{10,11}$/; // Số điện thoại từ 10-11 chữ số
    var addressRegex = /^[\w\s,.àáảãạâầấậẩẫăằắặẳẵèéẻẽẹêềếệểễìíỉĩịòóỏõọôồốộổỗơờớợởỡùúủũụưừứựửữỳýỷỹỵđ-]*$/i;

    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var rePassword = document.getElementById("rePassword").value;
    var address = document.getElementById("address").value;
    var phone = document.getElementById("phone").value;

    var usernameError = document.getElementById("usernameError");
    var emailError = document.getElementById("emailError");
    var passwordError = document.getElementById("passwordError");
    var rePasswordError = document.getElementById("rePasswordError");
    var addressError = document.getElementById("addressError");
    var phoneError = document.getElementById("phoneError");

    var error = 0;

    // Validate Email
    if (email === "") {
        emailError.innerText = "Bạn phải nhập email";
        error++;
    } else if (!emailRegex.test(email)) {
        emailError.innerText = "Email không hợp lệ";
        error++;
    } else {
        emailError.innerText = "";
    }

    // Validate Username
    if (username === "") {
        usernameError.innerText = "Bạn phải nhập tài khoản";
        error++;
    } else if (!allowedNicknameCharacters.test(username)) {
        usernameError.innerText = "Tên tài khoản không hợp lệ";
        error++;
    } else if (username.length < 2) {
        usernameError.innerText = "Tên tài khoản quá ngắn";
        error++;
    } else if (username.length > 17) {
        usernameError.innerText = "Tên tài khoản quá dài";
        error++;
    } else {
        usernameError.innerText = "";
    }

    // Validate Password
    if (password === "") {
        passwordError.innerText = "Bạn phải nhập mật khẩu";
        error++;
    } else if (password.includes(" ")) {
        passwordError.innerText = "Mật khẩu không được chứa dấu cách";
        error++;
    } else if (!passwordRegex.test(password)) {
        passwordError.innerText = "Mật khẩu không hợp lệ";
        error++;
    } else if (password.length < 4) {
        passwordError.innerText = "Mật khẩu quá ngắn";
        error++;
    } else if (password.length > 31) {
        passwordError.innerText = "Mật khẩu quá dài";
        error++;
    } else {
        passwordError.innerText = "";
    }

    // Validate Re-Password
    if (rePassword === "") {
        rePasswordError.innerText = "Bạn phải nhập lại mật khẩu";
        error++;
    } else if (rePassword !== password) {
        rePasswordError.innerText = "Mật khẩu không trùng khớp";
        error++;
    } else {
        rePasswordError.innerText = "";
    }

    // Validate Address
    if (address === "") {
        addressError.innerText = "Bạn phải nhập địa chỉ";
        error++;
    } else if (!addressRegex.test(address)) {
        addressError.innerText = "Địa chỉ không hợp lệ";
        error++;
    } else {
        addressError.innerText = "";
    }

    // Validate Phone
    if (phone === "") {
        phoneError.innerText = "Bạn phải nhập số điện thoại";
        error++;
    } else if (!phoneRegex.test(phone)) {
        phoneError.innerText = "Số điện thoại không hợp lệ (phải từ 10-11 chữ số)";
        error++;
    } else {
        phoneError.innerText = "";
    }

    return error === 0;
}