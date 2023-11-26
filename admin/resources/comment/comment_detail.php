<div class="row">
    <div class="col-md-12 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title float-left mt-2">Chi tiết bình luận</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                        <tr>
                            <th>Nội dung</th>
                            <th>Ngày bình luận</th>
                            <th>Người bình luận</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody class=" table table-bordered">
                        <?php
                        $showcmt = new comment();
                        $productID = $_GET['id'];
                        $cmt = $showcmt->selectcmtdetail($productID);
                        foreach ($cmt as $listcmt) :
                            extract($listcmt);
                            ?>
                            <tr>
                                <td><?= $listcmt['content'] ?></td>
                                <td><?= $listcmt['created_at'] ?></td>
                                <td><?= $listcmt['name'] ?></td>
                                <td class="text-end d-flex justify-content-around">
                                    <a href="index.php?pages=comments&action=delete&id=<?= $listcmt['idcmt'] ?>"
                                       class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

