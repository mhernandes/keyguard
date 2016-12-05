<?php
	$page_name = 'Login';
	include('u/partials/header.php');
?>

<section class="login">
	<form action="" class="login__form" method="post">
		<label class="login__form_label" for="email">Email</label>
		<input type="text" class="login__form_input" id="email" name="email" placeholder="Email">
		
		<label class="login__form_label" for="pass">Password</label>
		<input type="text" class="login__form_input" id="pass" name="password" placeholder="Password">
		
		<input type="submit" class="login__form_submit" value="Log in" name="submit">
		<a href="" class="login__form_forgot">Forgot your password?</a>
	</form>
</section>

<?php include('u/partials/footer.php'); ?>