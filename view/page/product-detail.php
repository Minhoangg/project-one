<?php
if (isset($_GET['id'])) {
$id = $_GET['id'];
$pd = new Products();
$cata = new caterories();
$product_detail = $pd->products_select_by_id($id);

$category_id = $product_detail['category_id'];
$splq = $pd->getdssplq($category_id, $id, 4);
$html_splq = $pd->showproduct($splq);
}

if (isset($_POST['submit_bl']) && ($_POST['submit_bl'])){
    //input
    $cm = new comment();
    $ma_hh = $_POST['ma_hh'];
    $ma_kh = $_POST['ma_kh'];
    $noi_dung = $_POST['binhlluan'];
    $ngay_bl = date_format(date_create(), 'Y-m-d');
    $cm->binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl);
    header('location: index.php?pages=product_detail&id='.$ma_hh);


}
$cm = new comment();
$dsbl =$cm->getAllComment($_GET['id']);
$html_dsbl = $cm->showbl($dsbl);

?>
<section class="container">
    <!-- <div class="container"> -->
    <div class="row col-sm-12">
<!--        <div class="boxleft mr2pt menutrai col-4">-->
<!--            <h1>DANH MỤC</h1><br><br>-->
<!--        </div>-->
        <div class="boxright col-12">
            <h1>SẢN PHẨM CHI TIỂT</h1><br>
            <div class="">
                <div class="row">
                    <div class="col-6">
                        <img style="height:70%" class="w-100" src="<?= $UPLOAD_URL . '/upload/'. $product_detail['product_thumbnail'] ?>" alt="đang cập nhật">
                    </div>
                    <div class="col-6 textchitiet flex">
                       <div class="mb-3">
                            <span class="h2">
                           <?= $product_detail['product_name']?>
                        </span>
                       </div>
                        <div class="mb-3">
                            <span class="h3 text-danger "><?= $product_detail['price_sale'].' VND'?></span>
                            <del class="h4 ml-4"><?= $product_detail['price'].' VND'?></del>
                        </div>
                        <div class="flex-column">
                            <span class="h4">kích thước</span><br>
                            <button class="btn btn-secondary mt-3 mb-3">S</button>
                            <button class="btn btn-secondary mt-3 mb-3">M</button>
                            <button class="btn btn-secondary mt-3 mb-3">L</button>


                        </div>




                        <form action="index.php?pages=cart" method="post">
                            <input type="hidden" name="product_name" value="<?= $product_detail['product_name']?>">
                            <input type="hidden" name="id" value="<?= $product_detail['id']?>">
                            <input type="hidden" name="thumbnail" value="<?= $product_detail['product_thumbnail']?>">
                            <input type="hidden" name="price" value="<?= $product_detail['price_sale']?>">
                            <label for="">số Lượng</label>
                            <div class="wrap-num-product flex-w  m-r-3 m-2 mb-3">
                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                </div>

                                <input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="1">

                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                </div>
                            </div>


                            <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" type="submit" name="addtocart">Đặt hàng</button>
                        </form>
                    </div>


                </div>
                <?php if (isset($_SESSION['user'])):?>
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="post" >
                                <div class="comment-form-comment m-3">
                                    <label for="comment">
                                        Nhận xét của bạn <?= $_SESSION['user']['name'] ?>
                                    </label><br>
                                    <textarea class="form-control" placeholder="đánh giá sản phẩm" id="comment" name="binhlluan" cols="50" rows="3" required=""></textarea>
                                    <input type="hidden" name="ma_hh" value="<?= $product_detail['id'] ?>">
                                    <input type="hidden" name="ma_kh" value="<?= $_SESSION['user']['id'] ?>">
                                    <input class="btn btn-danger mt-3" type="submit" name="submit_bl" value="GỬI">
                                </div>

                            </form>
                        </div>
                    </div>
                <?php else: echo '<a class="text-warning" href="index.php?pages=login">đăng nhập để bình luận!</a>'; ?>
                <?php endif; ?>

                <div class="row ">
                    <div class=" col-sm-6 "><span class="h3">Đánh giá Sản Phẩm</span>
                    <div>
                        <?php
                        if(isset($html_dsbl)&&($html_dsbl!=="")) {
                            echo $html_dsbl;
                        }else{
                          echo "sản phẩm chưa có bình luận" ;
                            }
                         ?>
                    </div>
                    </div>
                    <div class=" col-sm-6 ">
                        <span class="h3 text-center">Thông Tin Sản Phẩm</span>
                        <div class="mota"> <?= $product_detail['product_desbribe']?></div>
                    </div>

                </div>

            </div>
            <hr>
            <h1>SẢN PHẨM LIÊN QUAN</h1>
            <div class="row">
                <?= $html_splq ?>
            </div>
        </div>

    </div>


    </div>
</section>

