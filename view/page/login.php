<?php

$google_client = new Google_Client();

$google_client->setClientId('52375628181-ab7tqped9v2254pufherqljf6daod0pe.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://project-one.com/index.php?pages=login');
$google_client->addScope('email');
$google_client->addScope('profile');

$google_client->setHttpClient(
    new \GuzzleHttp\Client([
        'verify' => false, // Tắt xác minh chứng chỉ SSL (lưu ý: không an toàn)
    ])
);


if (isset($_GET["code"])) {
    try {
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

        if (!isset($token["error"])) {  // nếu lỗi trong quá trình lấy token sẽ có một mảng lỗi
            $google_client->setAccessToken($token['access_token']);  // set token cho $google_client để sử dụng

            $google_service = new Google_Service_Oauth2($google_client);

            $data = $google_service->userinfo->get();  // lấy thông tin người dùng
            $name = $data['given_name'];
            $email = $data['email'];
            $thumbnail = $data['picture'];

            // Lưu ảnh vào thư mục source
            $imageContent = file_get_contents($thumbnail);
            $imageFileName = './uploaded/user/' . $email . '_thumbnail.jpg';
            $imageSaveData = $email . '_thumbnail.jpg';
            file_put_contents($imageFileName, $imageContent);


            // kiểm tra tài khoảng theo email người dùng đã có chưa
            $users = new user();
            $info_user = $users->checkEmail($email);

            if (isset($info_user)) {
                $_SESSION['user'] = $info_user;
                header("Location: http://project-one.com/index.php?pages=home");
            } else {
                $users->insert_user_google($name, $email, $imageSaveData);
                $info_user = $users->checkEmail($email);
                $_SESSION['user'] = $info_user;
                header("Location: http://project-one.com/index.php?pages=shop");
            }
        }
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}

?>

<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <form class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-53">
						Đăng nhập
					</span>

                <a href="#" class="btn-face m-b-20">
                    <i class="fa fa-facebook-official"></i>
                    Facebook
                </a>
                <a href="<?= $google_client->createAuthUrl() ?>" class="btn-google m-b-20">
                    <img src="../../content/contentCilent/images/icon-google.png" alt="GOOGLE">
                    Google
                </a>

                <div class="p-t-31 p-b-9">
						<span class="txt1">
							Tên đăng nhập
						</span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <input class="input100" type="text" name="username">
                    <span class="focus-input100"></span>
                </div>

                <div class="p-t-13 p-b-9">
						<span class="txt1">
							Mật khẩu
						</span>

                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="pass">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn m-t-17">
                    <button class="login100-form-btn">
                        Đăng nhập
                    </button>
                </div>

                <a href="#" class="txt2 bo1 m-l-5">
                    Quên mật khẩu?
                </a>
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