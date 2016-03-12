<?php
session_start();

require_once '../../../config.php';

if (!($_SESSION['usertype'] === 'administrator' || $_SESSION['usertype'] === 'registered')) {
	header("location:../login.php");
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

  </style>
</head>
<body >
  <?php require_once ADMIN . '/partials/common/nav.php';?>
  <div class="container">

    <h2>Users</h2>

  </div>

</body>
</html>