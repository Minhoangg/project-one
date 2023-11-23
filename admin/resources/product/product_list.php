<?
$product = new Products();

// $up_img = save_file("up_hinh", "$UPLOAD_URL/upload/");
// $thumbnail = strlen($up_img) > 0 ? $up_img : $thumbnail;
?>
<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách hàng hóa</h4>
    </div>
    <div class="row">
        <div class="cart mx-auto">
            <form action="" method="post" class="table-responsive">
                    <? if (!empty($product->selectProductAll())): ?>
                        <a href="index.php?pages=product&action=add" class="btn btn-success text-white mb-2">Thêm mới
                        <i class="fas fa-plus-circle"></i>
                    </a>
                    <table width="100%" class="table table-hover table-bordered text-center">
                        <thead class="bg-dark">
                            <tr class="text-white">
                                <th>Tên hàng hóa</th>
                                <th>Ảnh</th>
                                <th>Đơn giá</th>
                                <th>Giảm giá</th>
                                <th>Lượt xem</th>
                                <th>Ngày nhập</th>
                                <th>Đặc biệt</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($product->selectProductAll() as $hh): ?>
                                <tr>

                                    <td>
                                        <?= $hh['product_name'] ?>
                                    </td>


                                    <td> <img src="<?= $UPLOAD_URL . '/upload/' . $hh['product_thumbnail'] ?>" width="100"
                                            height="100" alt="NoIMG"></td>


                                    <td>
                                        <?= number_format($hh['price'], 0, ",", ".") ?>
                                    </td>
                                    <td>
                                        <?php

                                        $giam_gia = number_format($hh['price_sale'], 0, ",", ".") * 1000;
                                        echo '- '. $giam_gia .' vnd' ;
                                        ?>
                                    </td>

                                    <td>
                                        <?= $hh['product_views'] ?>
                                    </td>

                                    <td>
                                        <?= $hh['created_at'] ?>
                                    </td>

                                    <td>
                                        <?= $hh['product_special'] ?>
                                    </td>
                                    <td>
                                        <a href="index.php?pages=product&action=edit&id=<?= $hh['id'] ?>"
                                            class="btn btn-primary">Sửa</a>
                                        <a onclick="return confirm('bạn có muốn xóa : <?= $hh['ten_hh'] ?>')"
                                            href="index.php?pages=product&action=delete&id=<?= $hh['id'] ?>"
                                            class="btn btn-danger">Xóa</a>
                                    </td>


                                </tr>

                            <? endforeach; ?>
                        </tbody>

                        <?php

                        ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <?php
else:?>
    <a href="index.php?pages=product&action=add" class="btn btn-success text-white mb-2">
    <i class="fas fa-plus-circle"></i>
        Đang cập nhật dữ liệu
    </a>
    <?php endif; ?>