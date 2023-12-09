<?php

$od = new orders();
if(isset($_POST['id'])){
    $id = $_POST['id'];
   $getOneod = $od->order_select_by_id($id);
}
?>

<div class="container mt-5 mb-5 "style="height: 250px">
    <div class="row dis-flex">
        <div class="col-md-6 text-center">
            <form action="" method="post" class="form-inline">
                <div class="input-group flex-col-b">
                    <label for=""> <h2>Nhập mã đơn hàng để theo dõi</h2> </label><br>
                    <input type="text" name="id"  class="form-control w-100 p-2" placeholder="Tìm kiếm...">

                        <button type="submit" class="btn btn-primary p-2 mt-3">Tìm</button>

                </div>

            </form>
        </div>
    </div>
</div>
<?php
if(!empty($getOneod)):?>

    <div class="container">
        <h4 class=" text-warning">tìm thấy đơn hàng với mã là: <?=$id=$_POST['id']?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="">
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Địa Chỉ</th>
                    <th>Trạng Thái</th>
                    <th>Tác vụ</th>
                </tr>
                </thead>
                <tbody class=" table table-bordered">


                    <tr>
                        <td>
                            <?= $getOneod['id'] ?>
                        </td>

                        <td>
                            <?= $getOneod['created_at'] ?>
                        </td>
                        <td>
                            <?= $getOneod['shipping_address'] ?>
                        </td>
                        <td class="text-white">
                            <?php if ($getOneod['status']==0){
                                echo '<span class= "badge bg-primary">Đơn hàng mới</span>';
                            } elseif ($getOneod['status']==1){
                                echo '<span class="badge bg-info">Đơn hàng đã xác nhận</span>';
                            }elseif ($getOneod['status']==2){
                                echo '<span class="badge bg-success-light">Đơn hàng thành công</span>';
                            }else{
                                echo '<span class="badge bg-danger">Đơn Hàng Đã Hủy </span>';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="index.php?pages=order_detail&id=<?= $getOneod['id'] ?>"
                               class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i>Chi Tiết</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


<?php else:?>
    <div class="container m-5">
      <?php
        if(isset($_POST['id'])){
            $id=$_POST['id'];
            echo '<h4 class=" text-warning">không tìm thấy đơn hàng với mã '.$id.' </h4>';
        }
           ?>
    </div>
<?php endif;?>
