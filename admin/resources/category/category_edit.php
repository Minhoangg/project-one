<?php
$cata = new caterories();
if (!isset($_GET['id'])) {
    //code trang 404

}
$id = $_GET['id'];
$getOneTB =$cata->caterories_select_by_id($id);
//kiểm tra người dùng có click vào nút add hay không
if (isset($_POST['capnhatlh'])) {
    $name = $_POST['name'];
    $id = $_POST['malh'];
    $cata->caterories_update($name,$id);
    header('location:index.php?pages=category&action=list');
}
?>
<div class="container mt-5" >
    <div class="row">
        <div class="card mx-auto col-12 px-0">
            <div class="card-header text-center bg-success-light text-white text-uppercase">Cập nhật loại hàng</div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="malh" class="form-label">MÃ LOẠI HÀNG </label>
                            <input type="text" name="malh" id="malh" class="form-control"
                                   value="<?= $getOneTB['id'] ?>" readonly>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="name" class="form-label">TÊN LOẠI HÀNG</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="<?= $getOneTB['name'] ?? ''; ?>">
                        </div>
                    </div>
                    <div class="row m-3 ">
                        <div class="col text-center">
                            <a href=""></a>
                            <input class="btn btn-primary" type="submit" name="capnhatlh" value="cập nhật">
                            <a href=""><input class="btn btn-primary" type="reset" value="Nhập Lại"></a>
                            <a href="index.php?pages=category&action=list">
                                <input class="btn btn-primary" type="button" value="Danh Sách">
                            </a>
                        </div>

                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
