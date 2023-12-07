<?php
if (isset($_POST['btn_confirm'])) {
    $email = $_POST['email'];
    $content = $_POST['content'];

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

    $subject = "Nội dung liên hệ của khách hàng";
    $encoded_subject = mb_encode_mimeheader($subject, 'UTF-8');

    $mail->Subject = $encoded_subject;
    $format = "<h3>Thư liên Hệ Từ Khách Hàng:</h3>
        <b> Email của khách hàng: $email</b><br>
        <b> Nội dung liên hệ: <br></b><p>$content</p>
                  ";
    $mail->Body = $format;

    $mail->AddAddress('hoanglmpc07124@fpt.edu.vn');

    if (!$mail->Send()) {
        $error_send_mail = '<p class="text-red" >Gửi mail thất bại.</p>';
        echo 'thất bại';
    } else {
        $success = "Nội dung của bạn đã gửi thành công";
    }
}
?>

<div></div>

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92"
         style="background-image: url('../content/contentCilent/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Liên Hệ
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form action="" method="post">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">

                        Gửi tin nhắn cho chúng tôi
                    </h4>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                               placeholder="Địa chỉ email của bạn">
                        <img class="how-pos4 pointer-none" src="../content/contentCilent/images/icons/icon-email.png"
                             alt="ICON">
                    </div>

                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="content"
                                  placeholder="Chúng tôi làm gì để giúp bạn?"></textarea>
                    </div>

                    <button type="submit" name="btn_confirm"
                            class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Xác nhận
                    </button>
                    <div class="mt-3">
                        <p style="color: #26af48"><?php
                            if(isset($success)){
                                echo $success;
                            }
                            ?></p>
                    </div>

                </form>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

                    <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Địa chỉ
							</span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            Phường Xuân Khánh, Quận Ninh Kiều, Thành Phố Cần Thơ
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

                    <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">

								Liên hệ số điện thoại
							</span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            +1 800 1236879
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

                    <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Hỗ trợ bán hàng
							</span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            contact@example.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Map -->
<div class="map">
    <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787"
         data-pin="../content/contentCilent/images/icons/pin.png" data-scrollwhell="0" data-draggable="1"
         data-zoom="11"></div>
</div>