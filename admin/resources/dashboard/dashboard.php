<?php
$data = new thongke();
$counts_user = $data->count_user();
$counts_order = $data->count_order();
$counts_product = $data->count_product();
?>
<div class="page-header">
    <div class="row">
        <div class="col-sm-12 mt-5">
            <h3 class="page-title mt-3">Chúc Bạn Một Ngày Tốt Lành! </h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card board1 fill">
            <div class="card-body">
                <div class="dash-widget-header">
                    <div>
                        <h3 class="card_widget_header"><?= $counts_user ?></h3>
                        <h6 class="text-muted">Tổng số người dùng</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"
                                    fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user-plus">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                                <line x1="23" y1="11" x2="17" y2="11"></line>
                                            </svg></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card board1 fill">
            <div class="card-body">
                <div class="dash-widget-header">
                    <div>
                        <h3 class="card_widget_header"><?= $counts_product?></h3>
                        <h6 class="text-muted">Tổng số hàng hóa</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"
                                    fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-dollar-sign">
                                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                            </svg></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="card board1 fill">
            <div class="card-body">
                <div class="dash-widget-header">
                    <div>
                        <h3 class="card_widget_header"><?= $counts_order ?></h3>
                        <h6 class="text-muted">Tổng số đơn hàng</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"
                                    fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-file-plus">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                </path>
                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                <line x1="12" y1="18" x2="12" y2="12"></line>
                                                <line x1="9" y1="15" x2="15" y2="15"></line>
                                            </svg></span></div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-md-12 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header d-flex justify-content-between">
                <?php
                if (!empty($data->thong_ke_san_pham())):
                ?>
                <h3 class="card-title float-left mt-2">Danh sách thống kê</h3>
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

