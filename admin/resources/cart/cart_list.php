<?
$order = new orders();

?>
<div class="row">
    <div class="col-md-12 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header d-flex justify-content-between">

                <h3 class="card-title float-left mt-2">Danh sách Đơn Hàng</h3>
                <? if (!empty($order->order_select_all())): ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                        <tr>
                            <th>Mã Đơn Hàng</th>
                            <th>Ngày Đặc Hàng</th>
                            <th>Địa Chỉ</th>
                            <th>Trạng Thái</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody class=" table table-bordered">

                        <?php foreach ($order->order_select_all() as $od): ?>
                            <tr>

                                <td>
                                    <?= $od['id'] ?>
                                </td>

                                <td>
                                    <?= $od['created_at'] ?>
                                </td>
                                <td>
                                    <?= $od['shipping_address'] ?>
                                </td>

                                <td>
                                    <?php if ($od['status']==0){
                                        echo '<span class= "label bg-primary-light">đơn hàng mới</span>';
                                    } elseif ($od['status']==1){
                                        echo '<span class="label bg-success">đơn hàng đã xác nhận</span>';
                                    }elseif ($od['status']==2){
                                        echo '<span class="label bg-success-light">đơn hàng thành công</span>';
                                    }else{
                                        echo '<span class="label bg-danger">hủy đơn hàng</span>';
                                    }

                                    ?>
                                </td>

                                <td>
                                    <a href="index.php?pages=order&action=detail&id=<?= $od['id'] ?>"
                                       class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
<!--                                    <a href="index.php?pages=product&action=delete&id=--><?php //= $hh['id'] ?><!--"-->
<!--                                       class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>-->
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
