<?php
if (isset($_POST['register'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['pass'];
    $user = new user();
    $passhash = password_hash($password, PASSWORD_DEFAULT);
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
  if(!isset($error_email) && !isset($error_phone) && !isset($loiten) && !isset($loiemail) && !isset($loisdt) && !isset($loidiachi) && !isset($loimatkhau)){
      $addusser = $user->khach_hang_insert($name, $email, $passhash, 1, 0, $phone_number, 'Cần Thơ');
      header('location: index.php?pages=home ');
  }


}

?>
<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <form class="login100-form validate-form flex-sb flex-w" method="post" action="">
                <span class="login100-form-title p-b-53">
                    Đăng ký
                </span>

                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        Tên người dùng
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <input class="input100" type="text" name="username" placeholder="Tên đăng nhập của bạn">
                    <span class="focus-input100"></span>
                </div>
                <div class="p-t-31 p-b-9">
                    <span>
                        <p class='text-danger pb-2'><?php echo $loiten ?? ''  ?></p>
                    </span>
                    <span class="txt1">
                        Email
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <input class="input100" type="text" name="email" placeholder="Email của bạn">
                    <span class="focus-input100"></span>
                </div>
                <div class="p-t-31 p-b-9">
                    <span>
                        <p class='text-danger pb-2'><?php echo $loiemail ?? ''  ?></p>
                    </span>
                    <span class="txt1">
                        Số điện thoại
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <input class="input100" type="text" name="phone" placeholder="Số điện thoại của bạn">
                    <span class="focus-input100"></span>
                </div>
                <div class="p-t-31 p-b-9">
                    <span>
                        <p class='text-danger pb-2'><?php echo $loisdt ?? ''  ?></p>
                    </span>
                    <span>
                        <p class='text-danger pb-2'><?php echo $error_phone ?? ''  ?></p>
                    </span>
                    <span class="txt1">
                        Địa chỉ
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <input class="input100" type="text" name="address" placeholder="Địa chỉ của bạn">
                    <span class="focus-input100"></span>
                </div>
                <div class="p-t-13 p-b-9">
                    <span>
                        <p class='text-danger pb-2'><?php echo $loidiachi ?? ''  ?></p>
                    </span>
                    <span class="txt1">
                        Mật khẩu
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Mật khẩu của bạn">
                    <span class="focus-input100"></span>
                </div>
                <span>
                    <p class='text-danger pb-2'><?php echo $loimatkhau ?? ''  ?></p>
                </span>
                <span>
                    <p class='text-danger pb-2'><?php echo $loi ?? ''  ?></p>
                </span>
                <div class="container-login100-form-btn m-t-17">
                    <button class="login100-form-btn" type="submit" name="register">
                        Đăng ký
                    </button>
                </div>
                <div class="w-full text-center p-t-55">
                    <span class="txt2">
                        Bạn đã có tài khoản?
                    </span>

                    <a href="index.php?pages=login" class="txt2 bo1">
                        Đăng nhập
                    </a>
                </div>
            </form>
        </div>
    </div>