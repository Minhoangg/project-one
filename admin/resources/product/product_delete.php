<?
try {
    $id = $_GET['id'];
    $delete = new Products();
    if (isset($_POST["delete"])) {
        $delete->delete($id);
        header('location: index.php?pages=product&action=list');
    }
} catch (Exception $e) {
    $error = "Sản phẩm đang có đơn hàng bạn không thể xóa";
}
?>


<?php
if (isset($error)) {
    ?>
    <div class='container'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= $error ?></h5>
                    <a style="color: black; text-docation:none;" href="index.php?pages=product&action=list"><i
                                type="button"
                                class="fa-solid fa-xmark"
                                data-bs-dismiss="modal"
                                aria-label="Close"></i>
                </div>
            </div>
        </div>
    </div>

<?php } else {

    ?>

    <div class='container'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa sản phẩm</h5>
                    <a style="color: black; text-docation:none;" href="index.php?pages=product&action=list"><i
                                type="button"
                                class="fa-solid fa-xmark"
                                data-bs-dismiss="modal"
                                aria-label="Close"></i>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa hay không?</p>
                </div>
                <div class="modal-footer">
                    <form method="post">
                        <button class="btn"><a href="index.php?pages=product&action=list"
                                               class="btn btn-secondary">Hủy</a></button>
                        <button class="btn btn-danger" name='delete'>Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>





