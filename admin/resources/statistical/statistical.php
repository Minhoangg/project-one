<?php

$data = new thongke();
?>

<div class="row">
    <div class="col-md-12 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header d-flex justify-content-between">
                <?php
                if (!empty($data->thong_ke_san_pham())):
                ?>
                <h3 class="card-title float-left mt-2">Danh sách loại sản phẩm</h3>
                <a href="index.php?pages=statis&action=chart" class="btn btn-success text-white float-right">Xem biểu đồ<i
                            class="fas fa-eye ml-2"></i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                        <tr>
                            <th>SỐ LƯỢNG LOẠI HÀNG</th>
                            <th>TÊN LOẠI HÀNG</th>
                            <th>GIÁ THẤP NHẤT</th>
                            <th>GIÁ CAO NHẤT</th>
                            <th>GIÁ TRUNG BÌNH</th>
                        </tr>
                        </thead>
                        <tbody class=" table table-bordered">
                        <?php foreach ($data->thong_ke_san_pham() as $tk): ?>

                        <td>
                            <?= $tk['countct'] ?>
                        </td>
                        <td>
                            <?= $tk['name'] ?>
                        </td>
                        <td>
                            <?= $tk['minprice'] ?>
                        </td>
                        <td>
                            <?= $tk['maxprice'] ?>
                        </td>
                        <td>
                            <?= $tk['maxprice'] ?>
                        </td>
                        </tbody>
                        <?php
                        endforeach;
                        ?>

                    </table>

                </div>
            </div>

        </div>

    </div>
</div>

<?php
else:
    ?>
    <div class="card-body">
        Đang cập nhật dữ liệu...
    </div>
<?php
endif;
?>


