<?php
    $od = new orders();
    $us = new user();
if(isset($_GET['id'])){

    $id_order = $_GET['id'];
    $select_order= $od->order_select_by_id($id_order);
    $id_user= $select_order['User_id'];
    $user = $us->selectByID($id_user);



    //lấy dữ liệu sản phẩm
   $pd=$od->order_product_select($id_order);

    $selectOder=$od->selectorder($id_order);

}if(isset($_POST['capnhattt'])){
    $id_order = $_GET['id'];
    $status = $_POST['status'];
    $od->update_order($status,$id_order);
    header('location: index.php?pages=order&action=list');
}
//edit info
if (isset($_POST['btn_edit_info'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $id = $_POST['id'];

    $user = new user();

    $user->updateUserinorder($id,$name, $email,$phone, $address);

    header('location: index.php?pages=order&action=list');
    exit;
}

//end edit info

?>

<div class="tab-content profile-tab-cont">
    <div class="tab-pane fade show active" id="per_details_tab">
        <div class="row">
            <div class="col-lg-9 text-left">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between">
                            <span>Thông Tin Khách Hàng</span>
                            <a class="edit-link" data-toggle="modal"
                               href="#edit_personal_details"><i
                                    class="fa fa-edit mr-1"></i>cập nhật</a>
                        </h5>
                        <div class="row mt-5">
                            <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Họ tên</p>
                            <p class="col-sm-9"><?= $select_order['customer_name'] ?></p>
                        </div>
                        <div class="row">
                            <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Số điện thoại</p>
                            <p class="col-sm-9"><?= $select_order['shipping_address'] ?></p>
                        </div>
                        <div class="row">
                            <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Email</p>
                            <p class="col-sm-9"><?= $select_order['customer_email'] ?></p>
                        </div>
                        <div class="row">
                            <p class="col-sm-3 text-sm-right mb-0">Địa chỉ</p>
                            <p class="col-sm-9 mb-0"><?= $select_order['shipping_address']  ?></p>
                        </div>
                        <div class="row m-3">
                            <p class="col-sm-3 text-sm-right mb-0">Trạng thái đơn hàng</p>
                            <p class="col-sm-9 mb-0 ">
                                <?php

                                  if ( $select_order['status'] == 0) {
                                      echo '<span class= "label bg-primary-light">Đơn hàng mới</span>';
                                  } elseif ( $select_order['status'] == 1) {
                                      echo '<span class="label bg-success">Đơn hàng đã xác nhận</span>';
                                  } elseif ( $select_order['status']== 2) {
                                      echo '<span class="label bg-success-light">Đơn hàng thành công</span>';
                                  } else {
                                      echo '<span class="label bg-danger">Hủy đơn hàng</span>';
                                  }




                                ?>
                            </p>
                        </div>

                    </div>
                </div>



    </div></div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Đơn Giá </th>
                            <th>số lượng</th>
                            <th>Thành Tiền</th>

                        </tr>
                        </thead>
                        <tbody class=" table table-bordered bg-light">
                        <?php foreach ($selectOder as $hh):?>

                    <tr>

                                <td>
                                    <?= $hh['product_name'] ?>
                        </td>
                        <td>
                            <img src="<?=$UPLOAD_URL.'/upload/'.$hh['product_thumbnail'] ?>" width="70"
                                 height="70" alt="NoIMG">
                        </td>
                        <td>
                            <?= number_format($hh['price_sale'], 0, ",", ".") ?>
                        </td>
                        <td><?= $hh['soluong'] ?>
                        </td>

                        <td>
                            <?php
                             $tt = $hh['soluong']*$hh['price_sale'];
                             echo $tong_tien=number_format($tt, 0, ",", ".");
                            ?>

                        </td>

                        </tr>
                        <?endforeach;?>









                        </tbody>
                        <tfoot>
                        <tr>
                        <td colspan =6>
                            Tổng tiền:  <?= $od->tongDonHang($selectOder)?>VND
                        </td>
                        </tr>
                        </tfoot>

                    </table>
                    <form method="post">
                        <div class="form-group">
                            <label>Trạng thái đơn hàng </label>
                            <select name="status" class="form-control">

                                <option value="0"> Đơn hàng mới </option>
                                <option value="1"> Đơn hàng đã xác nhận </option>
                                <option value="2"> Đơn hàng thành công </option>
                                <option value="3"> Hủy đơn hàng </option>
                            </select>
                            <?php
                            if($select_order['status']==2){
                                echo '<span class="text-warning">Đơn hàng đã thành công không thể cập nhật</span>';
                            }elseif ($select_order['status']==3){
                                echo '<span class="text-danger">Đơn hàng đã hủy không thể cập nhật</span>';
                            }
                            else{
                                echo '<button type="submit" name="capnhattt" class="btn btn-success mt-3">
                                cập nhật trạng thái
                            </button>';
                            }
                            ?>
                            <a href="index.php?pages=order&action=list"">
                                <input type="button" class="btn btn-success mt-3" value="Danh sách">
                            </a>

                        </div>

                    </form>
                </div>
            </div>
        </div>
<!--Cập nhật thông tin -->
    <div class="modal fade" id="edit_personal_details" aria-hidden="true"
         role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cập nhật thông tin đơn hàng</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row form-row">

                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input type="text" class="form-control"
                                           value="<?= $user['name'] ?>" name="name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control"
                                           value="<?= $user['phone_number'] ?>" name="phone_number">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control"
                                           value="<?= $user['email'] ?>" name="email">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control"
                                           value="<?= $user['address'] ?>" name="address">
                                </div>
                                <input type="hidden" class="form-control"
                                       value="<?= $user['id'] ?>" name="id">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block"
                                name="btn_edit_info">Lưu thông tin
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

