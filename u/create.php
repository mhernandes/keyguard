<?php
	session_start();
	$page_name = 'KeyGuard - PassManager';
	include 'partials/header.php';
	include 'partials/menu.php';
	include 'partials/identity.php';
	include '../vendor/autoload.php';
	use Key\ManagePassword;
	use Auth\ManageSession;

	$password = new ManagePassword();
	$session = new ManageSession();
	$session->check();

	if (isset($_POST['create'])) {
		$data = array(
			"mk_user" => $_SESSION["mk"],
			"title" => $_POST["title"],
			"slug" => strtolower($_POST["title"]),
			"email" => $_POST["email"],
			"password" => $_POST["password"]
		);

		$password->setPasswordData($data);
		if ($password->createPassword()) {
			echo 'Go!';
		} else {
			echo 'Failed!';
		}
	}
?>

<section class="create">
	<form action="" method="post" class="create__form">
		<label for="" class="create__form_label">Name</label>
		<input type="text" class="create__form_input" name="title" placeholder="Facebook" id="">

		<label for="" class="create__form_label">Email</label>
		<input type="text" class="create__form_input" name="email" placeholder="your@email.com" id="">
		<button class="create__form_button">Standard</button>
		
		<label for="" class="create__form_label">Username</label>
		<input type="text" class="create__form_input" name="username" placeholder="@someone" id="">
		
		<label for="" class="create__form_label">Password</label>
		<input type="password" class="create__form_input" name="password" id="">
		
		<label for="" class="create__form_label">Confirm Password</label>
		<input type="password" class="create__form_input" id="">

		<input type="submit" class="create__form_input" name="create" value="Create">
	</form>
</section>

<?php include 'partials/footer.php'; ?>