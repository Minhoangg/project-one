<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách Danh Mục </h4>
    </div>
    <div class="row">
        <div class="cart mx-auto">
            <form action="?btn_delete_all" method="post" class="table-responsive">
                <a href="index.php" class="btn btn-success text-white mb-2">Thêm mới
                    <i class="fas fa-plus-circle"></i></a>
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="bg-dark">
                        <tr class="text-white">
                            <th>Tên hàng hóa</th>
                            <th>Ảnh</th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th>Lượt xem</th>
                            <th>Ngày nhập</th>
                            <th>Đặc biệt</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                        <tr class="mx-auto">

                            <td>
                                
                            </td>
                            <td>
                               
                            </td>
                            <td>
                               đ
                            </td>
                            <td>
                                đ
                            </td>
                            <td>
                               
                            </td>
                            <td>
                                
                            </td>
                            <td>
                               
                            </td>

                            <td class="text-end d-flex justify-content-around">
                                <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-outline-danger btn-rounded" onclick="return checkDelete()"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    
                    ?>
                    </tbody>
                </table>


            </form>
        </div>
    </div>
</div>