<?php

session_start();
require '../../config.php';

if (!($_SESSION['usertype'] === 'administrator' || $_SESSION['usertype'] === 'registered')) {
	header("location: ../actions/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Control Panel</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/love-science/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="/love-science/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <style>
  	.title2{
  		padding-bottom: 10%;
  		float: left;
  	}

  	.logo{
  		font-size: 50px;

  	}

  	.row{
  		clear: left;
  	}

  	.logo:hover{
  		color: gray;
  	}

  	.navbar{
  		border-radius: 0;
  	}

  	nav a {
		position: relative;
		display: inline-block;
		outline: none;
		color: #222222;
		text-decoration: none;
		text-shadow: 0 0 1px rgba(255,255,255,0.3);
	}

	.navbar-right:hover{
		cursor: pointer;
	}

  	.cl-effect-5 h4 a {
		overflow: hidden;
		padding: 0 4px;
		height: 1.1em;
	}

	.cl-effect-5 h4 a span {
		position: relative;
		display: inline-block;
		-webkit-transition: -webkit-transform 0.3s;
		-moz-transition: -moz-transform 0.3s;
		transition: transform 0.3s;
	}

	.cl-effect-5 h4 a span::before {
		position: absolute;
		top: 100%;
		content: attr(data-hover);
		color: #4285F4;
		-webkit-transform: translate3d(0,0,0);
		-moz-transform: translate3d(0,0,0);
		transform: translate3d(0,0,0);
	}

	.cl-effect-5 h4 a:hover span,
	.cl-effect-5 h4 a:focus span {
		color: #222222;
		-webkit-transform: translateY(-100%);
		-moz-transform: translateY(-100%);
		transform: translateY(-100%);
	}

  </style>
</head>

<body>

	<?php require_once PARTIALS_CMS . '/common/nav.php';?>

	<div class="container text-center">
		<h2 class="title2">I Love Science</h2>
		<div class="row">
			<section>
				<nav class="cl-effect-5">
					<div class="col-sm-4">
						<a href="<?php echo COMPONENTS_CMS_URL . '/articles/add-article.php'; ?>"><span class="glyphicon glyphicon-plus-sign logo"></span></a>
						<br>
						<h4><a href="<?php echo COMPONENTS_CMS_URL . '/articles/add-article.php'; ?>"><span data-hover="Add a new Article">Add a new Article</a></h4>
					</div>
					<div class="col-sm-4">
						<a href="<?php echo COMPONENTS_CMS_URL . '/articles/articles-list.php'; ?>"><span class="glyphicon glyphicon-list-alt logo"></span></a>
						<br>
						<h4><a href="<?php echo COMPONENTS_CMS_URL . '/articles/articles-list.php'; ?>"><span data-hover="All Articles">All Articles</a></h4>
					</div>
					<div class="col-sm-4">
						<a href="<?php echo COMPONENTS_CMS_URL . '/users/users-list.php'; ?>"><span class="glyphicon glyphicon-user logo"></span></a>
						<br>
						<h4><a href="<?php echo COMPONENTS_CMS_URL . '/users/users-list.php'; ?>"><span data-hover="All Users">All Users</a></h4>
					</div>
				</nav>
			</section>
		</div>

	</div>

</body>
</html>