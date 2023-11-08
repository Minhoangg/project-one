
<div class="container" >
    <div  class="row mt-5 col-11 m-auto">
        <div class="card mx-auto" >
            <div class="card-header text-center bg-dark text-white text-uppercase">Thêm mới khách hàng</div>
            <div class="card-body" >
                <form action="index.php" method="POST" enctype="multipart/form-data" id="admin_add_kh">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="ma_kh" class="form-label">Mã khách hàng</label>
                            <input type="text" name="ma_kh" id="ma_kh" class="form-control" disabled placeholder="Mã khách hàng tự tăng.">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="ho_ten" class="form-label">Họ và tên</label>
                            <input type="text" name="ho_ten" id="ho_ten" class="form-control" required placeholder="Nhập họ và tên...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="mat_khau" class="form-label">Mật khẩu</label>
                            <input type="password" name="mat_khau" id="mat_khau" class="form-control" required placeholder="Nhập mật khẩu...">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="mat_khau" class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" name="mat_khau2" class="form-control" required placeholder="Nhập lại mật khẩu...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="hinh" class="form-label">Ảnh</label>
                            <input type="file" name="up_hinh" id="hinh" class="form-control" >
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email" class="form-label">Địa chỉ email</label>
                            <input type="email" name="email" id="email" class="form-control" required placeholder="Nhập địa chỉ email...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Vai trò</label>
                            <div class="form-control d-flex justify-content-around">
                                <label class="radio-inline mr-3">
                                    <input type="radio" value="0" name="vai_tro">Khách hàng
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="1" name="vai_tro" checked>Nhân viên
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 text-center mt-3">     
                        <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-info mr-3">
                        <a href="index.php?btn_list"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>