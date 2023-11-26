<?php
$create = new Products();
$categori = new caterories();
$infoCate = $categori->caterories_select_all();

if (isset($_POST['btn_insert'])) {
    $category_id = $_POST['ma_loai'];
    $product_name = ($_POST['ten_hh']);
    $product_special = ($_POST['dac_biet']);
    $product_desbribe = ($_POST['mo_ta']);
    $price = ($_POST['don_gia']);
    $price_sale = ($_POST['giam_gia']);
    $created_at = ($_POST['ngay_nhap']);
    $thoiGianNhap = strtotime($created_at); // chuyển chuỗi

    date_default_timezone_set('Asia/Ho_Chi_Minh');  // đặt muối giờ việt
    $realtime = date('Y-m-d');   // thời gian hiện tại
    $thoiGianUnix = strtotime($realtime); // chuyển chuỗi


    $product_thumbnail = save_file("hinh", "$UPLOAD_URL/upload/");


    if ($price_sale > $price) {
        $loiSale = 'Giá giảm không được lớn hơn giá sản phẩm';
    }
    if (empty($price_sale)) {
        $error_price_sale = 'Giá giảm không được để trống';
    }
    if (empty($category_id)) {
        $loiMa = 'Tên loại không được bỏ trống';
    }
    if (empty($product_name)) {
        $loiTen = 'Tên hàng hóa không được bỏ trống';
    }
    if (empty($product_desbribe)) {
        $loiMoTa = 'Mô tả không được bỏ trống';
    }
    if (empty($price)) {
        $loiGia = 'Đơn giá không được bỏ trống';
    } elseif (!is_numeric($price) || $price <= 0) {
        $loiGia = 'Đơn giá phải là một số nguyên dương';
    }

    if ($thoiGianNhap < $thoiGianUnix) {
        $error_real_time = "Vui lòng chọn đúng ngày thêm";
    }
    if (empty($product_thumbnail)) {
        $error_thumbnail = "Ảnh không để trống";
    }

    if (!isset($error_price_sale) && !isset($loiMa) && !isset($loiTen) && !isset($loiLoai) && !isset($loiMoTa) && !isset($loiGia) && !isset($loiSale) && !isset($loiNgay) && !isset($loiHinh) && !isset($error_real_time) && !isset($error_thumbnail)) {
        $create->insertProducts($category_id, $product_name, $product_desbribe, $price_sale, $product_thumbnail, $price, $created_at, $product_special);
        header('location: index.php?pages=product&action=list');
        exit();
    }
}

?>


<div class="container">
    <div class="row mt-5 m-auto">
        <div class="card col-12 px-0">
            <div class="card-header text-center bg-success-light  text-white text-uppercase">Thêm Sản Phẩm</div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" id="add_hang_hoa"
                      onsubmit="return validateForm()">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="ma_loai" class="form-label">Loại hàng</label>
                            <select name="ma_loai" class="form-control" id="ma_loai">
                                <?php
                                foreach ($infoCate as $infoCate) {
                                    extract($infoCate);
                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                }
                                ?>
                            </select>
                            <p style="color: red;">
                                <?php if (isset($loiMa))
                                    echo $loiMa ?>
                            </p>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="ma_hh" class="form-label">Mã hàng hóa</label>
                            <input type="text" name="ma_hh" id="ma_hh" readonly class="form-control"
                                   value="Tự động">
                            <?php if (isset($loiMa))
                                echo $loiMa ?>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Đặc biệt</label>
                            <div class="form-control">
                                <label class="radio-inline  mr-3">
                                    <input type="radio" value="1" name="dac_biet">Đặc biệt
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="0" name="dac_biet" checked>Bình thường
                                </label>
                                <p style="color: red;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="ten_hh" class="form-label">Tên hàng hóa</label>
                            <input type="text" name="ten_hh" id="ten_hh" class="form-control">
                            <p id="ten_hh_error" style="color: red;">
                                <? if (isset($loiTen))
                                    echo $loiTen ?>
                            </p>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="hinh" class="form-label">Ảnh sản phẩm</label>
                            <input type="file" name="hinh" id="hinh" class="form-control">
                            <p id="don_gia_error" style="color: red;">
                                <? if (isset($error_thumbnail))
                                    echo $error_thumbnail;
                                ?>
                            </p>

                        </div>
                        <div class="form-group col-sm-4">
                            <label for="don_gia" class="form-label">Đơn giá (vnđ)</label>
                            <input type="number" name="don_gia" id="don_gia" class="form-control">
                            <p id="don_gia_error" style="color: red;">
                                <?
                                if (isset($loiGia)) {
                                    echo $loiGia;
                                }
                                if (isset($error_price)) {
                                    echo $error_price;
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="giam_gia" class="form-label">Giảm giá (vnđ)</label>
                            <input type="number" name="giam_gia" id="giam_gia" class="form-control">
                            <p style="color: red;">
                                <?php
                                if (isset($loiSale)) {
                                    echo $loiSale;
                                }
                                if (isset($error_price_sale)) {
                                    echo $error_price_sale;
                                }


                                ?>
                            </p>
                        </div>
                        <div class="form-group col-sm-4">
                            <?php $today = date_format(date_create(), 'Y-m-d'); ?>
                            <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                            <input type="date" name="ngay_nhap" id="ngay_nhap" class="form-control"
                            >
                            <p style="color: red;">
                                <? if (isset($error_real_time))
                                    echo $error_real_time ?>
                            </p>
                        </div>
                        <div class="form-group col-sm-4">
                            <?php $today = date_format(date_create(), 'Y-m-d'); ?>
                            <label for="ngay_cap_nhat" class="form-label">Ngày cập nhật</label>
                            <input type="date" name="ngay_cap_nhat" id="ngay_cap_nhat" class="form-control"
                                   disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="mo_ta" class="form-label">Mô tả sản phẩm</label>
                            <textarea id="txtarea" spellcheck="false" name="mo_ta"
                                      class="form-control form-control-lg mb-3 myTextarea" id="textareaExample"
                                      rows="3"></textarea>
                            <p id="mo_ta_error" style="color: red;">
                                <? if (isset($loiMoTa))
                                    echo $loiMoTa ?>
                            </p>
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-info mr-3">
                        <a href="index.php?pages=product&action=list"><input type="button" class="btn btn-success"
                                                                             value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>