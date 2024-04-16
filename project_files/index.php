<?php
include_once 'includes/config.php';	
include_once 'includes/functions.php';	

include_once 'includes/header.php';

if(isset($_POST['user-login'])) {
 $errorMessages = $user->login($_POST['uname'], $_POST['upass']);

}
?>


<div class="container">

<?php
	if(isset($_GET['newuser'])) {
		echo "<div class='alert alert-success text-center' role='alert'>
			You have successfully signed up. Please login using the form below.
		</div>";
	}

	if(isset($errorMessages)) {
		
		echo "<div class='alert alert-danger text-center' role='alert'>";
		foreach($errorMessages as $message) {
			echo $message;
		}
		echo "</div>";$message;
	}
?>

	<h1>Login Form</h1>

	<form action="" method="post">

		<label for="uname">Username or Email</label><br>
		<input class="mb-2" type="text" name="uname" id="uname"><br>

		<label for="upass">Password</label><br>
		<input class="mb-2" type="password" name="upass" id="upass"><br>

		<input type="submit" name="user-login" value="Login">
		
	</form>
</div>

<?php
include_once 'includes/footer.php';
?>