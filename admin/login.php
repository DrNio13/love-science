<?php require_once '../config.php';?>



<?php
// require_once DOCUMENT_ROOT . '/configuration/local-config.php';
// require_once SYSTEM . '/controllers/login_controller.php';

// $mainController = new LoginController();
// $ip = $mainController->getRealIpAddr();

// $record = $mainController->getLoginRecordByIp($ip);
// if ($record) {
// 	$counter = (int) $record['login_counter'];
// 	$loginCounter = $mainController->updateLoginCounter($ip, $counter);
// } else {
// 	$mainController->setLoginRecord($ip);
// }
// if ($loginCounter >= 5) {
// 	header("location:blocked.html");
// }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login - Yes I Love Science</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

	<link rel="stylesheet" href="frontend/sass/style.css">
</head>
<body>

<div class="container">

  		<h2 class="form-signin-heading">Admin System Login</h2>

  		<form class="form-horizontal" name="myform" role="form" action="index.php" method="POST">
    		<div class="form-group">
      			<label class="control-label col-sm-4" for="user">Username:</label>
      				<div class="col-sm-4">
      					<div class="inner-addon left-addon">
    						<span class="glyphicon glyphicon-user"></span>
        					<input type="text" name="username" class="form-control" id="username" placeholder="Enter your username" maxlength="15">
        				</div>
      				</div>
    		</div>
    		<div class="form-group">
      			<label class="control-label col-sm-4" for="password">Password:</label>
      			<div class="col-sm-4">
              <div class="inner-addon left-addon">
                <span class="glyphicon glyphicon-lock"></span>
        			   <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" maxlength="25">
      			</div>
    		</div>
        <div class="form-group">
          <div class="col-sm-offset-0 col-sm-12">
            <div class="checkbox">
              <label><input type="checkbox" name="checkbox">Remember Me</label>
            </div>
          </div>
        </div>
    		<div class="form-group">
      			<div class="col-sm-offset-0 col-sm-12">
        			<button type="submit" value="submit" class="btn btn-primary">Login</button>
      			</div>
    		</div>

  		</form>

</div>

</body>
</html>