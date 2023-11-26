<?php
$cata = new caterories();
$dslh = $cata->caterories_select_all_desc();
?>
<div class="row">
    <div class="col-md-12 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header d-flex justify-content-between">
                <?php
                if (!empty($dslh)):
                ?>
                <h3 class="card-title float-left mt-2">Danh sách loại sản phẩm</h3>
                <a href="index.php?pages=category&action=add" class="btn btn-success text-white mb-2">Thêm mới
                    <i class="fas fa-plus-circle"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                        <tr>
                            <th>Mã Loại</th>
                            <th>Tên Loại</th>
                            <th>Tác Vụ</th>
                        </tr>
                        </thead>
                        <tbody class=" table table-bordered">
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
                                           class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                        <a href="index.php?pages=category&action=delete&id=<?= $lh['id'] ?>"
                                           class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
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
        dang cap nhat du lieu
    </div>
<?php
endif;
?>
