<?php
session_start();
if (!($_SESSION['usertype'] === 'administrator' || $_SESSION['usertype'] === 'registered')) {
	header("location:../login.php");
}

print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog List</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="js/app.js"></script>
  <style>
  	.table-bordered{

  	}

  	.logout{
  		position: absolute;
  		top: 2%;
  		right: 10%;
		display :inline-block !important;
  	}

  	.addblog{
  		margin-bottom:2%;
  	}

  </style>
</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Control Panel</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="#">Site</a></li>
      			<li><a href="#">Users</a></li>
      			<li><a href="list-blogs.html">Blog Manager</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
        		<li><a href="#"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      		</ul>
		</div>
	</nav>
	<div class="container">

		<h2>Blogs</h2>
		<a href="addBlog.html" <button type="button" class="addblog btn btn-default">Add a new blog</button></a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Title</th>
					<th>Short Description</th>
					<th>Long Description</th>
					<th>Author</th>
					<th>Date</th>
					<th>Views</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1st blog post</td>
					<td>Cell 2</td>
					<td>Cell 3</td>
					<td>Cell 4</td>
					<td>Cell 4</td>
					<td>Cell 4</td>
				</tr>

		</table>


	</div>


















</body>
</html>