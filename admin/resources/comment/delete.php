<?php ob_start();
if(isset($_POST['delete'])){
    $id= $_GET['id'];
    $newcmt = new comment();
    $newcmt ->delete($id);
    header('Location: index.php?pages=comments&action=list');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XÓA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <div class='container'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa Bình Luận</h5>
                   <a style="color: black; text-docation:none;" href="index.php?pages=comments&action=list"><i  type="button" class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"></i>
                </div></a> 
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa hay không?</p>
                </div>
                <div class="modal-footer">
                    <form method="post">
                        <button  class="btn"><a href="index.php?pages=comments&action=list"
                                class="btn btn-secondary">Hủy</a></button>
                        <button class="btn btn-primary" name='delete' type='submit'>Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>