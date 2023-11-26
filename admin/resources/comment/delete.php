<?php ob_start();
if (isset($_POST['delete'])) {
    $id = $_GET['id'];
    $newcmt = new comment();
    $newcmt->delete($id);
    header('Location: index.php?pages=comments&action=list');
}

?>
<div class='container'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xóa Bình Luận</h5>
                <a style="color: black; text-docation:none;" href="index.php?pages=comments&action=list"><i
                            type="button" class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            </a>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa hay không?</p>
            </div>
            <div class="modal-footer">
                <form method="post">
                    <button class="btn"><a href="index.php?pages=comments&action=list"
                                           class="btn btn-secondary">Hủy</a></button>
                    <button class="btn btn-danger" name='delete' type='submit'>Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>