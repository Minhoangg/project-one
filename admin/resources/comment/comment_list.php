<div class="row">
    <div class="col-md-12 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title float-left mt-2">Danh sách bình luận</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                        <tr>
                            <th>Tên hàng hóa</th>
                            <th>Số bình luận</th>
                            <th>Mới nhất</th>
                            <th>Cũ nhất</th>
                            <th>Chi tiết</th>
                        </tr>
                        </thead>
                        <tbody class=" table table-bordered">
                        <?php
                        $showcmt = new comment();

                        $cmt = $showcmt->selectcmt();
                        foreach ($cmt as $listcmt) :
                            extract($listcmt);
                            ?>
                            <tr>
                                <td><?= $listcmt['product_name'] ?></td>
                                <td><?= $listcmt['soluong'] ?></td>
                                <td><?= $listcmt['cunhat'] ?></td>
                                <td><?= $listcmt['moinhat'] ?></td>
                                <td class="text-center  "><span class="badge badge-pill bg-success inv-badge"><a
                                                href="index.php?pages=comments&action=detail&id=<?= $id ?>"
                                                class="text-white" type="submit">Chi tiết</a></span>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
