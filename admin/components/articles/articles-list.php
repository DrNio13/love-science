<?php
session_start();

require_once '../../config.php';
if (!($_SESSION['usertype'] === 'administrator' || $_SESSION['usertype'] === 'registered')) {
	header("location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en" ng-app="adminApp" ng-controller="RootController">
<head>
  <title>Blog List</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/love-science/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="/love-science/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="/love-science/node_modules/angular/angular.min.js"></script>
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

  	.navbar{
  		border-radius: 0;
  	}

  </style>
</head>
<body>
	<?php require_once ADMIN . '/frontend/partials/common/nav.php';?>

	<div class="container">

		<h2>Articles</h2>
		<div class="row">
			<div class="col-md-3">
				<a href="add-blog.php" <button type="button" class="addblog btn btn-default">Add a new article</button></a>
			</div>
			<div class="col-md-offset-6 col-md-3">
				<input ng-model="searchArticle" type="search" class="form-control pull-right" placeholder="search..">
			</div>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Content</th>
					<th>Category</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="article in allArticles | filter:searchArticle">
					<td>{{article.id}}</td>
					<td>{{article.title}}</td>
					<td>{{article.content}}</td>
					<td>{{article.category}}</td>
				</tr>

		</table>
	</div>

</body>
</html>
