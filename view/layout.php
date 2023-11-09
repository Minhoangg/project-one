<!DOCTYPE html>
<html lang="en">

<?php
include './component/stylesheet.php';
?>

<body class="animsition">

	<!-- Header -->
	<?php
	include './component/header.php';
	?>


	<?php

    $pages = "home";
	if (isset($_GET['pages'])) {
		$pages = $_GET['pages'];
		switch ($pages) {
			case 'home':
				include './page/home.php';
				break;
			case 'shop':
				include './page/shop.php';
				break;
			case 'blog':
				include './page/blog.php';
                break;
			case 'about';
				include './page/about.php';
                break;
			case 'contact':
				include './page/contact.php';
                break;
            case 'cart':
                include './page/cart.php';
                break;
			default:
				include './page/home.php';
				break;
		}
	}
	?>


	<!-- Footer -->
	<?php
	include './component/footer.php';
	?>


	<!-- Back to top -->
	<?php
	include './page/back-to-top.php';
	?>

	<!-- Modal1 -->
	<?php
	include './page/product-detail.php';
	?>

	<!--===============================================================================================-->
	<script src="../content/contentCilent/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../content/contentCilent/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../content/contentCilent/vendor/bootstrap/js/popper.js"></script>
	<script src="../content/contentCilent/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../content/contentCilent/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function () {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="../content/contentCilent/vendor/daterangepicker/moment.min.js"></script>
	<script src="../content/contentCilent/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="../content/contentCilent/vendor/slick/slick.min.js"></script>
	<script src="../content/contentCilent/js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="../content/contentCilent/vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="../content/contentCilent/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function () { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="../content/contentCilent/vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="../content/contentCilent/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function (e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function () {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function () {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function () {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function () {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function () {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function () {
				swal(nameProduct, "is added to cart !", "success");
			});
		});

	</script>
	<!--===============================================================================================-->
	<script src="../content/contentCilent/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function () {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function () {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="../content/contentCilent/js/main.js"></script>

</body>

</html>