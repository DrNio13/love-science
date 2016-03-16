<?php
session_start();

require_once '../../../config.php';
if (!($_SESSION['usertype'] === 'administrator' || $_SESSION['usertype'] === 'registered')) {
	header("location: ../../actions/login.php");
}
?>

<!DOCTYPE html>
<html lang="en" ng-app="adminApp" ng-controller="UserController">
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
    <h2>User Manager<h2>
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
            <td><a href="user-profile.php" title="Edit User">Dimitris</a></td>
            <td>dimitris</td>
            <td>N/A</td>
            <td>N/A</td>
          </tr>
          <tr>
            <td><a href="user-profile.php" title="Edit User">George</a></td>
            <td>george</td>
            <td>N/A</td>
            <td>N/A</td>
          </tr>
          <tr>
            <td><a href="user-profile.php" title="Edit User">George</a></td>
            <td>george</td>
            <td>N/A</td>
            <td>N/A</td>
          </tr>
          <tr>
            <td><a href="user-profile.php" title="Edit User">George</a></td>
            <td>george</td>
            <td>N/A</td>
            <td>N/A</td>
          </tr>
        </tbody>
      </thead>
    </table>
  </div>

  <script src="/love-science/node_modules/angular/angular.min.js"></script>
  <script src="<?php echo FRONTEND_CMS_URL . '/js/app.js'; ?>"></script>

</body>
</html>