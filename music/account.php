<?php
	session_start();

	ob_start();

	$pageTitle = $_SESSION['username'];

	include("inc/header.php");

	if($_SERVER['REQUEST_METHOD']== 'POST')
	{
		session_destroy();
		header ('Location: index.php');
	}
?>

<?php 
	if($_SESSION['username'] == "")
	{ ?>

	<div class="jumbotron">
		<p>Already have an account? <a href="login.php">Log in!</a></p>
	</div>
<?php
	}else{ ?> 
<div class="container">
	<form method="POST" action="account.php">
	<input type="submit" class="btn btn-default btn-lg" value="Log out"> 
	</form>
</div>

<?php } ?>

<?php
include("inc/footer.php");
?>

