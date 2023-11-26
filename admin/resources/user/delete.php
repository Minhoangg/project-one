<?php
if (isset($_SESSION['admin'])) {
    extract($_SESSION['admin']);
}

    $user = new user();
    if (isset($_POST["delete"])) {
        $iduser = $_GET['id'];
        if ($id == $iduser){
            $error =  'Bạn không thể xóa chính mình';
        }else{
            $user->deleteUser($iduser);
            header('Location: index.php?pages=user&action=list');
        }
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
                    <a style="color: black; text-docation:none;" href="index.php?pages=user&action=list"><i type="button"class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
            </div>
        </div>
    </div>
<?php
}else{
    ?>
    <div class='container'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xóa khách hàng</h5>
                <a style="color: black; text-docation:none;" href="index.php?pages=user&action=list"><i type="button"class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa hay không?</p>
            </div>
            <div class="modal-footer">
                <form method="post">
                    <button class="btn"><a href="index.php?pages=user&action=list"
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

<?php ob_end_flush(); ?>