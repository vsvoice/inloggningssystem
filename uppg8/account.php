<?php
include_once 'includes/functions.php';	
include_once 'includes/header.php';

$user->checkLoginStatus();

$test = $user->checkUserRole(10);

// var_dump($test);

if(isset($_POST['edit-user-submit'])) {
	$feedbackMessages = $user->checkUserRegisterInput($_POST['uname'], $_POST['umail'], $_POST['upassnew'], $_POST['upassrepeat']);

    if($feedbackMessages === 1) {
        $user->editUserInfo($_SESSION['user_id'], $_POST['uname'], $_POST['umail'], $_POST['upass'], $_POST['upassnew'], $_POST['upassrepeat']);
    } else {
		foreach($feedbackMessages as $message) {
			echo $message;
		}
    }
}
?>

<div class="container">

<h1>Edit User</h1>

<form action="" method="post">

    <label for="uname">Username</label><br>
    <input class="mb-2" type="text" name="uname" id="uname" value="<?php echo $_SESSION['user_name'] ?>" required="required"><br>

    <label for="umail">Email</label><br>
    <input class="mb-2" type="email" name="umail" id="umail" required="required" value="<?php echo $_SESSION['user_email'] ?>" required="required"><br>

    <label for="upass">Password</label><br>
    <input class="mb-2" type="password" name="upass" id="upass" required="required"><br>

    <label for="upassnew">New Password</label><br>
    <input class="mb-2" type="password" name="upassnew" id="upassnew" required="required"><br>

    <label for="upassrepeat">Repeat Password</label><br>
    <input class="mb-2" type="password" name="upassrepeat" id="upassrepeat" required="required"><br>

    <input type="submit" name="edit-user-submit" value="Update">
    
</form>



</div>

<?php
include_once 'includes/footer.php';
?>