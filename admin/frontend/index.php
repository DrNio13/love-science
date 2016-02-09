<?php
session_start();
if (!($_SESSION['usertype'] === 'administrator' || $_SESSION['usertype'] === 'registered')) {
	header("location:../login.php");
}

// print_r($_SESSION);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin System</title>
	<link rel="stylesheet" href="">

	<!-- angular-1.5 js , bootstrap.css -->

</head>
<body>

<header id="header" class="container-fluid">
	<div class="row">
		<nav class="col-xs-12">
			<?php require_once 'partials/common/nav.html';?>
		</nav>
		<p>Hi <?php echo $_SESSION['username']; ?></p>
		<a class="btn btn-primary" href="../logout.php" title="">Logout</a>
	</div>
</header>

<section class="main-wrapper container-fluid">
	<div class="row">
		<main class="main col-md-8" id="main-page">
			<?php require_once 'partials/common/main.html';?>
		</main>

		<aside class="sidebar col-md-4" id="sidebar-right">
			<?php require_once 'partials/common/sidebar.html';?>
		</aside>

	</div>
</section>

<footer id="footer" class="footer container-fluid">
	<div class="row">
		<?php require_once 'partials/common/footer.html';?>
	</div>
</footer>


</body>
</html>