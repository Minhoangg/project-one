<?php
$od= new orders();

if (isset($_POST['hhthanhtoan'])) {
    $ten_nguoi_nhan = $_POST['hoten_nguoinhan'];
    $diachi_nguoinhan = $_POST['diachi_nguoinhan'];
    $email_nguoinhan = $_POST['email_nguoinhan'];
    $dienthoai_nguoinhan = $_POST['dienthoai_nguoinhan'];
    $ngaydh = date_format(date_create(), 'Y-m-d');
    $tongdh = ($_POST['total']);
    $pttt = $_POST['pttt'];
    if(isset($_SESSION['user'])){
        $user_id = $_SESSION['user']['id'];
    }else{
        $user_id=0;
    }

    $idbill = $od->insert_order($user_id,$ten_nguoi_nhan, $diachi_nguoinhan, $email_nguoinhan, $dienthoai_nguoinhan, $ngaydh, $tongdh, $pttt);
    foreach ($_SESSION['giohang'] as $sp) {
        $od->insert_cart($sp[1],$sp[3], $sp[4], $tongdh, $idbill);

    }
//    $bill = bill_select_by_id($idbill);
    $_SESSION['giohang'] = [];
header('location:index.php?pages=co');


}?>
