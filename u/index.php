<?php
	$page_name = 'KeyGuard - PassManager';
	include 'partials/header.php';
?>

<?php include 'partials/menu.php'; ?>

<section class="identity">
	<h2 class="identity__title">Title</h2>

	<ul class="identity__buttons">
		<li class="identity__buttons_unit">
			<a href="">A</a>
			<a href="">A</a>
			<a href="">A</a>
			<a href="">A</a>
		</li>
	</ul>
</section>

<section class="see">
	<?php for ($i = 0; $i < 4; $i++) { ?>
		<article class="see__unit" color="">
			<a href="" class="see__unit_link">Facebook</a>
		</article>
	<?php } ?>
</section>

<?php include 'partials/footer.php'; ?>