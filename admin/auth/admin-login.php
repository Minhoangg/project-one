<?php
session_start();
require_once "../../dao/pdo.php";
require_once "../../dao/user.php";
if (isset($_POST['btn_login'])) {
    $username = $_POST['user_name'];
    $password = $_POST['user_pass'];
    $user = new user();

    if (empty($username)) {
        $error_name = "Vui lòng điền tên đăng nhập";
    }
    if (empty($password)) {
        $error_pass = "Vui lòng điền mật khẩu";
    }
    if (!isset($error_name) && !isset($error_pass)) {
        $checkuser = $user->checkUser($username, $password);
        if ($checkuser) {
            extract($checkuser);
            if ($role == 1) {
                $_SESSION['admin'] = $checkuser;
                header("Location:../index.php");
            } else {
                $error_not_role = "Tên đăng nhập hoặc mật khẩu không đúngs";
            }
        } else {
            $error_not_account = "Tên đăng nhập hoặc mật khẩu không đúng";
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
                                <input class="form-control" name="user_name" type="text" placeholder="Tên đăng nhập">
                                <div id="pass_error" class="error-message"
                                     style="color: red; font-size: 14px; margin-top: 5px;">
                                    <?php
                                    if (isset($error_name)) {
                                        echo $error_name;
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