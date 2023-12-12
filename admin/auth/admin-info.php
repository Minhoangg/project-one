<?php
if (isset($_SESSION['admin'])) {
    extract($_SESSION['admin']);
}

//edit info
if (isset($_POST['btn_edit_info'])) {

    $name = $_POST['name_user'];
    $number_user = $_POST['number_user'];
    $email_user = $_POST['email_user'];
    $adress_user = $_POST['adress_user'];
    $id_user = $_POST['id_user'];

    $up_img = save_file("up_img", "$UPLOAD_URL/user/");
    $thumbnail = strlen($up_img) > 0 ? $up_img : $thumbnail;

    $user = new user();

    $user->update_user($name, $email_user, $adress_user, $number_user, $thumbnail, $id_user);

    if (isset($_SESSION['admin'])) {
        $_SESSION['admin']['name'] = $name;
        $_SESSION['admin']['phone_number'] = $number_user;
        $_SESSION['admin']['email'] = $email_user;
        $_SESSION['admin']['address'] = $adress_user;
        $_SESSION['admin']['thumbnail'] = $thumbnail;
    }

    header("Location:index.php?pages=account&action=info");
    exit;
}

//end edit info

if (isset($_POST['btn_edit_pass'])) {
    $pass_old = $_POST['pass_old'];
    $pass_new = $_POST['pass_new'];
    $pass_new_hash = password_hash($pass_new, PASSWORD_DEFAULT);
    $pass_confirm = $_POST['pass_confirm'];
    $id_user = $_POST['id_user'];
    $user = new user();

    if (empty($pass_old)) {
        $error_name_old = "Vui lòng nhập mật khẩu củ";
    }
    if (empty($pass_new)) {
        $error_pass_new = "Vui lòng điền mật khẩu mới";
    }
    if (empty($pass_confirm)) {
        $error_pass_confirm = "Vui lòng nhập lại mật khẩu";
    }

    $check_pass = $user->checkPass($id_user, $pass_old);

    if (!isset($check_pass) && !empty($pass_old)) {
        $error_name_old_not = "Mật khẩu không đúng";
    }
    if ($pass_new != $pass_confirm) {
        $error_new_not_confirm = "Nhập lại mật khẩu không đúng";
    }

    if (!isset($error_name_old) && !isset($error_pass_new) && !isset($error_pass_confirm) && !isset($error_name_old_not) && !isset($error_new_not_confirm)) {
        $user->updatePass($pass_new_hash, $id_user);
        $success = "Bạn đã cập nhật mật khẩu thành công";
    }
}

?>


<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#">
                            <img src="<?= $UPLOAD_URL . '/user/' . $thumbnail ?>" alt="no img" width="50px"
                                 height="50px">
                        </a>
                    </div>
                    <div class="col ml-md-n2 profile-user-info">
                        <h4 class="user-name mb-3"><?php
                            if (isset($_SESSION['admin'])) {
                                extract($_SESSION['admin']);
                                ?>
                                <?= $name ?>
                                <?php
                            }
                            ?></h4>
                        <div class="user-Location mt-1"><i class="fas fa-map-marker-alt"></i> <?= $address ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content profile-tab-cont">
                <div class="tab-pane fade show active" id="per_details_tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>thông tin tài khoản</span>
                                        <a class="edit-link" data-toggle="modal"
                                           href="#edit_personal_details"><i
                                                    class="fa fa-edit mr-1"></i>cập nhật</a>
                                    </h5>
                                    <div class="row mt-5">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Họ tên</p>
                                        <p class="col-sm-9"><?= $name ?></p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Số điện thoại</p>
                                        <p class="col-sm-9"><?= $phone_number ?></p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Email</p>
                                        <p class="col-sm-9"><?= $email ?></p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0">Địa chỉ</p>
                                        <p class="col-sm-9 mb-0"><?= $address ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="edit_personal_details" aria-hidden="true"
                                 role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Cập nhật thông tin tài khoảng</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="row form-row">
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Ảnh</label>
                                                            <input type="hidden" name="img" class="form-control"
                                                                   value="<?= $thumbnail ?>">
                                                            <input type="file" class="form-control"
                                                                   value="" name="up_img">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Họ và tên</label>
                                                            <input type="text" class="form-control"
                                                                   value="<?= $name ?>" name="name_user">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Số điện thoại</label>
                                                            <input type="text" class="form-control"
                                                                   value="<?= $phone_number ?>" name="number_user">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control"
                                                                   value="<?= $email ?>" name="email_user">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Địa chỉ</label>
                                                            <input type="text" class="form-control"
                                                                   value="<?= $address ?>" name="adress_user">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" class="form-control"
                                                       value="<?= $id ?>" name="id_user">
                                                <button type="submit" class="btn btn-primary btn-block"
                                                        name="btn_edit_info">Lưu thông tin
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title text-center mb-3">Cập nhật mật khẩu mới</h3>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">

                                            <form method="post">
                                                <div class="form-group">
                                                    <label>Mật khẩu củ</label>
                                                    <div class="form-toggle-pass">
                                                        <input type="password" class="form-control" id="pass_old"
                                                               name="pass_old">
                                                        <span toggle="#pass_old"
                                                              class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                    </div>
                                                    <div id="pass_error" class="error-message"
                                                         style="color: red; font-size: 14px; margin-top: 5px;">
                                                        <?php
                                                        if (isset($error_name_old)) {
                                                            echo $error_name_old;
                                                        }
                                                        if (isset($error_name_old_not)) {
                                                            echo $error_name_old_not;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Mật khẩu mới</label>
                                                    <div class="form-toggle-pass">
                                                        <input type="password" class="form-control" id="pass_new"
                                                               name="pass_new">
                                                        <span toggle="#pass_new"
                                                              class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                    </div>
                                                    <div id="pass_error" class="error-message"
                                                         style="color: red; font-size: 14px; margin-top: 5px;">
                                                        <?php
                                                        if (isset($error_pass_new)) {
                                                            echo $error_pass_new;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nhập lại mật khẩu mới</label>
                                                    <div class="form-toggle-pass">
                                                        <input type="password" class="form-control" id="pass_confirm"
                                                               name="pass_confirm">
                                                        <span toggle="#pass_confirm"
                                                              class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                    </div>
                                                    <div id="pass_error" class="error-message"
                                                         style="color: red; font-size: 14px; margin-top: 5px;">
                                                        <?php
                                                        if (isset($error_pass_confirm)) {
                                                            echo $error_pass_confirm;
                                                        }
                                                        if (isset($error_new_not_confirm)) {
                                                            echo $error_new_not_confirm;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <input type="hidden" value="<?= $id ?>" name="id_user">
                                                <button class="btn btn-primary" type="submit" name="btn_edit_pass">cập
                                                    nhật
                                                </button>
                                                <div id="pass_error" class="error-message"
                                                     style="color: chartreuse; font-size: 14px; margin-top: 5px;">
                                                    <?php
                                                    if (isset($success)) {
                                                        echo $success;
                                                    }
                                                    ?>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

