<?php
$update = new Products();
$categori = new Caterories();
$loai_hang = $categori->caterories_select_all();
if (isset($_GET['id'])) {
    $update = new Products();
    $showif = $update->products_select_by_id($_GET['id']);
}

if (!isset($_GET['id'])) {
    // hiện trang 404
}

$id = $_GET['id'];
$getOneTB = $update->products_select_by_id($id);

if (isset($_POST['btn_update'])) {
    $cate_id = ($_POST['ma_loai']);
    $product_name = ($_POST['ten_hh']);
    $product_special = $_POST['dac_biet'];
    $product_desbribe = ($_POST['mo_ta']);
    $price = ($_POST['don_gia']);
    $price_sale = ($_POST['giam_gia']);
    $created_at = ($_POST['ngay_nhap']);
    $update_at = ($_POST['ngay_cap_nhat']);
    $id = ($_POST['ma_hh']);

    $thoiCapNhat = strtotime($update_at); // chuyển chuỗi
    $thoiThem = strtotime($created_at); // chuyển chuỗi
    date_default_timezone_set('Asia/Ho_Chi_Minh');  // đặt muối giờ việt
    $realtime = date('Y-m-d');   // thời gian hiện tại
    $thoiGianUnix = strtotime($realtime); // chuyển chuỗi


    $up_hinh = save_file("up_hinh", "$UPLOAD_URL/upload/");
    $product_thumbnail = strlen($up_hinh) > 0 ? $up_hinh : $getOneTB["product_thumbnail"];
    $hinh = ($_POST['hinh']);
    $realtime = time();


    if ($thoiCapNhat < $thoiGianUnix) {
        $error_time_update = "Vui lòng chọn đúng ngày cập nhật thông tin.";
    }


    if ($thoiThem > $thoiCapNhat) {
        $error_real_update = "Thời gian thêm không` thể lớn hơn thời gian cập nhật.";
    }

    if ($price_sale > $price) {
        $loiSale = 'Giá giảm không được lớn hơn giá sản phẩm';
    }

    if (empty($price)) {
        $loiGia = 'Đơn giá không được bỏ trống';
    } elseif (!is_numeric($price) || $price <= 0) {
        $loiGia = 'Đơn giá phải là một số nguyên dương';
    }

    if (!isset($loiSale) && !isset($loiGia) && !isset($error_real_update) && !isset($error_time_add) && !isset($error_time_update)) {
        $update->updatepro($cate_id, $product_name, $product_special, $price, $price_sale, $product_desbribe, $product_thumbnail, $update_at, $created_at, $id);
        header('location: index.php?pages=product&action=list');
        exit();
    }

}
?>
<div class="container">
    <div class="row mt-5 m-auto">
        <div class="card col-12 px-0">
            <div class="card-header text-center bg-success-light   text-white text-uppercase">Cập nhật hàng hóa</div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data" id="">
                    <div class=" row">
                        <div class="form-group col-sm-4">
                            <label for="ma_loai" class="form-label">Loại hàng</label>
                            <select name="ma_loai" value="<?= $getOneTB["id"] ?>" class="form-control" id="ma_loai">
                                <?php
                                foreach ($loai_hang as $loai_hang) {
                                    extract($loai_hang);
                                    if ($id == $getOneTB['category_id']) {
                                        $s = "selected";
                                    } else {
                                        $s = "";
                                    }
                                    echo '<option ' . $s . ' value="' . $id . '">' . $name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="ten_hh" class="form-label">Tên hàng hóa</label>
                            <input type="text" name="ten_hh" class="form-control" required
                                   value="<?= $getOneTB["product_name"] ?>" id="ten_hh">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="ma_hh" class="form-label">Mã hàng hóa</label>
                            <input type="text" name="ma_hh" readonly class="form-control" value="<?= $getOneTB["id"] ?>"
                                   id="ma_hh">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <div class="row align-items-center">
                                <div class="col-sm-12">
                                    <label for="up_hinh" class="form-label">Ảnh sản phẩm</label>
                                    <input type="hidden" name="hinh" id="hinh" class="form-control"
                                           value="<?= $getOneTB["product_thumbnail"] ?>">
                                    <input type="file" name="up_hinh" id="up_hinh" class="form-control">
                                </div>

                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="don_gia" class="form-label">Đơn giá (vnđ)</label>
                            <input type="number" name="don_gia" id="don_gia" class="form-control"
                                   value="<?= $getOneTB["price"] ?>">
                            <p style="color: red;">
                                <?php
                                if (isset($loiGia)) {
                                    echo $loiGia;
                                } elseif (isset($loiGia2)) {
                                    echo $loiGia2;
                                }
                                ?>

                        </div>
                        <div class="form-group col-sm-4">
                            <label for="giam_gia" class="form-label">Giảm giá (vnđ)</label>
                            <input type="number" name="giam_gia" id="giam_gia" class="form-control"
                                   value="<?= $getOneTB["price_sale"] ?>">
                            <p style="color: red;">
                                <?php
                                if (isset($loiSale)) {
                                    echo $loiSale;
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">


                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Hàng đặc biệt?</label>
                            <div class="form-control">
                                <label class="radio-inline mr-3">
                                    <input type="radio" value="0"
                                           name="dac_biet" <?= !$showif['product_special'] ? 'checked' : '' ?>>Bình
                                    thường
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="1"
                                           name="dac_biet" <?= $showif['product_special'] ? 'checked' : '' ?>>Đặt biệt
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                            <input type="date" name="ngay_nhap" id="ngay_nhap" class="form-control"
                                   value="<?= $getOneTB["created_at"] ?>">
                            <p style="color: red;">
                                <?
                                if (isset($error_real_update)) {
                                    echo $error_real_update;
                                }
                                ?>

                            </p>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="ngay_cap_nhat" class="form-label">Ngày cập nhật</label>
                            <input type="date" name="ngay_cap_nhat" id="ngay_cap_nhat" class="form-control"
                                   value="<?= $getOneTB["update_at"] ?>">
                            <p style="color: red;">
                                <?
                                if (isset($error_time_update)) {
                                    echo $error_time_update;
                                }
                                ?>
                            </p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="mo_ta" class="form-label">Mô tả sản phẩm</label>
                            <textarea id="txtarea" spellcheck="false" name="mo_ta"
                                      class="form-control form-control-lg mb-3 myTextarea" id="textareaExample" rows="3"
                            ><?= $getOneTB["product_desbribe"] ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <input type="submit" name="btn_update" value="Cập nhật" class="btn btn-info mr-3">
                        <a href="index.php?pages=product&action=list"><input type="button" class="btn btn-success"
                                                                             value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>