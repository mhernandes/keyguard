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

	$slug = $_GET["edit"];
	$password_data = $password->getPassword($slug);

	if (isset($_POST["update"])) {
		$data = array();
		$data["mk_user"] = $_SESSION["mk_user"];
		$data["title"] = ($_SESSION["mk_user"]);

		$data = array(
			"mk_user" => $_SESSION["mk_user"],
			"title" => $_POST["title"],
			"slug" => strtolower($_POST["title"]),
			"username" => $_POST["username"],
			"email" => $_POST["email"],
			"password" => $_POST["password"]
		);

		$password->setPasswordData($data);
		echo '<pre>';
		print_r($password->updatePassword());
		echo '</pre>';
	}
?>

<section class="edit create">
	<form action="" method="post" class="create__form">
		<label for="name" class="create__form_label">Name</label>
		<input type="text" class="create__form_input" value="<?php echo $password_data["title"]; ?>" name="title" placeholder="Facebook" id="name">

		<label for="email" class="create__form_label">Email</label>
		<input type="text" class="create__form_input" value="<?php echo $password_data["email"]; ?>" name="email" placeholder="your@email.com" id="email">
		
		<label for="username" class="create__form_label">Username</label>
		<input type="text" class="create__form_input" value="<?php echo $password_data["username"]; ?>" name="username" placeholder="@someone" id="username">
		
		<label for="pass" class="create__form_label">Password</label>
		<input type="password" class="create__form_input" value="<?php echo $password_data["password"]; ?>" name="password" id="pass">

		<input type="submit" class="create__form_input" name="update" value="Update">
		<input type="submit" class="create__form_input" name="delete" value="Delete">
	</form>
</section>

<?php include 'partials/footer.php'; ?>