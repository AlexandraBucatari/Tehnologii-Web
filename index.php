<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/login.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
<?php
session_start();
include('include/header.php');
include_once("include/db_connect.php");
?>

<script type="text/javascript" src="script/ajax.js"></script>
<?php include('include/container.php');?>

<div class="container">


		<br>
		<br>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-left">
				<?php if (isset($_SESSION['id'])) { ?>
				<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['name']; ?></strong></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login1.php">Login</a></li>
				<li><a href="register1.php">Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
</div>
<?php include('include/footer.php');?>
