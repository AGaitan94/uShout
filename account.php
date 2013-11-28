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

<div class="container mega-wrapper">
	<div class="row">
		<div class="col-md-3">
			<div id="sidebar" data-spy="affix" data-offset-top="55" >
				<div class="bs-sidebar hidden-print" role="complementary">
					<h2><?php echo $_SESSION["username"]; ?></h2>
					<hr>
					<img src="img/tiger.jpg" class="img-responsive">
					<hr>
					<p>Number of likes: <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-send"> </span> 56</button></p>
					<hr>
					<p>Bio: Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						In adipiscing ligula justo, nec tempor mauris pulvinar quis. 
						Sed sit amet orci in lectus volutpat ultricies in at ante.
						Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>
				</div>
			</div>
		</div>

		<!--<div class="col-md-1 panel-small"></div>-->

		<div class="col-md-9" id="proyect-wrapper">
			<h2 style="border-bottom: 2px solid white">My Proyects</h2>
			<hr>
			<div class="row">
				<div class="panel panel-default col-md-4 proyect">
				  <div class="panel-heading">Sound Wave [EXTENDED-CUT]</div>
				  <div class="panel-body">
				    <img src="img/dead.png" class="img-responsive">
				    	<div class="btn-group">	
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-backward"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-play" onClick="playSound()" id="tester"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-forward"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-repeat"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-plus"></span> </button>
						</div>
				  </div>
				</div>

				<!--other panel-->

				<div class="panel panel-default col-md-4 proyect">
				  <div class="panel-heading">Too much heaven</div>
				  <div class="panel-body">
				    <img src="http://placehold.it/400x400" class="img-responsive">
				    	<div class="btn-group">	
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-backward"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-play"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-forward"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-repeat"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-plus"></span> </button>
						</div>
				  </div>
				</div>

				<div class="panel panel-default col-md-4 proyect">
				  <div class="panel-heading">Like my rolling rock</div>
				  <div class="panel-body">
				    <img src="http://placehold.it/400x400" class="img-responsive">
				    	<div class="btn-group">	
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-backward"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-play"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-forward"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-repeat"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-plus"></span> </button>
						</div>
				  </div>
				</div>
			</div>

			<div class="row">
				<div class="panel panel-default col-md-4 proyect">
				  <div class="panel-heading">Sound Wave [EXTENDED-CUT]</div>
				  <div class="panel-body">
				    <img src="http://placehold.it/400x400" class="img-responsive">
				    	<div class="btn-group">	
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-backward"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-play"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-forward"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-repeat"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-plus"></span> </button>
						</div>
				  </div>
				</div>

				<!--other panel-->

				<div class="panel panel-default col-md-4 proyect">
				  <div class="panel-heading">Too much heaven</div>
				  <div class="panel-body">
				    <img src="http://placehold.it/400x400" class="img-responsive">
				    	<div class="btn-group">	
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-backward"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-play"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-forward"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-repeat"></span> </button>
						  <button type="button" class="btn btn-default myButton"><span class="glyphicon glyphicon-plus"></span> </button>
						</div>
				  </div>
				</div>

			</div>


			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

		</div>
	</div>
</div>

<audio id="sound" style="display:none;" src="files/veldt.mp3"></audio>

<div id="test">
	<form method="POST" action="account.php">
	<input type="submit" class="btn btn-default btn-lg" value="Log out"> 
	</form>
</div>

<script type="text/javascript">
	function playSound()
	{
		var elem = document.getElementById("tester");
		var music = document.getElementById("sound");

		if(tester.getAttribute("class") == "glyphicon glyphicon-play")
		{
			music.play();
			elem.setAttribute("class","glyphicon glyphicon-pause");
		}
		else
		{
			music.pause();
			elem.setAttribute("class","glyphicon glyphicon-play");
		}

		
		
	}
</script>

<?php } ?>

<?php
include("inc/footer.php");
?>