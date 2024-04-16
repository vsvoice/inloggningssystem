<?php	
include_once 'includes/header.php';

if(isset($_POST['register-submit'])) {
	$feedbackMessages = $user->checkUserRegisterInput($_POST['uname'], $_POST['umail'], $_POST['upass'], $_POST['upassrepeat']);

    if($feedbackMessages === 1) {
        $user->register($_POST['uname'], $_POST['umail'], $_POST['upass']);
    } else {
		foreach($feedbackMessages as $message) {
			echo $message;
		}
    }
}
?>


<div class="container">

	<h1>Sign Up Form</h1>

	<form action="" method="post">

		<label for="uname">Username</label><br>
		<input class="mb-2" type="text" name="uname" id="uname" required="required"><br>

		<label for="umail">Email</label><br>
		<input class="mb-2" type="email" name="umail" id="umail" required="required"><br>

		<label for="upass">Password</label><br>
		<input class="mb-2" type="password" name="upass" id="upass" required="required"><br>

		<label for="upass-repeat">Repeat Password</label><br>
		<input class="mb-2" type="password" name="upassrepeat" id="upassrepeat" required="required"><br>

		<input type="submit" name="register-submit" value="Sign Up">
		
	</form>
</div>

<?php
include_once 'includes/footer.php';
?>