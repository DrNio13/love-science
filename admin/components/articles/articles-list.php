<?php
session_start();

require_once '../../../config.php';
if (!($_SESSION['usertype'] === 'administrator' || $_SESSION['usertype'] === 'registered')) {
	header("location: ../../actions/login.php");
}
?>

<!DOCTYPE html>
<html lang="en" ng-app="adminApp" ng-controller="ArticleController">
<head>
  <title>Admin - Articles List</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/love-science/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="/love-science/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="/love-science/node_modules/angular/angular.min.js"></script>
  <script type="text/javascript" src="/love-science/node_modules/angular-ui-tinymce/dist/tinymce.min.js"></script>
  <script src="<?php echo FRONTEND_CMS_URL . '/js/app.js'; ?>"></script>

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

	<?php require_once PARTIALS_CMS . '/common/nav.php';?>

	<div class="container">

		<h2>Articles</h2>
		<span>Total articles: {{allArticles.length}}</span>
		<hr>
		<div class="row">
			<div class="col-md-3">
				<a href="add-article.php" <button type="button" class="addblog btn btn-default">Add a new article</button></a>
			</div>
			<div class="col-md-offset-6 col-md-3">
				<input ng-model="searchArticle" type="search" class="form-control pull-right" placeholder="search..">
			</div>
		</div>
		<br />
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
				<tr ng-repeat="article in chunkedArticles | filter:searchArticle">
					<td>{{article.id}}</td>
<<<<<<< HEAD
					<td><a ng-href="edit-article.php?id={{article.id}}">{{article.title}}</a></td>
					<td><p>{{article.parsed_content}}</p></td>
=======
					<td>{{article.title}}</td>
					<td><p>{{article.content_short}}</p></td>
>>>>>>> 5ac71f6f2fe58a27a13aef0dcf3361d6b04cd11b
					<td>{{article.category}}</td>
				</tr>
		</table>
		<ul class="pagination ">
			<li ng-repeat="number in paginationItems track by $index">
				<a ng-if="$first" ng-click="paginateArticles(0,allArticles,maxArticles)" href="#">
				Start</a>
				<a href="#" ng-click="paginateArticles(number,allArticles,maxArticles)">
				{{number + 1}}
				</a>
				<a ng-if="$last" ng-click="paginateArticles( paginationItems.length - 1,allArticles,maxArticles)" href="#">
				End</a>
			</li>
		</ul>
	</div>

</body>
</html>
