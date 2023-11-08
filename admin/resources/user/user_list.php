<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách khách hàng</h4>
    </div>
    <div class="row col-sm-12 mx-auto">
        <div class=" mx-auto">
            <a href="index.php" class="btn btn-success text-white mb-2">Thêm mới
                <i class="fas fa-plus-circle"></i></a>
            <table width="100%" class="table table-hover table-bordered text-center ">
                <div>
                    <tr class="bg-dark text-white">
                        <th>Mã KH</th>
                        <th>Họ và tên</th>
                        <th>Địa chỉ email</th>
                        <th>Ảnh</th>
                        <th>Vai trò</th>
                        <th>Tác vụ</th>
                    </tr>
                </div>
                <tbody>

                        <tr>
                           
                            <td>
                                <img src="<?= $UPLOAD_URL . '/users/' . $hinh ?>" alt="" width="40px" height="30px">
                            </td>
                          
        
                            <td class="text-end d-flex justify-content-around">
                                <a href="" class="btn btn-outline-primary btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded" onclick="return checkDelete()"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                </tbody>

            </table>

            </form>
        </div>
    </div>
</div>