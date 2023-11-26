<?php
if (isset($_SESSION['admin'])) {
    extract($_SESSION['admin']);
}
?>
<div class="header">
    <div class="header-left">
        <a href="index.html" class="logo">  <span class="logoclass">CSS Store</span> </a>
    </div>
    <a href="javascript:void(0);" id="toggle_btn"> <i class="fa-solid fa-bars"></i></a>
    <a class="mobile_btn " id="mobile_btn"> <i class="fa-solid fa-bars"></i> </a>

    <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img
                            class="rounded-circle" src="<?= $UPLOAD_URL . '/user/' . $thumbnail ?>"
                            width="31" alt="Soeng Souy"></span> </a>
            <div class="dropdown-menu">

                <div class="user-header">
                    <div class="avatar avatar-sm"><img src="<?= $UPLOAD_URL . '/user/' . $thumbnail ?>"
                                                       alt="User Image" class="avatar-img rounded-circle"></div>
                    <div class="user-text">
                        <h6><?=
                            $name
                            ?></h6>
                        <p class="text-muted mb-0">Quản Lý</p>
                    </div>
                </div>
                <a class="dropdown-item" href="index.php?pages=account&action=info">Thông tin người dùng </a>
                <a class="dropdown-item" href="index.php?pages=account&action=logout">Đăng Xuất</a>
            </div>
        </li>
    </ul>
    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>