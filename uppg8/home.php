<?php
include_once 'includes/functions.php';	
include_once 'includes/header.php';

$user->checkLoginStatus();

$test = $user->checkUserRole(10);

var_dump($test);
?>

<div class="container">

<?php
echo "<h2>Welcome {$_SESSION['user_name']}</h2>";
?>

</div>

<?php
include_once 'includes/footer.php';
?>