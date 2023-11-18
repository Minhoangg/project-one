<?php

$data = new thongke();
?>

<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">THỐNG KÊ HÀNG HÓA </h4>
    </div>
    <?php


    if (!empty($data->thong_ke_san_pham())):

    ?>
    <div class="row">
        <div class="box mx-auto">
            <table width="100%" class="table table-hover table-bordered text-center">
                <thead class="bg-dark">
                    <tr class="text-white">
                        <th>SỐ LƯỢNG LOẠI HÀNG</th>
                        <th>TÊN LOẠI HÀNG</th>
                        <th>GIÁ THẤP NHẤT</th>
                        <th>GIÁ CAO NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data->thong_ke_san_pham() as $tk): ?>

                <td>
                    <?=$tk['countct'] ?>
                </td>
                <td>
                    <?=$tk['name'] ?>
                </td>
                <td>
                    <?=$tk['minprice'] ?>
                </td>
                <td>
                    <?=$tk['maxprice'] ?>
                </td>
                <td>
                    <?=$tk['maxprice'] ?>
                </td>
                </tbody>
                <?php
                endforeach;
                ?>

            </table>
            <?php
            else:
                ?>
                <div class="card-body">
                    dang cap nhat du lieu
                </div>
            <?php
            endif;
            ?>
            <a href="index.php?pages=statis&action=chart" class="btn btn-success text-white float-right">Xem biểu đồ<i class="fas fa-eye ml-2"></i></a>
        </div>
    </div>
</div>
