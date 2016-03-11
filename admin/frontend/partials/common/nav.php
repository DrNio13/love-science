<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Control Panel</a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			 </button>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="users.php">Users</a></li>
				<li><a href="list-blogs.php">Articles</a></li>
				</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="">Hi <?php echo $_SESSION['username'] ?></a></li>
				<li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
			</ul>
		</div>
	</div>
</nav>

