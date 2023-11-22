<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XÓA</title>
</head>
<body>
    <div class='container'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa khách hàng</h5>
                    <a style="color: black; text-docation:none;" href="index.php?pages=user&action=list"><i  type="button" class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa hay không?</p>
                </div>
                <div class="modal-footer">
                    <form method="post">
                        <button class="btn"><a href="index.php?pages=user&action=list"
                                class="btn btn-secondary">Hủy</a></button>
                        <button class="btn btn-primary" name='delete'>Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
$user = new user();
if (isset($_POST["delete"])) {
$id=$_GET['id'];
$user -> deleteUser($id); 
header('Location: index.php?pages=user&action=list');
}
?>
<?php ob_end_flush(); ?>