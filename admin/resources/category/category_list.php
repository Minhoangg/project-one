<?php

$cata = new caterories();
$dslh = $cata->caterories_select_all_desc();


?>
<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách Danh Mục </h4>
    </div>
    <div class="row">
        <div class="cart col-12">
            <form action="?btn_delete_all" method="post" class="table-responsive">
                <a href="index.php?pages=category&action=add" class="btn btn-success text-white mb-2">Thêm mới
                    <i class="fas fa-plus-circle"></i></a>
                <?php
                if (!empty($dslh)):

                    ?>

                    <table  class="table table-hover table-bordered text-center col-12">
                        <thead class="bg-dark">
                        <tr class="text-white">
                            <th>Mã Loại</th>
                            <th>Tên Loại</th>
                            <th>Tác Vụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dslh as $lh): ?>
                            <tr>
                                <td>
                                    <?= $lh['id'] ?>
                                </td>

                                <td>
                                    <?= $lh['name'] ?>
                                </td>
                                <td>
                                    <div class="m-3">
                                        <a href="index.php?pages=category&action=edit&id=<?= $lh['id'] ?>"
                                           class="btn btn-primary">Sửa</a>

                                        <a href="index.php?pages=category&action=delete&id=<?= $lh['id'] ?>"
                                           class="btn btn-danger">Xóa</a>
                                    </div>
                                </td>


                            </tr>
                        <?php
                        endforeach;
                        ?>

                        </tbody>

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


            </form>
        </div>
    </div>
</div>