<?php
	$page_name = 'KeyGuard - PassManager';
	require_once '../vendor/autoload.php';
	include 'partials/header.php';
	include 'partials/menu.php';
	include 'partials/identity.php';
?>

<section class="see">
	<?php for ($i = 0; $i < 4; $i++) { ?>
		<article class="see__unit" color="">
			<a href="" class="see__unit_link">Facebook</a>
		</article>
	<?php } ?>
</section>

<?php include 'partials/footer.php'; ?>