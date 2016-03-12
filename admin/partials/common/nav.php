<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo FRONTEND_CMS_URL . '/index.php'; ?>">Control Panel</a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			 </button>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class=""><a href="<?php echo FRONTEND_CMS_URL . '/index.php'; ?>">Home</a></li>
				<li><a href="<?php echo COMPONENTS_CMS_URL . '/users/users-list.php'; ?>">Users</a></li>
				<li><a href="<?php echo COMPONENTS_CMS_URL . '/articles/articles-list.php'; ?>">Articles</a></li>
				</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="">Hi <?php echo $_SESSION['username'] ?></a></li>
				<li><a href="<?php echo ACTIONS_CMS_URL . '/logout.php'; ?>"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
			</ul>
		</div>
	</div>
</nav>

