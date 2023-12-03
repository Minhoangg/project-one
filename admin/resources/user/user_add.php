<?php
if (isset($_POST['btn_insert'])) {
    $name = $_POST['ho_ten'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone'];
    $password = $_POST['mat_khau'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $role = $_POST['vai_tro'];
    $confirm_password = $_POST['mat_khau2'];
    $user = new user();
    $thumbnail = save_file("hinh", "$UPLOAD_URL/user/");
    $infor_email = $user->selectByEmail($email);
    $infor_phone = $user->selectByphone($phone_number);
    if (isset($infor_email) && !empty($email)) {
        $error_email = 'Email đã tồn tại';
    }
    if (isset($infor_phone) && !empty($phone_number)) {
        $error_phone = 'Số điện thoại đã tồn tại';
    }
    if (empty($name)) {
        $loiten = 'Tên không được bỏ trống';
    }
    if (empty($thumbnail)) {
        $loi_thumbnail = 'Ảnh không để trống';
    }
    if (empty($email)) {
        $loiemail = 'Email không được bỏ trống';
    }
    if (!preg_match('/^\d{10}$/', $phone_number)) {
        $loisdt = "Số điện thoại không hợp lệ (phải có đúng 10 số)";
    }
    if (empty($address)) {
        $loidiachi = 'Địa chỉ không được bỏ trống';
    }
    if (empty($password)) {
        $loimatkhau = 'Mật khẩu không được bỏ trống';
    }
    if (empty($confirm_password)) {
        $loinhaplai = 'Nhập lại không được bỏ trống';
    }
    if ($password != $confirm_password) {
        $loi = 'Nhập lại mật khẩu không đúng';
    }
    if (!isset($loiten) && !isset($loiemail) && !isset($loisdt) && !isset($loidiachi) && !isset($loimatkhau) && !isset($loinhaplai) && !isset($loi) && !isset($loi_thumbnail) && !isset($error_email) && !isset($error_phone)) {
        $user->khach_hang_insert($name, $email, $password_hash, $thumbnail, $role, $phone_number, $address);
        header("Location: index.php?pages=user&action=list");
    }
}
?>
<div class="row">
    <div class="col-lg-12 ">
        <div class="card">
            <div class="card-header text-center bg-success-light text-white text-uppercase">Thêm mới khách hàng</div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" id="admin_add_kh">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="ho_ten" class="form-label">Họ và tên</label>
                            <input type="text" name="ho_ten" id="ho_ten" class="form-control">
                            <p style="color:red"><?php if (isset($loiten)) echo $loiten ?></p>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="hinh" class="form-label">Ảnh</label>
                            <input type="file" name="hinh" id="hinh" class="form-control">
                            <p style="color:red"><?php if (isset($loi_thumbnail)) echo $loi_thumbnail ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="mat_khau" class="form-label">Mật khẩu</label>
                            <input type="password" name="mat_khau" id="mat_khau" class="form-control">
                            <p style="color:red"><?php if (isset($loimatkhau)) echo $loimatkhau ?></p>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="mat_khau" class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" name="mat_khau2" class="form-control">
                            <p style="color:red"><?php if (isset($loinhaplai)) {
                                    echo $loinhaplai;
                                }
                                if (isset($loi)) {
                                    echo $loi;
                                } ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="phone" name="phone" id="phone" class="form-control">
                            <p style="color:red">
                            <?php if (isset($loisdt)) {
                                    echo $loisdt;
                                }
                                if (isset($error_phone)) {
                                    echo $error_phone;
                                } ?></p>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email" class="form-label">Địa chỉ email</label>
                            <input type="email" name="email" id="email" class="form-control">
                            <p style="color:red"><?php if (isset($loiemail)) {
                                    echo $loiemail;
                                }
                                if (isset($error_email)) {
                                    echo $error_email;
                                } ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="address" class="form-label">Địa chỉ khách hàng</label>
                            <input type="address" name="address" id="address" class="form-control">
                            <p style="color:red"><?php if (isset($loidiachi)) {
                                    echo $loidiachi;
                                } ?>
                            </p>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Vai trò?</label>
                            <div class="form-control">
                                <label class="radio-inline mr-3">
                                    <input type="radio" value="0" name="vai_tro">Khách hàng
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="1" name="vai_tro" checked>Nhân viên
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 text-center mt-3">
                        <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-primary mr-3">
                        <a href="index.php?pages=user&action=list"><input type="button" class="btn btn-success"
                                                                          value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>