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
                    <div class="col-6 textchitiet">
                        <h2 class="m-all-3">
                            Tên Sản Phẩm : <?= $product_detail['product_name']?>
                        </h2>
                        <h4 class="text-danger mt-3">
                            Giá Sản Phẩm :<?= $product_detail['price']?>
                        </h4>
                        <form action="index.php?pages=cart" method="post">
                            <input type="hidden" name="product_name" value="<?= $product_detail['product_name']?>">
                            <input type="hidden" name="id" value="<?= $product_detail['id']?>">
                            <input type="hidden" name="thumbnail" value="<?= $product_detail['product_thumbnail']?>">
                            <input type="hidden" name="price" value="<?= $product_detail['price']?>">
                            <label for="">số Lượng</label>
                            <div class="wrap-num-product flex-w  m-r-3 m-2">
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

                <div class="row">
                    <div class="h3 ">Đánh giá</div>

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

