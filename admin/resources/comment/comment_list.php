<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách bình luận</h4>
    </div>
    <div class="row col-sm-10 mx-auto">
        <div class="box-body mx-auto">
            <table width="100%" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>Tên hàng hóa</th>
                        <th>Số bình luận</th>
                        <th>Mới nhất</th>
                        <th>Cũ nhất</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
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
                            <td class="text-end d-flex justify-content-around">
                            <a href="index.php?pages=comments&action=detail&id=<?= $id ?>" class="btn-outline-info btn-rounded" type="submit">Chi tiết</a>
                        </tr>
                    <?php endforeach; ?>

                </tbody>

            </table>
            </form>
        </div>
    </div>
</div>