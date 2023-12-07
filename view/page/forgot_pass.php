<?php
if (isset($_POST['btn_pass_new'])) {
    $email = $_POST['email_forgot'];
    $pass_new = $_POST['pass_new'];
    $pass_new_hash = password_hash($pass_new, PASSWORD_DEFAULT);
    $pass_confirm = $_POST['pass_confirm'];

    $user = new user();

    $info_email = $user->checkEmail($email);

    if (empty($email)) {
        $error_enail = "Email không để trống";
    }
    if (!isset($info_email) && !empty($email)) {
        $error_info_email = "email không tồn tại";
    }
    if (empty($pass_new)) {
        $error_pass = "Mật khẩu không để trống";
    }
    if (empty($pass_confirm)) {
        $error_pass_confrim = "Vui lòng nhập lại mật khẩu";
    }
    if (strlen($pass_new) != strlen($pass_confirm) && !empty($pass_confirm)) {
        $error_password = "nhập lại mật khẩu không đúng";
    }
    if (!isset($error_enail) && !isset($error_info_email) && !isset($error_pass) && !isset($error_pass_confrim) && !isset($error_password)) {
        $user->updatePassByEmail($pass_new_hash, $email);
        header('location: index.php?pages=home');
    }
}
?>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <form method="post" class="login100-form validate-form flex-sb flex-w">
                <span class="login100-form-title p-b-53">
                    Cập nhật mật khẩu mới
                </span>
                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        Email 
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <input class="input100" type="text" name="email_forgot" placeholder="Email của bạn">
                </div>
                <div class="w-100 p-t-13 p-b-9">
                    <p style="color:red">
                        <?php
                        if (isset($error_enail)) {
                            echo $error_enail;
                        }
                        if (isset($error_info_email)) {
                            echo $error_info_email;
                        }
                        ?>
                    </p>
                </div>
                <div class="p-t-13 p-b-9">
                    <span class="txt1">
                        Mật khẩu
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="pass_new" placeholder="Nhập mật khẩu mới">
                </div>
                <div class="w-100 p-t-13 p-b-9">
                    <p style="color:red">
                        <?php
                        if (isset($error_pass)) {
                            echo $error_pass;
                        }
                        ?>
                    </p>
                </div>

                <div class="p-t-13 p-b-9">
                    <span class="txt1">
                        Nhập lại mật khẩu
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input id="password_confirm" class="input100" type="password" name="pass_confirm"
                           placeholder="Nhập lại mật khẩu">
                </div>
                <div class="w-100 p-t-13 p-b-9">
                    <p style="color:red">
                        <?php
                        if (isset($error_pass_confrim)) {
                            echo $error_pass_confrim;
                        }
                        if (isset($error_password)) {
                            echo $error_password;
                        }
                        ?>
                    </p>
                </div>

                <div class="container-login100-form-btn m-t-17">
                    <button class="login100-form-btn" name="btn_pass_new">
                        Tạo mật khẩu mới
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelectorAll('.toggle-password');

        togglePassword.forEach(function (toggle) {
            toggle.addEventListener('click', function () {
                const targetId = this.getAttribute('toggle');
                const passwordField = document.getElementById(targetId);

                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    });
</script>
