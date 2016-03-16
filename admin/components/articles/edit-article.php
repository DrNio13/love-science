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
  <title>Admin - Add an Article</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo NODE_MODULES_CMS_URL . '/bootstrap/dist/css/bootstrap.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo FRONTEND_CMS_URL . '/sass/style.css'; ?>" type="text/css">
  </script>

  <script>
	var articleId = <?php echo $_GET['id']; ?>
  </script>

</head>

<body ng-controller="EditArticleController">

  <?php require_once PARTIALS_CMS . '/common/nav.php';?>

  <div class="container-fluid">

  <h1>Add a new Article</h1>
    <form novalidate role="form" class="css-form">

	    <div class="row center-text">
	        <div class="col-xs-3 col-xs-offset-3 col-sm-1 col-sm-offset-4">
	          <button ng-click="saveArticle(article);" class="btn btn-success" type="submit">Save</button>
	        </div>
	        <div class="col-xs-3 col-sm-1">
	          <a href='<?php echo COMPONENTS_CMS_URL . '/articles/articles-list.php'; ?>' type="button" class="btn btn-default">Close (Without Saving)</a>
	        </div>
	    </div>
	   <hr>

      <div class="row">
        <div class="col-lg-10">
          <div class="form-group">
          <textarea ui-tinymce="tinymceOptions" ng-model="article.content" type="textarea" name="content" class="form-control" value="" required ></textarea>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
            <label for="title" class="center-text">Title</label>
            <input ng-model="article.title" type="text" name="title" class="form-control" placeholder="Enter your Title" required />
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
            <label for="url" class="center-text">URL</label>
            <input ng-model="article.url" type="text" name="meta-title" class="form-control" placeholder="Enter the url">
          </div>
          <br>
          <div class="form-group">
            <label for="metaTitle" class="center-text">Meta Title</label>
            <input ng-model="article.meta_title" type="text" name="meta-title" class="form-control" placeholder="Enter your Meta Title">
          </div>
          <br>
          <div class="form-group">
            <label for="metaDescription" class="center-text">Meta Description</label>
            <input ng-model="article.meta_description" type="text" name="meta-description" class="form-control" placeholder="Enter your Meta Description">
          </div>
          <br>
          <div class="form-group">
            <label for="metaKeywords" class="center-text">Meta Keywords</label>
            <input ng-model="article.meta_keywords" type="text" name="meta-keywords" class="form-control" placeholder="Enter your Meta Keywords">
          </div>
          <br>
          <div class="form-group">
            <label for="category" class="center-text">Category</label>
            <input ng-model="article.category" type="text" name="category" class="form-control" placeholder="Enter your Category" required />
          </div>
        </div>
      </div>
    </form>

      <script type="text/javascript" src="<?php echo NODE_MODULES_CMS_URL . '/tinymce/tinymce.min.js'; ?>"></script>
  <script src="/love-science/node_modules/angular/angular.min.js"></script>
  <script type="text/javascript" src="/love-science/node_modules/angular-ui-tinymce/dist/tinymce.min.js"></script>
  <script src="<?php echo FRONTEND_CMS_URL . '/js/app.js'; ?>"></script>

</div>
</body>
</html>