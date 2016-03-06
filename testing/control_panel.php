<!DOCTYPE html>
<html lang="en">
<head>
  <title>Control Panel</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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

  	nav a {
		position: relative;
		display: inline-block;
		outline: none;
		color: #222222;
		text-decoration: none;
		text-shadow: 0 0 1px rgba(255,255,255,0.3);
	}
	
  	.cl-effect-5 a {
		overflow: hidden;
		padding: 0 4px;
		height: 1.1em;
	}

	.cl-effect-5 a span {
		position: relative;
		display: inline-block;
		-webkit-transition: -webkit-transform 0.3s;
		-moz-transition: -moz-transform 0.3s;
		transition: transform 0.3s;
	}

	.cl-effect-5 a span::before {
		position: absolute;
		top: 100%;
		content: attr(data-hover);
		color: #4285F4;
		-webkit-transform: translate3d(0,0,0);
		-moz-transform: translate3d(0,0,0);
		transform: translate3d(0,0,0);
	}

	.cl-effect-5 a:hover span,
	.cl-effect-5 a:focus span {
		color: #222222;
		-webkit-transform: translateY(-100%);
		-moz-transform: translateY(-100%);
		transform: translateY(-100%);
	}

  </style>
</head>

<body>
	<?php include 'nav.php';?>
	<div class="container text-center">
		<h2 class="title2">I Love Science</h2>
		<div class="row">
			<section>
				<nav class="cl-effect-5">
					<div class="col-sm-4">
						<span class="glyphicon glyphicon-plus-sign logo"></span>
						<br>
						<h4><a href="addBlog.html"><span data-hover="Add a new Blog">Add a new Blog</a></h4>
					</div>
					<div class="col-sm-4">
						<span class="glyphicon glyphicon-list-alt logo"></span>
						<br>
						<h4><a href="list-blogs.php"><span data-hover="All the Blogs">All the Blogs</a></h4>
					</div>
					<div class="col-sm-4">
						<span class="glyphicon glyphicon-user logo"></span>
						<br>
						<h4><a href="#"><span data-hover="User Manager">User Manager</a></h4>
					</div>
				</nav>
			</section>
		</div>

	</div>
	
</body>
</html>