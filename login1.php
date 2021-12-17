<?php
session_start();
include('include/header.php');
include_once("include/db_connect.php");

if(isset($_SESSION['id'])!="") {
	header("Location: index.php");
}
if (isset($_POST['login'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];


	$stmt = $connect->prepare("
		SELECT email, password
		FROM registration
		WHERE email = ? AND password = ? ");

	$stmt->bind_param( $email, $password);

	$stmt->execute();

	$result = $stmt->get_result();

	if($result->num_rows){
		while($registration = $result->fetch_assoc())  {
			$_SESSION['email'] = $registration['email'];
			$_SESSION['password'] = $registration['password'];
			header("Location: index.php");
		}
	} else {
		$error_message = "Incorrect Email or Password!!!";
	}
}
?>

<script type="text/javascript" src="script/ajax.js"></script>
<?php include('include/container.php');?>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Login</legend>
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Your Email" required class="form-control" />
					</div>
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
		New User? <a href="register1.php">Sign Up Here</a>
		</div>
	</div>

</div>
<?php include('include/footer.php');?>
