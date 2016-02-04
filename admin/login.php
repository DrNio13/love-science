<?php
include '../config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login - Yes I Love Science</title>
	<link rel="stylesheet" href="<?php echo ASSETS; ?>/scss/style.css">
</head>
<body>


<form action="index.php" method="POST">
  Username:<br>
  <input type="text" name="username" value=""><br>
  Password:<br>
  <input type="password" name="password" value=""><br><br>
  <input type="submit" value="Submit">
</form>



</body>
</html>