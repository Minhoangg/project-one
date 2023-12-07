<?php
if (isset($_POST['btn_email'])) {
    $email = $_POST['email_forgot'];
    $user = new user();

    if (empty($email)) {
        $error_email_null = 'vui lòng điền email';
    } else {
        $info_user = $user->checkEmail($email);
        if (isset($info_user)) {

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP

            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "lmhoang698@gmail.com";
            $mail->Password = "hkvt xtqc irnj ddlh";
            $mail->SetFrom("lmhoang698@gmail.com");

            $subject = "Lấy lại mật khẩu mới";
            $encoded_subject = mb_encode_mimeheader($subject, 'UTF-8');

            $mail->Subject = $encoded_subject;
            $mail->Body = "Bạn hãy nhấn vào link bên để đổi mật khẩu:  <a href='http://project-one.com/index.php?pages=forgot-password'>Đặt lại mật khẩu</a>";

            $mail->AddAddress($email);

            if (!$mail->Send()) {
                $error_send_mail = '<p class="text-red" >Gửi mail thất bại.</p>';
                echo 'thất bại';
            } else {
                header('location: index.php?action=home');
            }
        } else {
            $error_email = "email không tồn tại";
        }
    }


}
?>



<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <form method="post" class="login100-form validate-form flex-sb flex-w">
                <span class="login100-form-title p-b-53">
                    Lấy lại mật khẩu
                </span>

                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        Email
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <input class="input100" type="text" name="email_forgot" placeholder="Nhập email của bạn">
                    <span class="focus-input100"></span>
                </div>
                <div class="w-100 p-t-13 p-b-9">
                    <p style="color:red">
                        <?php
                        if (isset($error_email_null)) {
                            echo $error_email_null;
                        }
                        if (isset($error_email)) {
                            echo $error_email;
                        }
                        ?>
                    </p>
                </div>
                <div class="container-login100-form-btn m-t-17">
                    <button class="login100-form-btn" name="btn_email">
                        Gửi
                    </button>
                </div>
                <div class="w-full text-center p-t-55">
                        <span class="txt2">
                            Bạn chưa có tài khoản?
                        </span>

                    <a href="index.php?pages=register" class="txt2 bo1">
                        Đăng ký
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


