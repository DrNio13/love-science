<?php
session_start();
require '../../config.php';
require_once SYSTEM . '/classes/article_class.php';

if (!($_SESSION['usertype'] === 'administrator' || $_SESSION['usertype'] === 'registered')) {
	header("location: ../../login.php");
}

// $article = new Article('prwto', 'prwto', 'article');
// $a = new Article('prwto', 'xxx', 'asdasdasd');

// if ($article->isArticleExisting()) {
// 	echo $article->isArticleExisting();
// }

// print $a->updateArticle();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add an Article</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="sass/style.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <script>
    tinymce.init({
      selector: '#myTextarea',
      theme: 'modern',
      width: '100%',
      height: 400,
      plugins: [
          'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
          'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
          'save table contextmenu directionality emoticons template paste textcolor'
      ],
      toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
  });

  </script>
</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Control Panel</a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
			</div>
      <div class="collapse navbar-collapse" id="myNavbar">
  			<ul class="nav navbar-nav">
  				<li class="active"><a href="index.php">Home</a></li>
  				<li><a href="#">Site</a></li>
        			<li><a href="#">Users</a></li>
        			<li><a href="list-blogs.php">Article Manager</a></li>
  			</ul>
  			<ul class="nav navbar-nav navbar-right">
          		<li><a href="#"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
        		</ul>
      </div>
		</div>
    <div class="container-fluid bg-1">
      <h3 id="heading"><span class="glyphicon glyphicon-pencil"></span>Article Manager : Add a new Article</h3>
    </div>
	</nav>

<div class="container-fluid">


    <form role="form" action="add-blog-success.php" method="post">

    <div class="row center-text">
        <div class="col-xs-3 col-xs-offset-3 col-sm-1 col-sm-offset-4">
          <button class="btn btn-success" type="submit">Save</button>
        </div>
        <div class="col-xs-3 col-sm-1">
          <a href='index.php' type="button" class="btn btn-default">Cancel</a>
        </div>
        <div class="col-xs-3 col-sm-1">
          <a href='delete.php' type="button" class="btn btn-danger">Delete</a>
        </div>
    </div>
    <hr>

      <div class="row">
        <div class="col-lg-10">
          <div class="form-group">
              <input type="textarea" name="content" class="form-control" id="myTextarea">
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
            <label for="title" class="center-text">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter your Title">
          </div>
          <br>
          <div class="form-group">
              <label for="status" class="center-text">Status</label><br>
              <input type="radio" id="rb1" name="rb" value="" checked>
              <label for="rb1" class="center-label">Published</label>
              <input type="radio" id="rb2" name="rb"value="">
              <label for="rb2" class="center-label lbl">Unpublished</label>
          </div>
          <br>
          <div class="form-group">
            <label for="metaTitle" class="center-text">Meta Title</label>
            <input type="text" name="meta-title" class="form-control" placeholder="Enter your Meta Title">
          </div>
          <br>
          <div class="form-group">
            <label for="metaDescription" class="center-text">Meta Description</label>
            <input type="text" name="meta-description" class="form-control" placeholder="Enter your Meta Description">
          </div>
          <br>
          <div class="form-group">
            <label for="metaKeywords" class="center-text">Meta Keywords</label>
            <input type="text" name="meta-keywords" class="form-control" placeholder="Enter your Meta Keywords">
          </div>
          <br>
          <div class="form-group">
            <label for="category" class="center-text">Category</label>
            <input type="text" name="category" class="form-control" placeholder="Enter your Category">
          </div>
        </div>
      </div>
    </form>
</div>
</body>
</html>