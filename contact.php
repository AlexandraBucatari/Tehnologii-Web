<!DOCTYPE HTML>
<html>
<head>
</head>
<body>

<?php
// define variables and set to empty values
$firstname = $lastname = $country = $subject =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = test_input($_POST["firstname"]);
  $lastname = test_input($_POST["lastname"]);
  $country = test_input($_POST["country"]);
  $subject = test_input($_POST["subject"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Firstname: <input type="text" name="firstname">
  <br><br>
  Lastname: <input type="text" name="lastname">
  <br><br>
  Country: <input type="radio" name="country" value="Australia">Australia
  <input type="radio" name="country" value="Canada">Canada
  <input type="radio" name="country" value="USA">USA
  <br><br>
  Subject: <textarea name="subject" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $firstname;
echo "<br>";
echo $lastname;
echo "<br>";
echo $country;
echo "<br>";
echo $subject;
echo "<br>";
?>

</body>
</html>
