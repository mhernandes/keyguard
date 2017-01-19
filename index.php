<?php
	session_start();
	require 'vendor/autoload.php';
	use Auth\ManageLogin;
	use Auth\ManageSession;
	$login = new ManageLogin();
	$session = new ManageSession();

	if (isset($_POST["logging"])) {
		$login_data = array(
			"email" => $_POST["email"],
			"password" => $_POST["password"]
		);

		$login->set($login_data);
		$user_data = $login->check();
		if($user_data) {
			$session_data = array(
				"mk" => $user_data["mk"],
				"name" => $user_data["name"],
				"email" => $user_data["email"]
			);
			
			$session->setSessionData($session_data);
			$session->registerSessionData();
			$session->redirect("u/");
		} else {
			echo 'fail';
		}
	}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<style>@import url(https://fonts.googleapis.com/css?family=Roboto:300,400,500,700);a,a:active,a:visited,ul{list-style-type:none}*{font-family:Roboto,sans-serif;font-weight:300;box-sizing:border-box;border:none;margin:0;padding:0;z-index:0}a,a:active,a:visited{text-decoration:none}a,p,span{font-size:17px}section{width:100%;height:auto}h1,h2,h3,h4,h5,h6{font-weight:400}h1{font-size:32px}h2{font-size:24px}h3{font-size:18.5px}h4{font-size:16px}h5{font-size:13.5px}h6{font-size:11px}button,input,textarea{display:block;resize:none}button,input[type=button],input[type=submit]{cursor:pointer}.login{background-color:#24313C;height:100vh;-webkit-display:flex;-moz-display:flex;-ms-display:flex;-o-display:flex;display:flex;-webkit-flex-flow:wrap row;-moz-flex-flow:wrap row;-ms-flex-flow:wrap row;-o-flex-flow:wrap row;flex-flow:wrap row;-webkit-justify-content:center;-moz-justify-content:center;justify-content:center;-webkit-align-items:center;align-items:center;align-content:center;-webkit-align-content:center}.login__form{flex:0 0 20%;height:auto;background-color:rgba(255,255,255,.12);padding:10px}.login__form_forgot,.login__form_input,.login__form_label,.login__form_submit{color:#fff;display:block;width:100%;height:auto}.login__form_input{padding:8px 13px;background-color:transparent;border:2px solid rgba(255,255,255,.09)}@media screen and (max-width:760px){.login__form_input{font-size:17px}}.login__form_label{font-size:15px;padding:9px 7px 2px 0;font-weight:400;margin-top:10px}.login__form_label:first-child{margin-top:0;padding-top:0}@media screen and (max-width:760px){.login__form_label{font-size:17px}}.login__form_submit{background-color:#24313C;border-bottom:3px solid rgba(0,0,0,.4);margin:15px auto 7px;padding:10px 15px;font-size:12px;text-transform:uppercase;font-weight:700}@media screen and (max-width:760px){.login__form_submit{font-size:15px}}.login__form_forgot{font-size:13px;color:rgba(255,255,255,.7);text-align:right}@media screen and (max-width:760px){.login__form_forgot{font-size:15px}}@media screen and (max-width:960px){.login__form{flex-basis:50%}}@media screen and (max-width:500px){.login__form{flex-basis:80%}}@media screen and (max-width:300px){.login__form{flex-basis:95%}}</style>
</head>
<body>

<section class="login">
	<form action="" class="login__form" method="post">
		<label class="login__form_label" for="email">Email</label>
		<input type="text" class="login__form_input" id="email" name="email" placeholder="Email">
		
		<label class="login__form_label" for="pass">Password</label>
		<input type="password" class="login__form_input" id="pass" name="password" placeholder="Password">
		
		<input type="submit" class="login__form_submit" value="Log in" name="logging">
		<a href="" class="login__form_forgot">Forgot your password?</a>
	</form>
</section>

</body>
</html>