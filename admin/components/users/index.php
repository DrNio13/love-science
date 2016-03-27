<?php
session_start();

require_once '../../../config.php';
if (!($_SESSION['usertype'] === 'administrator' || $_SESSION['usertype'] === 'registered')) {
  header("location: ../../actions/login.php");
}
?>

<!DOCTYPE html>
<html lang="en" ng-app="userApp">
<head>
  <title>Admin - Users List</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/love-science/node_modules/bootstrap/dist/css/bootstrap.min.css">

  <style>

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

    table.table-hover tr{
      transition-property:background-color;
      transition-duration:.5s;
    }
    td a{
      cursor: pointer;
      color: inherit;
    }
    td a:hover{
      color: inherit;
    }

    tbody tr:nth-child(odd){
      background-color: #f7f7f7;
    }

    table.table-hover tr:hover{
      background-color: #F4F1E7;
    }


  </style>
</head>
<body >
  <?php require_once ADMIN . '/partials/common/nav.php';?>
  <div ng-view></div>

  <script src="/love-science/node_modules/angular/angular.min.js"></script>
  <script src="/love-science/node_modules/angular-route/angular-route.min.js"></script>
  <script src="<?php echo FRONTEND_CMS_URL . '/js/app2.js'; ?>"></script>

</body>
</html>