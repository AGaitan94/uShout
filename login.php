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
			$error_message = "Please fill out the form completely";
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
            	
				header('Location: account.php');

            }

 		}
	}

	include("inc/header.php");

	echo '<div class="container">' . $error . '</div>';

?>

<div class="container" id="loginMain">
	<!--<div class="jumbotron">-->
		<h2>Log in to <strong>uShout</strong></h2>
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
		<button onClick="setVisible(true)" type="button" class="btn btn-success">Or sign in for a new Account!</button>
	<!--</div>-->
</div>

<!--Login area-->

<div id="login-fader" onClick="setVisible(false);reset()">&nbsp;</div>
<div class="container" id="login" style="display:none;">
	<div class="jumbotron">
		<p>Sign in for your cool account on <strong>uShout</strong></p>
		<?php
				if(isset($error_message_secondary))
				{
					echo "<h4 style='color: yellow;'>" . $error_message_secondary . "</h4>";
				}
		?>
		<p id="error"></p>
		<form class="form-horizontal" role="form" method="POST"  name="register" action="registrar.php" onSubmit="return(validate())">
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


<script type="text/javascript">
	function setVisible(cond)
	{
		var elem = document.getElementById("login-fader");
		var elem2 = document.getElementById("login");
		if(cond){
			elem.style.display = "block";
			elem2.style.display = "block";
		}
		else
		{
			elem.style.display = "none";
			elem2.style.display = "none";
		}	
	}

	function validate()
	{
		var didValidate = true, 
		error = document.getElementById("error");
		error.style.color = "red";

		if(document.register.name.value == "")
		{
			didValidate = false;
			error.innerHTML = "Error, information was incorrect";
		}
		if(document.register.user.value == "")
		{
			didValidate = false;
			error.innerHTML = "Error, information was incorrect";
		}
		if(document.register.pass.value == "")
		{
			didValidate = false;
			error.innerHTML = "Error, information was incorrect";
		}
		if(document.register.mail.value == "")
		{
			didValidate = false;
			error.innerHTML = "Error, information was incorrect";
		}

		return didValidate;
	}

	function reset()
	{
		var error = document.getElementById("error");
		error.innerHTML = "";
	}
</script>

<?php
	include('inc/footer.php');
?>