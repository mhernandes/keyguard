<?php
	$page_name = 'KeyGuard - PassManager';
	include 'partials/header.php';
?>

<?php include 'partials/menu.php'; ?>

<?php include 'partials/identity.php'; ?>

<section class="create">
	<form action="" class="create__form">
		<label for="" class="create__form_label">Name</label>
		<input type="text" class="create__form_input" name="" placeholder="Facebook" id="">

		<label for="" class="create__form_label">Email</label>
		<input type="text" class="create__form_input" name="" placeholder="your@email.com" id="">
		<button class="create__form_button">Standard</button>
		
		<label for="" class="create__form_label">Username</label>
		<input type="text" class="create__form_input" name="" placeholder="@someone" id="">
		
		<label for="" class="create__form_label">Password</label>
		<input type="password" class="create__form_input" name="" id="">
		
		<label for="" class="create__form_label">Confirm Password</label>
		<input type="password" class="create__form_input" name="" id="">

		<input type="submit" class="create__form_input" value="Create">
	</form>
</section>

<?php include 'partials/footer.php'; ?>