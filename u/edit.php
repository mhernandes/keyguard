<?php
	session_start();
	$page_name = 'KeyGuard - PassManager';
	require_once '../vendor/autoload.php';

	use Key\ManagePassword;
	use Auth\ManageSession;

	$password = new ManagePassword();
	$session = new ManageSession();
	$session->check();

	include 'partials/header.php';
	include 'partials/menu.php';
	include 'partials/identity.php';
	
	if (!isset($_GET["edit"])) {
		header("location: /keyguard/u/");
	}
?>

<section class="edit create">
	<form action="" class="create__form">
		<label for="" class="create__form_label">Name</label>
		<input type="text" class="create__form_input" name="" placeholder="Facebook" id="">

		<label for="" class="create__form_label">Email</label>
		<input type="text" class="create__form_input" name="" placeholder="your@email.com" id="">
		
		<label for="" class="create__form_label">Username</label>
		<input type="text" class="create__form_input" name="" placeholder="@someone" id="">
		
		<label for="" class="create__form_label">Password</label>
		<input type="password" class="create__form_input" name="" id="">

		<input type="submit" class="create__form_input" value="Update">
		<input type="submit" class="create__form_input" value="Delete">
	</form>
</section>

<?php include 'partials/footer.php'; ?>