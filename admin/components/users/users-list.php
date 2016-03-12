<?php
session_start();

require_once '../../../config.php';
if (!($_SESSION['usertype'] === 'administrator' || $_SESSION['usertype'] === 'registered')) {
	header("location: ../../actions/login.php");
}
?>

<!DOCTYPE html>
<html lang="en" ng-app="adminApp" ng-controller="RootController">
<head>
  <title>Admin - Users List</title>
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

    .table-hover{
      margin-top: 1.2em;
    }
    td a{
      cursor: pointer;
      color: inherit;
    }
    td a:hover{
      color: inherit;
    }
    

  </style>
</head>
<body >
  <?php require_once ADMIN . '/partials/common/nav.php';?>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <a href="#" <button type="button" class="addblog btn btn-default">Add a new User</button></a>
      </div>
      <div class="col-md-offset-6 col-md-3">
        <input ng-model="searchArticle" type="search" class="form-control pull-right" placeholder="search..">
      </div>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Username</th>
          <th>ID</th>
          <th>Email</th>
        </tr>
        <tbody>
          <tr class="active">
            <td><a href="user-profile.php">Dimitris</a></td>
            <td>dimitris</td>
            <td>N/A</td>
            <td>N/A</td>
          </tr>
          <tr>
            <td><a href="user-profile.php">George</a></td>
            <td>george</td>
            <td>N/A</td>
            <td>N/A</td>
          </tr>
          <tr>
            <td><a href="user-profile.php">George</a></td>
            <td>george</td>
            <td>N/A</td>
            <td>N/A</td>
          </tr>
          <tr>
            <td><a href="user-profile.php">George</a></td>
            <td>george</td>
            <td>N/A</td>
            <td>N/A</td>
          </tr>
        </tbody>
      </thead>
    </table>
  </div>

</body>
</html>