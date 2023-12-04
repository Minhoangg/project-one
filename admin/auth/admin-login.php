<?php
session_start();
require_once "../../dao/pdo.php";
require_once "../../dao/user.php";
if (isset($_POST['btn_login'])) {
    $phone_number = $_POST['number_phone'];
    $password = $_POST['user_pass'];
    $user = new user();

    if (empty($phone_number)) {
        $error_phone_number = "Vui lòng điền số điện thoại";
    } elseif (!is_numeric($phone_number)) {
        $error_phone_number = "Số điện thoại chỉ được chứa các ký tự số";
    } elseif (strlen($phone_number) !== 10) {
        $error_phone_number = "Số điện thoại phải có đúng 10 số";
    }
    if (empty($password)) {
        $error_pass = "Vui lòng điền mật khẩu";
    }
    if (!isset($error_phone_number) && !isset($error_pass)) {
        $checkuser = $user->checkUser($phone_number, $password);
        if ($checkuser) {
            extract($checkuser);
            if ($role == 1) {
                $_SESSION['admin'] = $checkuser;
                header("Location:../index.php");
            } else {
                $error_not_role = " Số điện thoại hoặc mật khẩu không đúngggg";
            }
        } else {
            $error_not_account = "Số điện thoại hoặc mật khẩu không đúng";
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Đăng nhập</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="../../content/contentAdmin/css/style.css">
    <link rel="stylesheet" href="../../content/contentAdmin/css/from.css">


<body>
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left"><img class="img-fluid" src="../../content/contentAdmin/img/hotel_logo.png"
                                             alt="Logo"></div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Đăng nhập</h1>
                        <p class="account-subtitle">Đăng nhập để vào quản lý</p>
                        <form action="" method="post">
                            <div class="form-group">
                                <input class="form-control" name="number_phone" type="text" placeholder="Số điện thoại">
                                <div id="pass_error" class="error-message"
                                     style="color: red; font-size: 14px; margin-top: 5px;">
                                    <?php
                                    if (isset($error_phone_number)) {
                                        echo $error_phone_number;
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-toggle-pass">
                                    <input class="form-control" name="user_pass" type="password" placeholder="Mật khẩu"
                                           id="pass_login">
                                    <span toggle="#pass_login"
                                          class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div id="pass_error" class="error-message"
                                     style="color: red; font-size: 14px; margin-top: 5px;">
                                    <?php
                                    if (isset($error_pass)) {
                                        echo $error_pass;
                                    }
                                    if (isset($error_not_account)) {
                                        echo $error_not_account;
                                    }
                                    if (isset($error_not_role)) {
                                        echo $error_not_role;
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit" name="btn_login">Đăng nhập
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--toogle password -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelectorAll('.toggle-password');

        togglePassword.forEach(function (element) {
            element.addEventListener('click', function () {
                const target = document.querySelector(this.getAttribute('toggle'));
                this.classList.toggle('fa-eye-slash');

                if (target.type === 'password') {
                    target.type = 'text';
                } else {
                    target.type = 'password';
                }
            });
        });
    });
</script>
</body>

</html>