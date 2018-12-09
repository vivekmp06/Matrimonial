<?php include_once("functions.php");?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vivaha | Matrimony Site</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /><!-- bootstrap-CSS -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /><!-- Fontawesome-CSS -->
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style --> 
<link href="css/main.css" rel="stylesheet" type="text/css" media="all" />	
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
		<div class="container">
				<div class="navbar ">
				<div id="logo" style="font-size: 25px; "><a href="#">Vivaha.com</a></div>
					<ul class="nav navbar-nav nav_1">
						<li><a href="index.php">Home</a></li>                 
						<li><a href="search.php">Search</a></li>
						<li>	
							<?php 			
								if(isloggedin())
								{
									$id=$_SESSION['id'];
									echo "<li><a href=\"logout.php\">Logout</a></li>";
									echo "<li><a href=\"dashboard.php\">Dashboard</a></li>";
								}
								else
								{
										echo "<li><a href=\"login.php\">Login</a></li>";
										echo "<li><a href=\"index.php\">Register</a></li>";
								}
							?>
						
					</li>
						<li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact Us</a></li>
					</ul>
				</div> 
			</div>
	</header>