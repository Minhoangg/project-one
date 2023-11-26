<?php
if (isset($_POST['btn_update'])) {
    $id = $_GET['id'];
    $name = $_POST['ho_ten'];
    $email = $_POST['email'];
    $thumbnail=$_POST['hinh'];
    $phone = $_POST['phone_number'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $up_img = save_file("up_hinh", "$UPLOAD_URL/user/");
    $thumbnaill = strlen($up_img) > 0 ? $up_img : $thumbnail;
    $useredit = new user();
    $useredit->updateUser($id,$name, $email, $thumbnaill,$role,$phone,$address);
    header('Location:./index.php?pages=user&action=list');
}
if (isset($_GET['id'])) {
    $user = new user();
    $showif = $user->selectByID($_GET['id']);
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-success-light text-white text-uppercase">Cập nhật khách hàng</div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data" id="admin_update_kh">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="ho_ten" class="form-label">Họ và tên</label>
                            <input type="text" name="ho_ten" id="ho_ten" class="form-control" value="<?php echo $showif['name']; ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="hinh" class="form-label">Ảnh</label>
                            <input type="hidden" name="hinh" id="hinh" class="form-control" value="<?php echo $showif['thumbnail'] ?>">
                            <input type="file" name="up_hinh" id="up_hinh" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="mat_khau" class="form-label">Mật khẩu</label>
                            <input type="password" name="mat_khau" id="mat_khau" class="form-control" value="<?php echo $showif['password'] ?>"disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Vai trò: </label>
                            <div class="form-control">
                                <label class="radio-inline mr-3">
                                    <input type="radio" value="0" name="role" <?= !$showif['role'] ? 'checked' : '' ?>>Khách hàng
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="1" name="role" <?= $showif['role'] ? 'checked' : '' ?>>Nhân viên
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="phone" name="phone_number" id="phone" class="form-control" value="<?php echo $showif['phone_number'] ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email" class="form-label">Địa chỉ email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $showif['email'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="address" class="form-label">Địa chỉ khách hàng</label>
                            <input type="address" name="address" id="address" class="form-control" value="<?php echo $showif['address'] ?>">
                        </div>

                    </div>
            </div>
            <div class="mb-3 text-center mt-3">
                <input type="hidden" name="ma_kh" value="<?= $ma_kh ?>">
                <button type="submit" name="btn_update" value="Cập nhật" class="btn btn-primary mr-3 p-2">Cập Nhật</button>
                <a href="index.php?pages=user&action=list"><input type="button" class="btn btn-success" value="Danh sách"></a>
            </div>

            </form>
        </div>
    </div>
</div>
</div>