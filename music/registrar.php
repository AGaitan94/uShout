<?php
	ob_start();
	include("inc/header.php");
	include("model/main.php");
	
	$error="";
	
	//-----------SQL Include Files--------------------
	
	include("MySQL.php");

	$sqlHostname = "equiMusic.db.11648076.hostedresource.com";
    $sqlUsername = "equiMusic";
    $sqlDbname = "equiMusic";
    $sqlPassword = "equinox13@Musi";

	$accesser = new MySQL('equiMusic', 'equiMusic', $sqlPassword, $sqlHostname);
	
	//------------------------------------------------

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		//we have the name but we are missing lastname or firstname
		$name = trim($_POST['name']);
		$username = trim($_POST['user']);
		$password = trim($_POST['pass']);
		$user_mail = trim($_POST['mail']);

		if($name =="" or $username =="" or $password =="" or $user_mail=="")
		{
			foreach ($_POST as $key => $variable) 
			{
				if($variable == "")
				{
					$error .= $key.',';
				}
			}
			header ('Location:login.php?v='.$error);
		}

		$rQuery = "SELECT Username FROM Users WHERE Username='".$username."'";  

		$query = $accesser->ExecuteSQL($rQuery);

        if($query["Username"] == "")
        {
        	//Temporal - Success, there is no user with that username
        	
        	//Generate a unique MD5-key
        	$key = md5(uniqid($username, true));

        	//echo $key
        	//We create the user with the specified fields and it is added to the Unconfirmed-Users databse
        	$insert_query = 'INSERT INTO UnconfirmedUsers (Firstname,Lastname,Username,UserPassword,Email,MD5Key) VALUES ("' . $name . '", "' . $name . '", "' . $username . '", "' . $password . '", "' . $user_mail . '", "' . $key . '")';
			
			//echo $insert_query;
			
			$result_inser_query = $accesser->ExecuteSQL($insert_query);
			
			if($result_inser_query)
			{
				//echo "Done \n";
				//Success, the query has executed correctly and the user has been added
				//We must specify an error in case the database is not accesible
			}

        	//Send a confirmation email--------------------------------------------
        	require_once("phpMailer/PHPMailerAutoload.php");

        	$mail = new PHPMailer;

        	$mail->From = 'contact@equinoxgroup.co';
			$mail->FromName = 'Music Account';
			$mail->addAddress($user_mail, $name);

			//Temp----------------

			$message = 'An account has been created for you in <b>Music!</b><br>';

			$message .= 'Please follow this link: http://www.equinoxgroup.co/music/registrar.php?key=' . $key;

			//--------------------

        	$mail->Subject = 'Music Account Confirmation';
			$mail->Body    = $message;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
			   echo 'Message could not be sent.';
			   echo 'Mailer Error: ' . $mail->ErrorInfo;
			   exit;
			}

			$display_title = 'Thankyou for joining Music!';
			$display_message = "We have sent you an email to confirm you account. You are one click away from enjoying Music!. Make sure the email is not in your spam folder.";
			$status = "success";
			//-------------------------------------------------------------------
        }
        else
        {
        	header("Location: login.php?v=uae");
        }

	}
	//Evaluates the confirmation emails sent here with the key
	else
	{
		//If the user has a confirmation email with a key, redirect here and validate
		if(isset($_GET['key']))
		{
			$display_title = "Account Confirmation";
			$display_message = "";

			$find_user_query = 'SELECT Username FROM UnconfirmedUsers WHERE MD5key="' . $_GET['key'] . '"';
			//echo $find_user_query;
			$found_user = $accesser->ExecuteSQL($find_user_query);

			//Array with the results from looking for the specified MD5 key
			$my_array = $accesser->arrayedResult;
			//var_dump($my_array);

			if($my_array != "")
			{

				$insert_query_user = "INSERT INTO Users (FirstName,LastName,Username,UserPassword,Email) SELECT FirstName,Lastname,Username,UserPassword,Email FROM UnconfirmedUsers WHERE MD5key='" . $_GET['key'] . "'";
				//echo $insert_query_user;
				$did_verify_user = $accesser->ExecuteSQL($insert_query_user);
				if($did_verify_user)
				{
					//Print success message to user, DELETE the user from the Unconfirmed-table
					$accesser->ExecuteSQL("DELETE FROM UnconfirmedUsers WHERE MD5key='" . $_GET['key'] . "'");
					$display_message = "We have confirmed your account. You are ready to enjoy Music!";
					$status = "success";

					
				}
				else
				{
					//There is a problem with the database connection since the user has already been confirmed
				}
			}
			else
			{
				//The key is invalid or there was a problem with the SQL query
				$display_message = "There was a problem verifying the user, please try again later.";
				$status = "danger";
			}
		}else
		{
			//The user has nothing to do here, redirect
			header('Location: index.php');
		}
	}

?>

<!--Here goes the html body-->
<div class="container">
      <div class="message">
        <h2>Attention <span class="label label-<?php echo $status; ?>"><?php if($status == "success") { echo "Success"; }else{ echo "Error"; } ?></span></h2>
        <p><?php echo $display_title; ?></p>
        <hr>
        <p><?php echo $display_message; ?></p>
      </div>
</div> <!-- /container -->


<?php
	include ("inc/footer.php");
?>