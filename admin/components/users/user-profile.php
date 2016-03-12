<?php
session_start();

require_once '../../../config.php';
if (!($_SESSION['usertype'] === 'administrator' || $_SESSION['usertype'] === 'registered')) {
	header("location: ../../actions/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin - User Profile</title>
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
  <div class="container-fluid">
    <div class="row center-text">
        <div class="col-xs-3 col-xs-offset-3 col-sm-1 col-sm-offset-4">
          <button class="btn btn-success" type="submit">Save</button>
        </div>
        <div class="col-xs-3 col-sm-1">
          <a href='delete.php' type="button" class="btn btn-danger">Delete</a>
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
            <td><a href="#">Dimitris</a></td>
            <td>dimitris</td>
            <td>N/A</td>
            <td>N/A</td>
          </tr>
          <tr>
            <td><a href="#">George</a></td>
            <td>george</td>
            <td>N/A</td>
            <td>N/A</td>
          </tr>
          <tr>
            <td><a href="#">George</a></td>
            <td>george</td>
            <td>N/A</td>
            <td>N/A</td>
          </tr>
          <tr>
            <td><a href="#">George</a></td>
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