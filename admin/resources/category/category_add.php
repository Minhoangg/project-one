<?php
if(isset($_POST['btn_insert'])&& ($_POST['ten_loai'] !="")){
    $name= $_POST['ten_loai'];
    $cata = new caterories();
    $cata->caterories_insert($name);
    header('location:http://qa.com/admin/index.php?pages=category&action=list');
}

?>

<div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header text-center bg-dark text-white text-uppercase">Thêm mới loại hàng</div>
                <div class="card-body">
                    <form action="" method="POST" id="add_loai" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <label for="ma_loai" class="form-label">Mã loại</label>
                            <input type="text" name="ma_loai" class="form-control" disabled placeholder="Tự tăng...">
                        </div>
                        <div class="mb-3">
                            <label for="ten_loai" class="form-label">Tên loại</label>
                            <input type="text" name="ten_loai" class="form-control" id="ten_loai" placeholder="Nhập tên loại...">
                            <p id="ten_loai_error" style="color: red;"></p>
                        </div>
                        <p id="ten_hh_error" style="color: red;">
                        </p>
                        <div class="mb-3 text-center">
                            <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-info mr-3">
                            <a href="index.php?pages=category&action=list"><input type="button" class="btn btn-success" value="Danh sách"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>