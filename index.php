<?php 

	session_start();

	$pageTitle = "Home";
	include('inc/header.php'); 

	//-------------------------------------------------------------
	include('model/user_file.php');

	$user = new User("carlos");
	//echo '<pre>';

	//echo $user->give_username();
	//echo "\n";
	//echo '<img src=' . '"' . $user->give_img_string() . '">';

	//echo '</pre>';

	//------------------------------------------------------------

	/*
	Testing for managing files and user-files
	*/
	if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['username'] == 'romsearcher')
	{
		$uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/music/files/';
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

		echo '<pre>';

		echo $uploaddir;

		echo $_FILES['userfile']['tmp_name'];

		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		    echo "File is valid, and was successfully uploaded.\n";
		} else {
		    echo "Possible file upload attack!\n";
		}

		echo 'Here is some more debugging info:';
		print_r($_FILES);

		print "</pre>";

		echo '<img src="files/'. $_FILES['userfile']['name'] .'">';
	}

?>

<div class="jumbotron main">
	<div class="container">
		<h1>Hello World</h1>
		<p>We create music, we enjoy it</p>
	</div>
</div>

<div class = "container">
	<div class="panel panel-default col-md-6">
	  <div class="panel-body">
	    <p><strong>This is something special</strong></p>
	    <p>We have an idea, we make it real.</p>
	  </div>
	</div>

	<div class="panel panel-default col-md-6">
	  <div class="panel-body">
	    <p><strong>Extending music dynamics</strong></p>
	    <p>The strength behind unity.</p>
	  </div>
	</div>
</div>

<div class="container comments">
	<div class="jumbotron comment-jumbo col-md-6">
		<h2>User's Comments</h2>
		<div class="media">
		  <a class="pull-left" href="#">
		    <img class="media-object" src="img/pato.jpeg">
		  </a>
		  <div class="media-body">
		    <h4 class="media-heading"><a href="/music/account.php">@romsearcher</a>Cool website for music developers</h4>
		    <p>When I found out about this site, I was greatly pleased with the way we can share, as musicians, a personal story through music.</p>
		  </div>
		</div>
		<div class="media">
		  <a class="pull-left" href="#">
		    <img class="media-object" src="img/nina.jpg">
		  </a>
		  <div class="media-body">
		    <h4 class="media-heading"><a href="/music/account.php">@agaitan</a>A different way of experiencing <strong>Music</strong></h4>
		    <p>It actually takes no time to start uploading and voting for other people's media!</p>
		  </div>
		</div>
		<div class="media">
		  <a class="pull-left" href="#">
		    <img class="media-object" src="img/india.jpg">
		  </a>
		  <div class="media-body">
		    <h4 class="media-heading"><a href="/music/account.php">@jagarcia</a>Found this site, already loving it</h4>
		    <p>The profound and deep sense of understanding humanity comes through the power of music.</p>
		  </div>
		</div>
	</div>
</div>

<div class="container">
	<div class="jumbotron col-md-6">
		<form enctype="multipart/form-data" action="index.php" method="POST">
		<!-- MAX_FILE_SIZE must precede the file input field -->
		<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
		<!-- Name of input element determines name in $_FILES array -->
		Send this file: <input name="userfile" type="file" />
		<input type="submit" value="Send File" />
	</div>
</form>
</div>

<script type="text/javascript">
</script>

<?php include('inc/footer.php'); ?>