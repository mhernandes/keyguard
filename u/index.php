<?php
	$page_name = 'KeyGuard - PassManager';
	include 'partials/header.php';
	include 'partials/menu.php';
	include 'partials/identity.php';
	include "dao/access.class.php";

	$ac = new Access();
?>

<section class="see">
	<?php for ($i = 0; $i < 4; $i++) { ?>
		<article class="see__unit" color="">
			<a href="" class="see__unit_link">Facebook</a>
		</article>
	<?php } ?>
</section>

<?php include 'partials/footer.php'; ?>