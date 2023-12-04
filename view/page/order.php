<?php
$order = new orders();
$showgh = $order->viewcart(0);
$tongDonHang = $order->tongDonHang($_SESSION['giohang']);
//$td = $order->tongDonHang();

if (isset($_SESSION['khach_hang'])) {
    $ten_nguoi_nhan = $_SESSION['khach_hang']['ho_ten'];
    $diachi_nguoinhan = $_SESSION['khach_hang']['dia_chi'];
    $email_nguoinhan = $_SESSION['khach_hang']['email'];
    $dienthoai_nguoinhan = $_SESSION['khach_hang']['sdt'];
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
        <form action="index.php?pg=xndonhang" method="post">
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
                    <h2>ĐƠN HÀNG</h2>
                    <div >
                        <div class="boxcart mt-2">
                            <?php
                            //  var_Dump($_SESSION['giohang']);
                            //  exit();
                            foreach ($_SESSION['giohang'] as $sp) {
                                echo '<span>Tên sản Phẩm: ' . $sp['0'] . '<br>  Số Lượng: ' . $sp['4'] . '</span>';
                            }
                            ?>

                            <h3 class="p-2">Tổng:
                                <?php $tongDonHang;
                                echo $tongDon=number_format($tongDonHang, 0, ",", ".");
                                ?> VND
                            </h3>
                        </div>
                    </div>

                    <div class="coupon">
                        <div class="boxcart">
<!--                            <h3>Vouche: </h3>-->
                        </div>
                    </div>
                    <div class="pttt p-2">
                        <div class="boxcart">
                            <h3>Phương thức thanh toán: </h3>
                            <input type="radio" name="pttt" value="0" id="" checked> Tiền mặt<br>
                            <input type="radio" name="pttt" value="1" id=""> Chuyển khoản<br>

                        </div>
                    </div>
                    <div class="total">
                        <div class="boxcart bggray mt-3 mb-3">
                            <h3>Tổng thanh toán:
                                <?php $tongDonHang;
                                echo $tongDon=number_format($tongDonHang, 0, ",", ".");
                                ?> VND
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