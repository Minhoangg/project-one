<?php
ob_start();
session_start();
include '../global.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dashboard Template</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/contentAdmin/css/feathericon.min.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/contentAdmin/css/style.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/contentAdmin/css/from.css">

</head>

<body>
<div class="main-wrapper">


    <?php
    include './includes/header.php';
    include './includes/sitebar.php';
    require_once('../dao/pdo.php');
    require_once('../dao/product.php');
    require_once('../dao/user.php');
    require_once('../dao/thongke.php');
    require_once('../dao/caterories.php');
    require_once('../dao/comment.php');
    require_once('../dao/orders.php');
    ?>

    <div class="page-wrapper" style="padding-top: 70px;">
        <div class="content container-fluid">
            <?php
            $pages = 'admin';
            if (isset($_GET['pages'])) {
                $pages = $_GET['pages'];
            }
            if (!isset($_SESSION['admin'])) {
                $pages = "login";
            }

            switch ($pages) {
                case 'admin':
                    include './resources/dashboard/dashboard.php';
                    break;
                case 'product':
                    switch ($_GET['action']) {
                        case 'list':
                            include './resources/product/product_list.php';
                            break;
                        case 'add':
                            include './resources/product/product_add.php';
                            break;
                        case 'edit':
                            include './resources/product/product_edit.php';
                            break;
                        case 'delete':
                            include './resources/product/product_delete.php';
                            break;
                        default:
                            include './resources/product/product_list.php';
                            break;
                    }
                    break;
                case 'category':
                    switch ($_GET['action']) {
                        case 'list':
                            include './resources/category/category_list.php';
                            break;
                        case 'add':
                            include './resources/category/category_add.php';
                            break;
                        case 'edit':
                            include './resources/category/category_edit.php';
                            break;
                        case 'delete':
                            include './resources/category/category_delete.php';
                            break;
                        default:
                            include './resources/category/category_list.php';
                            break;
                    }
                    break;
                case 'statistical':
                    switch ($_GET['action']) {
                        case 'chart':
                            include './resources/statistical/chart.php';
                            break;
                        case 'detail':
                            include './resources/statistical/statistical.php';
                            break;
                        default:
                            include './resources/statistical/chart.php';
                            break;
                    }
                    break;
                case 'user':
                    switch ($_GET['action']) {
                        case 'list':
                            include './resources/user/user_list.php';
                            break;
                        case 'add':
                            include './resources/user/user_add.php';
                            break;
                        case 'edit':
                            include './resources/user/user_edit.php';
                            break;
                        case 'delete':
                            include './resources/user/delete.php';
                            break;
                        default:
                            include './resources/user/user_list.php';
                            break;
                    }
                    break;
                case 'statis':
                    switch ($_GET['action']) {
                        case 'chart':
                            include './resources/statistical/chart.php';
                            break;
                        default:
                            include './resources/statistical/statistical.php';
                            break;
                    }
                    break;
                case 'account':
                    switch ($_GET['action']) {
                        case 'info':
                            include './auth/admin-info.php';
                            break;
                        case 'logout':
                            include './auth/admin-logout.php';
                            break;
                        default:
                            include './auth/admin-login.php';
                            break;
                    }
                    break;
                case 'comments':
                    switch ($_GET['action']) {
                        case 'list':
                            include './resources/comment/comment_list.php';
                            break;
                        case 'detail':
                            include './resources/comment/comment_detail.php';
                            break;
                        case 'delete':
                            include './resources/comment/delete.php';
                            break;
                        default:
                            include './resources/comment/comment_list.php';
                            break;
                    }
                    break;
                case 'order':
                    switch ($_GET['action']) {
                        case 'list':
                            include './resources/cart/cart_list.php';
                            break;
                        case 'detail':
                            include './resources/cart/cart_detail.php';
                            break;

                    }
                    break;
                case 'login':
                    header('location: ./auth/admin-login.php');
                    break;
            }
            ?>
        </div>
    </div>
</div>


<script type="text/javascript"
        src='https://cdn.tiny.cloud/1/knslyg5itucw7crhulwtavh3mbca4j42iass9vuqg5sn59k5/tinymce/6/tinymce.min.js'
        referrerpolicy="origin">
</script>

<script src="../content/contentAdmin/js/tinymce.js"></script>
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
<!-- end toogle password -->

<script src="../content/contentAdmin/js/jquery-3.5.1.min.js"></script>
<script src="../content/contentAdmin/js/popper.min.js"></script>
<script src="../content/contentAdmin/js/bootstrap.min.js"></script>
<script src="../content/contentAdmin/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../content/contentAdmin/js/script.js"></script>

</body>

</html>