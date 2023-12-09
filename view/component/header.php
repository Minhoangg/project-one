<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->


			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="#" class="logo">
						<img src="../content/contentCilent/images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php?pages=home">Trang chủ</a>
							</li>

							<li class="">
								<a href="index.php?pages=shop">Sản phẩm</a>
							</li>

							<li>
								<a href="index.php?pages=blog">Bài viết</a>
							</li>

							<li>
								<a href="index.php?pages=about">Giới thiệu</a>
							</li>

							<li>
								<a href="index.php?pages=contact">Liên hệ</a>
							</li>
						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " >
							<a href="index.php?pages=cart" class="zmdi zmdi-shopping-cart text-dark "></a>
						</div>
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 "  style="position: relative">
                            <?php
                            if (isset($_SESSION['user'])){
                                extract($_SESSION['user']);
                                ?>
                                <img src="<?= $UPLOAD_URL . '/user/' . $thumbnail ?>" alt="" style="border-radius: 50%;" width="40px" onclick="toggleMenu()">
                                <?php
                            }else{
                                ?>
                                    <a href="index.php?pages=login" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " >
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>
                                <?php
                            }
                            ?>
                            <div class="menu-info-wrap " id="menuinfo" >
                                <div class="menu-info">
                                    <div class="uer-info">
                                        <img src="<?= $UPLOAD_URL . '/user/' . $thumbnail ?>">
                                        <h3><?=  $name ?></h3>
                                    </div>
                                    <hr>
                                    <a href="" class="menu-link" >
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>Thông tin</p>
                                        <span> > </span>
                                    </a>
                                    <a href="index.php?pages=oderview" class="menu-link" >
                                        <i class="fa fa-building" aria-hidden="true"></i>
                                        <p>Đơn hàng</p>
                                        <span> > </span>
                                    </a>
                                    <a  href="index.php?pages=logout"  class="menu-link" >
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        <p>Đăng xuất</p>
                                        <span> > </span>
                                    </a>
                                </div>
                            </div>
                        </div>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.html"><img src="../content/contentCilent/images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Trang chủ</a>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">Sản phẩm</a>
				</li>

				<li>
					<a href="blog.html">Bài viết</a>
				</li>

				<li>
					<a href="about.html">Giới thiệu</a>
				</li>

				<li>
					<a href="contact.html">Liên hệ</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="../content/contentCilent/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>



<script>
    function toggleMenu() {
        let submenu = document.getElementById("menuinfo");
        if (submenu.style.display === "none" || submenu.style.display === "") {
            submenu.style.display = "block";
        } else {
            submenu.style.display = "none";
        }
    }
</script>