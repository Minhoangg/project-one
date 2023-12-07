<?php
$order = new orders();
$showgh = $order->viewcart(0);
$tongDonHang = $order->tongDonHang($_SESSION['giohang']);
//$td = $order->tongDonHang();

if (isset($_SESSION['user'])) {
    $ten_nguoi_nhan = $_SESSION['user']['name'];
    $diachi_nguoinhan = $_SESSION['user']['address'];
    $email_nguoinhan = $_SESSION['user']['email'];
    $dienthoai_nguoinhan = $_SESSION['user']['phone_number'];
} else {
    $tbchuadangnhap = "Bạn chưa đăng nhập";
    $ten_nguoi_nhan = "";
    $diachi_nguoinhan = "";
    $email_nguoinhan = "";
    $dienthoai_nguoinhan = "";
}
?>



<!--<div class="container">-->
<!--    <div class="">ĐƠN HÀNG</div>-->
<!--</div>-->

<section class="container">
    <div class="container">
        <form action="index.php?pages=commit" method="post">
            <div class="row">
                <div class="col-8 viewcart">
                    <div class="ttdathang">
                        <h2>Thông tin người đặt hàng</h2>
                        <div class="span text-danger">
                            <?php
                            if (isset($tbchuadangnhap)) {
                                echo $tbchuadangnhap;
                            } else {
                                $tbchuadangnhap = '';
                            }
                            ?>
                        </div>


                        <label for="hoten"><b>Họ và tên</b></label>
                        <input class="form-control" type="text" placeholder="Nhập họ tên đầy đủ"
                               name="hoten_nguoinhan" id="hoten" value="<?= $ten_nguoi_nhan ?>" required>

                        <label for="diachi"><b>Địa chỉ</b></label>
                        <input class="form-control" type="text" placeholder="Nhập địa chỉ" name="diachi_nguoinhan"
                               id="diachi" value="<?= $diachi_nguoinhan ?>" required>

                        <label for="email"><b>Email</b></label>
                        <input class="form-control" type="text" placeholder="Nhập email" name="email_nguoinhan"
                               id="email" value="<?= $email_nguoinhan ?>" required>

                        <label for="dienthoai"><b>Điện thoại</b></label>
                        <input class="form-control" type="text" placeholder="Nhập điện thoại"
                               name="dienthoai_nguoinhan" id="dienthoai" value="<?= $dienthoai_nguoinhan ?>" required>
                    </div>
                    <br>

                    <!-- show gio hang -->
                    <div class="div">
                        <?php
                        if ($showgh != ""): ?>
                            <table class="table table-bordered table-hover table-responsive text-center">
                                <?= $showgh ?>
                            </table>
                        <?php else: ?>
                            <div class="card-body">
                                dang cap nhat du lieu
                            </div>
                        <? endif; ?>
                    </div>
                    <!-- ket thuc show gio hang -->

                </div>
                <div class="col-4 ">
                    <h2 class="text-center mb-3">ĐƠN HÀNG</h2>
                    <?php
                            foreach ($_SESSION['giohang'] as $sp):
                    ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?=$sp['0']?></h6>
                            <small class="text-muted"><?=$sp['3'].' x '.$sp['4'];

                            ?></small>
                        </div>
                        <span class="text-muted"><?php  $get_price=$sp['3']* $sp['4'];
                             echo number_format($get_price, 0, ",", ".")?></span>
                    </li>
                    <?php endforeach;?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng thành tiền</span>
                        <strong><?php $tongDonHang;
                            echo $tongDon=number_format($tongDonHang, 0, ",", ".");
                            ?> VND</strong>
                    </li>
                    <div class="coupon">
                        <div class="boxcart">
<!--                            <h3>Vouche: </h3>-->
                        </div>
                    </div>
                    <div class="pttt p-2 justify-content-center">
                        <h3 class=text-center>Phương Thức Thanh Toán</h3>

                        <div class="ml-4">

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="pttt" id="pttt" checked value="0">
                                <label class="form-check-label" for="pttt">
                                    <img class="how-itemcart1" src="../<?= $UPLOAD_URL ?>/upload/thanh-toan-truc-tuyen.jpg" > Thanh Toán Trực Tiếp
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pttt" id="pttt" value="1">
                                <label class="form-check-label" for="pttt">
                                    <img class="how-itemcart1" src="<?= $UPLOAD_URL ?>/upload/vnpay.png" > Thanh Toán VNPAY
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pttt" id="pttt" value="2">
                                <label class="form-check-label" for="pttt">
                                    <img class="how-itemcart1" src="<?= $UPLOAD_URL ?>/upload/paypay.png" > Thanh Toán PayPay
                                </label>
                            </div>
                    </div>
                    <div class="total">
                        <div class="boxcart bggray mt-3 mb-3">
                            <h3>Tổng Tiền:
                                <?php $tongDonHang;
                                echo $tongDon=number_format($tongDonHang, 0, ",", ".");
                                ?> VND
                                <input type="hidden" name="total" value="<?=$tongDonHang?>">
                            </h3>
                        </div>
                    </div>
                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit" name = "hhthanhtoan">Thanh Toán</button>
                </div>
            </div>
        </form>
    </div>
</section>




<!--<script>-->
<!--    var ttnhanhang = document.getElementById("ttnhanhang");-->
<!--    ttnhanhang.style.display = "none";-->
<!--    function showttnhanhang() {-->
<!--        if (ttnhanhang.style.display == "none") {-->
<!--            ttnhanhang.style.display = "block";-->
<!--        } else {-->
<!--            ttnhanhang.style.display = "none";-->
<!--        }-->
<!--    }-->
<!---->
<!---->
<!--</script>-->

</body>

</html>