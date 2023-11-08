<?php
include '../global.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dashboard Template</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../content/contentAdmin/css/feathericon.min.css">
    <link rel="stylesheet" href="../content/contentAdmin/css/style.css">
</head>

<body>
    <div class="main-wrapper">
       <?php include './includes/header.php' ?>
       <?php include './includes/sibar.php' ?>

        <div class="page-wrapper" style="padding-top: 70px;">
            <div class="content container-fluid">
                <?php
                $pages = 'admin';
                if (isset($_GET['pages'])) {
                    switch ($_GET['pages']) {
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
                                default:
                                    include './resources/user/user_list.php';
                                    break;
                            }
                            break;


                        case 'statis':
                            switch ($_GET['action']) {
                                case 'list':
                                    include './resources/statistical/statistical.php';
                                    break;
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
                                case 'register':
                                    include './auth/admin-register.php';
                                    break;
                                case 'forgot':
                                    include './auth/admin-forgotpass.php';
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
                                    default:
                                        include './index.php';
                                        break;
                                }
                                break;
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script src="../content/contentAdmin/js/jquery-3.5.1.min.js"></script>
    <script src="../content/contentAdmin/js/popper.min.js"></script>
    <script src="../content/contentAdmin/js/bootstrap.min.js"></script>
    <script src="../content/contentAdmin/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../content/contentAdmin/js/script.js"></script>
</body>

</html>