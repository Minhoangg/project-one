<?php
//thêm sản phẩm vào giỏ hàng
$order = new  orders();
$html_viewcart = $order->viewcart(1);
if (isset($_POST['addtocart'])) {
    $ten_hh = $_POST['product_name'];
    $ma_hh = $_POST['id'];
    $hinh = $_POST['thumbnail'];
    $don_gia = $_POST['price'];
    if (isset($_POST['qty']) && ($_POST['qty']) > 0) {
        $soluong = $_POST['qty'];
    } else {
        $soluong = 1;
    }

    $flash = 0;
    // kiểm tra sản phẩm có tồn tại trong giỏ hàng hay khong
    // nếu tồn tại cập nhật lại số lượng
    $i = 0;

    foreach ($_SESSION['giohang'] as $sp) {
        if ($sp[1] == $ma_hh) {
            $slmoi = $soluong + $sp[4];
            $_SESSION['giohang'][$i][4] = $slmoi;
            $flash = 1;
            break;
        }
        $i++;
    }
    // ngược lại add sp mới vào giỏ hàng
    if ($flash == 0) {
        $cart = [
            $ten_hh,
            $ma_hh,
            $hinh,
            $don_gia,
            $soluong
        ];
        $_SESSION['giohang'][] = $cart;

    }
    header('location: index.php?pages=cart');
}
//xóa hết tất cả sản phẩm
if (isset($_GET['delall']) && ($_GET['delall'] == 1)) {
    unset($_SESSION['giohang']);
    header('location: index.php?pages=home');
}
//xóa 1 sản phẩm trong giỏ hàng
if (isset($_GET['del']) && ($_GET['del'] >= 0)) {
    array_splice($_SESSION['giohang'], $_GET['del'], 1);
    header('location: index.php?pages=cart');
}else {
if (isset($_SESSION['giohang'])) {
    $tongDonHang = $order->tongDonHang($_SESSION['giohang']);
}
$giaTriVoucher = 0;
if (isset($_GET['voucher']) && $_GET['voucher'] == 1) {
    $tongDonHang = $_POST['tongdonhang'];
    $mavoucher = $_POST['mavoucher'];
    // so sanh mavoucher vừa lấy với voucher có sẳn trong database
    //selet *from where mavoucher = mavoucher
    $giaTriVoucher = 10;
}
$tt = $tongDonHang - $giaTriVoucher;
}
?>

<?php if ($_SESSION['giohang'] != []): ?>


    <form class="bg0 p-t-75 p-b-85" action="index.php?pages=order" method="post">
        <div class="container " >
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart p-3">
                                <?= $html_viewcart ?>

                            </table>

                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                       name="coupon"
                                       placeholder="Nhập Mã Giảm Giá">

                                <a href="index.php?pages=cart&delall=1">
                                    <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                        Xóa tất cả
                                    </div>
                                </a>
                            </div>
                            <a href="index.php?pages=shop">
                                <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                    Xem thêm
                                </div>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Đơn Hàng
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
								<span class="stext-110 cl2">
									Tổng Đơn:
								</span>
                            </div>

                            <div class="size-209">
								<span class="mtext-110 cl2">
									<?php $tongDonHang;
                                     echo $tongDon=number_format($tongDonHang, 0, ",", ".");
                                    ?> VND
								</span>
                            </div>
                        </div>

<!--                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">-->
<!--                            <div class="size-208 w-full-ssm">-->
<!--								<span class="stext-110 cl2">-->
<!--									Shipping:-->
<!--								</span>-->
<!--                            </div>-->
<!---->
<!--                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">-->
<!--                                <p class="stext-111 cl6 p-t-2">-->
<!--                                    There are no shipping methods available. Please double check your address, or-->
<!--                                    contact us if you need any help.-->
<!--                                </p>-->
<!---->
<!--                                <div class="p-t-15">-->
<!--									<span class="stext-112 cl8">-->
<!--										Calculate Shipping-->
<!--									</span>-->
<!---->
<!--                                    <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">-->
<!--                                        <select class="js-select2" name="time">-->
<!--                                            <option>Select a country...</option>-->
<!--                                            <option>USA</option>-->
<!--                                            <option>UK</option>-->
<!--                                        </select>-->
<!--                                        <div class="dropDownSelect2"></div>-->
<!--                                    </div>-->
<!---->
<!--                                    <div class="bor8 bg0 m-b-12">-->
<!--                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state"-->
<!--                                               placeholder="State /  country">-->
<!--                                    </div>-->
<!---->
<!--                                    <div class="bor8 bg0 m-b-22">-->
<!--                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode"-->
<!--                                               placeholder="Postcode / Zip">-->
<!--                                    </div>-->
<!---->
<!--                                    <div class="flex-w">-->
<!--                                        <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">-->
<!--                                            Update Totals-->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
								<span class="mtext-101 cl2">
									Tổng Tiền:
								</span>
                            </div>

                            <div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php $tt;
                                    echo $tongDon=number_format($tt, 0, ",", ".");
                                    ?> VND
								</span>
                            </div>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                           Tiến đến thanh toán
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php else: ?>
    <div class="container">
        <h4 class=" text-warning">không có sản phẩm trong giỏ hàng</h4>
        <a href="index.php?pages=shop">
            <button class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">Xem Thêm</button>
        </a>

    </div>
<?php endif; ?>
