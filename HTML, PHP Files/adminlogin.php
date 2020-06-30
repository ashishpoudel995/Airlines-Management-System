<?php
	$error="";
	if(isset($_POST['submit'])){
		  	$username=$_POST['username'];
			$password=$_POST['password'];
			if($username=="admin"){
				if($password=="admin"){
						echo "<script>window.location='adminchoice.html'</script>";
				}
				else{
					echo"<script>alert('Invalid Password')</script>";
					echo "<script>window.location='adminlogin.php'</script>";
				}
			}
			else{
				echo "<script>alert('Invalid Username')</script>";
				echo "<script>window.location='adminlogin.php'</script>";
			}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		*{
			margin: 0;
			padding: 0;
			font-family: Century Gothic;
		}
		body{
			background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(plane.jpg);
			height: 100vh;
			background-size: cover;
			background-position: center;
		}
		ul{
			float: right;
			list-style-type: none;
			margin-top: 25px;
		}
		ul li{
			display: inline-block;
		}
		ul li a{
			text-decoration: none;
			color: #fff;
			padding: 5px 20px;
			border: 1px solid #fff;
			transition: 0.6s ease;
		}
		ul li a:hover{
			background-color: #fff;
			color: #000;
		}
		ul li.active a{
			background-color: #fff;
			color: #000;
		}
		.title{
			position: absolute;
			top: 30%;
			left: 50%;
			transform: translate(-50%,-50%);	
		}
		.title h1{
			color: #fff;
			font-size: 70px;
		}
		table.a{
			position: absolute;
			top: 60%;
			left: 50%;
			transform: translate(-50%,-50%);
			border: 1px solid #fff;
			padding: 10px 30px;
			color: #fff;
			text-decoration: none;
			transition: 0.6s ease;
			font-size: 25px;
		}
		input[type=submit]{
			border: 1px solid #fff;
			padding: 10px 30px;
			text-decoration: none;
			transition: 0.6s ease;
		}
		input[type=submit]:hover{
			background-color: #fff;
			color: #000;
		}
		input[type=text],input[type=password]{
		  width: 100%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		}
	</style>
</head>
<body>
	<div class="main">
			<ul>
				<li class="active"><a href="#">Admin Login</a></li>
				<li><a href="homepage.html">Home</a></li>
			</ul>
		</div>
	<div class="title">
		<h1>Admin Login</h1>
	</div>
	<form method="post">
		<table class="a" width=40%>
			<tr>
				<td>
					User Name:
				<td>
					<input type="text" placeholder="User Name" name="username" required>
				</td>
			</tr>
			<tr>
				<td>
					Password:
				</td>
				<td>
					<input type="password" placeholder="Password" name="password" required>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit">
				</td>
			</tr>
</body>
</html>