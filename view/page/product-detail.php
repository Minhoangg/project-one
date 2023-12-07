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

if (isset($_POST['submit_bl']) && ($_POST['submit_bl'])) {
    //input
    $cm = new comment();
    $ma_hh = $_POST['ma_hh'];
    $ma_kh = $_POST['ma_kh'];
    $noi_dung = $_POST['binhlluan'];
    $ngay_bl = date_format(date_create(), 'Y-m-d');
    $cm->binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl);
    header('location: index.php?pages=product_detail&id=' . $ma_hh);


}
$cm = new comment();
$dsbl = $cm->getAllComment($_GET['id']);
$html_dsbl = $cm->showbl($dsbl);

?>
<section class="container">
    <!-- <div class="container"> -->
    <div class="row col-sm-12">
        <!--        <div class="boxleft mr2pt menutrai col-4">-->
        <!--            <h1>DANH MỤC</h1><br><br>-->
        <!--        </div>-->
        <div class="boxright col-12">
            <div class="row" style="background-color: #f8f8f8">
                <div class="col-6 p-4">
                    <img style="height:100%" class="w-100"
                         src="<?= $UPLOAD_URL . '/upload/' . $product_detail['product_thumbnail'] ?>"
                         alt="đang cập nhật">
                </div>
                <div class="col-6 p-4 textchitiet flex">
                    <div class="mb-3">
                            <span class="h2">
                           <?= $product_detail['product_name'] ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <span class="h3 text-danger "><?= $product_detail['price_sale'] . ' VND' ?></span>
                        <del class="h4 ml-4"><?= $product_detail['price'] . ' VND' ?></del>
                    </div>
                    <div class="flex-column">
                        <span class="h4">kích thước</span><br>
                        <button class="btn btn-secondary mt-3 mb-3">S</button>
                        <button class="btn btn-secondary mt-3 mb-3">M</button>
                        <button class="btn btn-secondary mt-3 mb-3">L</button>


                    </div>
                    <form action="index.php?pages=cart" method="post">
                        <input type="hidden" name="product_name" value="<?= $product_detail['product_name'] ?>">
                        <input type="hidden" name="id" value="<?= $product_detail['id'] ?>">
                        <input type="hidden" name="thumbnail" value="<?= $product_detail['product_thumbnail'] ?>">
                        <input type="hidden" name="price" value="<?= $product_detail['price_sale'] ?>">
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


                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04"
                                type="submit" name="addtocart">Đặt hàng
                        </button>
                    </form>
                    <div class=" col-sm-12 mt-3 ">
                        <div class="mota"> <?= $product_detail['product_desbribe'] ?></div>
                    </div>
                </div>


            </div>
            <?php if (isset($_SESSION['user'])): ?>
                <div class="row mt-5 mb-5" style="border: 1px solid #cccccc">
                    <div class="col-12">
                        <form action="" method="post">
                            <div class="comment-form-comment m-3">
                                <label for="comment">
                                    Bình luận sản phẩm
                                </label><br>
                                <textarea class="form-control" placeholder="đánh giá sản phẩm" id="comment"
                                          name="binhlluan" cols="50" rows="3" required=""></textarea>
                                <input type="hidden" name="ma_hh" value="<?= $product_detail['id'] ?>">
                                <input type="hidden" name="ma_kh" value="<?= $_SESSION['user']['id'] ?>">
                                <input class="btn btn-danger mt-3" type="submit" name="submit_bl" value="GỬI">
                            </div>

                        </form>
                    </div>
                    <div class="col-12">
                        <div class=" col-sm-6 ">
                            <div>
                                <?php
                                if (isset($html_dsbl) && ($html_dsbl !== "")) {
                                    echo $html_dsbl;
                                } else {
                                    echo "sản phẩm chưa có bình luận";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php else: echo '   <div class="row mt-5" style="border: 1px solid #cccccc"> <div class="col-12">
                            <div class="comment-form-comment m-3">
                                <label for="comment">
                                    Bình luận sản phẩm
                                </label><br>
                                <textarea class="form-control" placeholder="đánh giá sản phẩm" id="comment"
                                          name="binhlluan" cols="50" rows="3" required=""></textarea>
                                <input class="btn btn-danger mt-3" type="submit" value="GỬI">
                                <a class="text-warning" href="index.php?pages=login">Bạn hãy đăng nhập để có thể bình luận</a>
                            </div>
                    </div> </div> '; ?>
            <?php endif; ?>


        </div>
        <hr>
        <div><h3>SẢN PHẨM LIÊN QUAN</h3></div>

        <div>
            <?= $html_splq ?>
        </div>


    </div>

    </div>


    </div>
</section>

