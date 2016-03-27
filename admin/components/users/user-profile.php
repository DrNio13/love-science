<head>
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

<div class="container-fluid">
    <div class="row center-text">
        <div class="col-xs-3 col-xs-offset-3 col-sm-1 col-sm-offset-4">
          <button class="btn btn-success" type="submit">Save</button>
        </div>
        <div class="col-xs-3 col-sm-1">
          <button class="btn btn-danger" type="submit">Cancel</button>
        </div>
    </div>
    <h2>User Name - Edit</h2>
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <label class="col-sm-2 pull-left" for="username">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="username" value="{{user.username}}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 pull-left" for="email">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="{{user.email}}">
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