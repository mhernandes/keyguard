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
	
	$all_passwords = $password->getAllPasswords($_SESSION["mk_user"]);
?>

<section class="see">
	<?php
		foreach ($all_passwords as $pass) {
			echo '<article class="see__unit" color="'.$pass["slug"].'">';
			echo '<a href="edit.php?edit='.$pass["slug"].'" class="see__unit_link">'.$pass["title"].'</a>';
			echo '</article>';
		}
	?>
</section>

<?php include 'partials/footer.php'; ?>