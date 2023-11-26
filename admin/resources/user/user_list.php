<?php
$user = new user();
?>
<div class="row">
    <div class="col-md-12 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header d-flex justify-content-between">
                <?php if (!empty($user->getUser())) :   ?>
                <h3 class="card-title float-left mt-2">Danh sách người dùng</h3>
                <a href="index.php?pages=user&action=add" class="btn btn-success text-white mb-2">Thêm mới
                    <i class="fas fa-plus-circle"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Địa chỉ email</th>
                            <th>Ảnh</th>
                            <th>Vai trò</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ khách hàng</th>
                            <th>Tác vụ</th>
                        </tr>
                        </thead>
                        <tbody class=" table table-bordered">
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
                            <td>
                                <a href="index.php?pages=user&action=edit&id=<?= $users['id']?>"
                                   class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="index.php?pages=user&action=delete&id=<?= $users['id'] ?>"
                                   class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <? endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else : ?>
    <div class="card-body">
        Đang cập nhật dữ liệu...
    </div>
<?php
endif;
?>
