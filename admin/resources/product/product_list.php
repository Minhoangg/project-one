<?
$product = new Products();
?>
<div class="row">
    <div class="col-md-12 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header d-flex justify-content-between">
                <? if (!empty($product->selectProductAll())): ?>
                <h3 class="card-title float-left mt-2">Danh sách sản phẩm</h3>
                <a href="index.php?pages=product&action=add" class="btn btn-success text-white mb-2">Thêm mới
                    <i class="fas fa-plus-circle"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th>Lượt xem</th>
                            <th>Ngày nhập</th>
                            <th>Đặt biệt</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody class=" table table-bordered">
                        <?php foreach ($product->selectProductAll() as $hh): ?>
                            <tr>

                                <td>
                                    <?= $hh['product_name'] ?>
                                </td>

                                <td><img src="<?= $UPLOAD_URL . '/upload/'. $hh['product_thumbnail'] ?>" width="70"
                                         height="70" alt="NoIMG"></td>


                                <td>
                                    <?= number_format($hh['price'], 0, ",", ".") ?>
                                </td>
                                <td>
                                    <?php
                                    $giam_gia = number_format($hh['price_sale'], 0, ",", ".") * 1000;
                                    echo '- ' . $giam_gia . ' vnd';
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
                                       class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                    <a href="index.php?pages=product&action=delete&id=<?= $hh['id'] ?>"
                                       class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <? endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
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
