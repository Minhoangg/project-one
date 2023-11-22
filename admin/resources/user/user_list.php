<?php
$user = new user();
?>
<div class="container">
    <?php if (!empty($user->getUser())) :   ?>
        <div class="page-title">
            <h4 class="mt-5 font-weight-bold text-center">Danh sách khách hàng</h4>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <form action="?btn_delete_all" method="post" class="table-responsive">
                    <table width="100%" class="table table-hover table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Họ và tên</th>
                                <th>Địa chỉ email</th>
                                <th>Ảnh</th>
                                <th>Vai trò</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ khách hàng</th>
                                <th><a href="index.php" class="btn btn-success text-white">Thêm mới
                                        <i class="fas fa-plus-circle"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($user->getUser() as $users) :
                            ?>
                                <tr>
                                    <td><?= $users['id'] ?></td>
                                    <td><?= $users['name'] ?></td>
                                    <td><?= $users['email'] ?></td>
                                    <td><img src="<?=$UPLOAD_URL .'/user/' . $users['thumbnail'] ?>" width="50" height="50" alt="NoIMG"></td>
                                    <td><?= $users['role'] ?></td>
                                    <td><?= $users['phone_number'] ?></td>
                                    <td><?= $users['address'] ?></td>
                                    <td class="text-end">
                                        <a href="index.php?pages=user&action=edit&id=<?= $users['id']?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                        <a href="index.php?pages=user&action=delete&id=<?= $users['id'] ?>" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                        </tbody>

                    </table>
                <?php else : ?>
                    <div class="card-body">
                        Đang cập nhật dữ liệu...
                    </div>
                <?php
            endif;
                ?>
                </form>
            </div>
        </div>
</div>