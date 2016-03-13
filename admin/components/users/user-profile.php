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
  <title>Admin - User Profile</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/love-science/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="/love-science/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="/love-science/node_modules/angular/angular.min.js"></script>
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

    .form-group{
      margin-top: 3em;
    }

    .form-control{
      
      width: 30%;
    }

    span.glyphicon-user{
      font-size: 1.5em;
      margin-right: 2%;
    }

    input[type="file"]{
      width: 26%;
      display: inline-block;
    }

    @media screen and (max-width:768px){
      .form-control{
        width: 100%;
      }
      input[type="file"]{
        width: 100%;
        display: block;
      }
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
          <a href='<?php echo FRONTEND_CMS_URL . '/index.php'; ?>' type="button" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    <h2>User Name - Edit</h2>
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <label class="col-sm-2 pull-left" for="username">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="username">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 pull-left" for="firstname">First Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="firstname">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 pull-left" for="lastname">Last Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="lastname">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 pull-left" for="password">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 pull-left" for="copassword">Confirm Password</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="copassword">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 pull-left" for="avatar">Avatar</label>
        <div class="col-sm-10">
          <span class="glyphicon glyphicon-user"></span>
          <input type="file" class="form-control" id="avatar">
        </div>
      </div>
    </form>
  </div>
</body>
</html>