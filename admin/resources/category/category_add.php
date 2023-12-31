<?php
if (isset($_POST['btn_insert'])) {
    $cate = new caterories();
    $name = $_POST['ten_loai'];
    $infor_cate = $cate->loai_exist($name);

    if (empty($name)) {
        $error = "Tên loại không được để trống";
    }
    if (isset($infor_cate) && !empty($name)) {
        $error_name = 'Tên loại hàng đã tồn tại';

    }
    if (!isset($error) && !isset($error_name) ) {
        $cate->caterories_insert($name);
        header('location:index.php?pages=category&action=list');
    }


}
?>

<div class="col-lg-6 m-auto">
    <div class="card">
        <div class="card-header text-center bg-success-light text-white text-uppercase">Thêm Mới Danh Mục</div>
        <div class="card-body">
            <form action="" method="POST" id="add_loai" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="ma_loai" class="form-label">Mã loại</label>
                    <input type="text" name="ma_loai" class="form-control" disabled placeholder="Tự tăng...">
                </div>
                <div class="mb-3">
                    <label for="ten_loai" class="form-label">Tên loại</label>
                    <input type="text" name="ten_loai" class="form-control" id="ten_loai"
                        placeholder="Nhập tên loại...">
                    <p id="ten_loai_error" style="color: red;">
                        <?php
                        if (isset($error)) {
                            echo $error;
                        }
                        if (isset($error_name)) {
                            echo $error_name;
                        }
                        ?>
                    </p>
                </div>
                <p id="ten_hh_error" style="color: red;">
                </p>
                <div class="mb-3 text-center">
                    <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-info mr-3">
                    <a href="index.php?pages=category&action=list"><input type="button" class="btn btn-success"
                            value="Danh sách"></a>
                </div>
            </form>
        </div>
    </div>
</div>