<?php 

	session_start();

	ob_start();

	$pageTitle = "Log in";

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		//Lets check for correct data form submission
		$error = "";
		$username = stripslashes(trim($_POST['name']));
		$password = stripslashes(trim($_POST['pass']));

		if($username == "" or $password == "")
		{
			$error = "Please fill out the form completely";
		} else {
			//We need to check the username ad password with the database

			//Variables for connecting to your database.
            $sqlHostname = "equiMusic.db.11648076.hostedresource.com";
            $sqlUsername = "equiMusic";
            $sqlDbname = "equiMusic";
            $sqlPassword = "equinox13@Musi";

            include("MySQL.php");

			$accesser = new MySQL('equiMusic', 'equiMusic', $sqlPassword, $sqlHostname);

            $rQuery = "SELECT Username FROM Users WHERE Username='".$username."'"." AND UserPassword='".$password."'";  

          	//echo $rQuery;
            $query = $accesser->ExecuteSQL($rQuery);
          	 // var_dump($query);

            if($query["Username"] == "")
            {
            	//Temporal
            	$error_message = "Incorrect username or password";
            }
            else
            {
				//Also temporal but success

            	$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
            	
				header('Location: index.php');

            }

 		}
	}

	include("inc/header.php");

	echo '<div class="container">' . $error . '</div>';

?>

<div class="container">
	<div class="jumbotron">
		<p>Log in to <strong>Music</strong></p>
		<form method="POST" action="login.php" class="form-inline" role="form">
			<div class="form-group">
				<input type="text" name="name" class="form-control" placeholder="Username">
				<input type="password" name="pass" class="form-control" placeholder="Password">
				<input type="submit" class="btn btn-default">
			</div>
			<?php
				if(isset($error_message))
				{
					echo "<h4 style='color: yellow;'>" . $error_message . "</h4>";
				}
			?>
		</form>
	</div>
</div>

<div class="container">
	<div class="jumbotron">
		<p>Or sign in for your cool account on <strong>Music</strong></p>
		<br>
		<?php
				if(isset($error_message_secondary))
				{
					echo "<h4 style='color: yellow;'>" . $error_message_secondary . "</h4>";
				}
		?>
		<form class="form-horizontal" role="form" method="POST" action="registrar.php">
		  <div class="form-group">
		    <label for="name" class="col-sm-2 control-label">Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="name" placeholder="Name" name="name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="username" class="col-sm-2 control-label">Username</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="username" placeholder="Username" name="user">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="password" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="password" placeholder="Password" name="pass">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="mail" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="mail" placeholder="E-mail" name="mail">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox"> I Agree to the Terms and Conditions
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Sign in</button>
		    </div>
		  </div>
		</form>
	</div>
</div>

<?php
	include('inc/footer.php');
?>