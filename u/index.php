<?php
	session_start();
	$page_name = 'KeyGuard - PassManager';
	require_once '../vendor/autoload.php';
	include 'partials/header.php';
	include 'partials/menu.php';
	include 'partials/identity.php';
	include '../vendor/autoload.php';

	use Key\ManagePassword;
	use Auth\ManageSession;

	$password = new ManagePassword();
	$session = new ManageSession();
	$session->check();
	$all_passwords = $password->getAllPasswords($_SESSION["mk_user"]);
?>

<section class="see">
	<?php
		foreach ($all_passwords as $pass) {
			echo '<article class="see__unit" color="'.$pass["slug"].'">';
			echo '<a href="" class="see__unit_link">'.$pass["title"].'</a>';
			echo '</article>';
		}
	?>
</section>

<?php include 'partials/footer.php'; ?>