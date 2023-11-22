
<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Chi tiết bình luận</h4>
    </div>
    <div class="row col-sm-10 mx-auto">
        <div class="box-body mx-auto">
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead >
                        <tr class="bg-dark text-white">
                            <th>Nội dung</th>
                            <th>Ngày bình luận</th>
                            <th>Người bình luận</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $showcmt = new comment();
                    $productID = $_GET['id'];
                   $cmt= $showcmt->selectcmtdetail($productID);
                    foreach ($cmt as $listcmt) :
                        extract($listcmt);

                    ?>
                        <tr>
                            <td><?= $listcmt['content'] ?></td>
                            <td><?= $listcmt['created_at'] ?></td>
                            <td><?= $listcmt['name'] ?></td>
                            <td class="text-end d-flex justify-content-around">
                                <a href="index.php?pages=comments&action=delete&id=<?= $listcmt['idcmt'] ?>" class="btn-outline-info btn-rounded" type="submit"
                                    ><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </form>
        </div>
    </div>
</div>