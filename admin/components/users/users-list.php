<div class="container">
    <div class="row">
    <h2>User Manager<h2>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Username</th>
          <th>ID</th>
          <th>Email</th>
        </tr>
        <tbody>
          <tr ng-repeat= "user in users">
            <td><a href="#/users-list/{{user.id}}">{{user.username}}</a></td>
            <td>{{user.id}}</td>
            <td>{{user.email}}</td>
          </tr>
        </tbody>
      </thead>
    </table>
  </div>