<?php 
require_once "dbconnection.php";
if(isset($_POST['submit']))
{
	$count=0;
	$catch=$_POST['flightcode'];
	$sql="select * from flight where FLIGHT_CODE='$catch'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			if($catch==$row['FLIGHT_CODE'])
			{
				$duration=$row['DURATION'];
				$arrival=$row['ARRIVAL'];
				$departure=$row['DEPARTURE'];
				$economyclass=$row['PRICE_ECONOMY'];
				$businessclass=$row['PRICE_BUSINESS'];
				$students=$row['PRICE_STUDENTS'];
				$diff=$row['PRICE_DIFFERENTLYABLED'];
				$count+=1;
			}
			else
			{
				$count=0;
			}
		}
	}
	if($count==0)
	{
		echo "<script>alert('Flight Code not in database')</script>";
		echo "<script>window.location='modifyadmindetails.html'</script>";
	}
	$sql="insert into selected(FLIGHT_CODE) values('$catch')";
	$res=mysqli_query($con,$sql);
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
			top: 20%;
			left: 50%;
			transform: translate(-50%,-50%);	
		}
		.title h1{
			color: #fff;
			font-size: 70px;
		}
		body{
			background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(plane.jpg);
			height: 100vh;
			background-size: cover;
			background-position: center;
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
		input[type=text], select {
		  width: 100%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		}
		input[type=number], select {
		  width: 100%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		}
		input[type=date], select {
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
				<li class="active"><a href="#">Modify Flight Details</a></li> 
			</ul>
	</div>
	<div class="title">
		<h1>Modify Flight Details</h1>
	</div>
	<form action="modifyflightdetails.php" method="post">
		<table class='a' cellspacing="30">
			<tr>
				<td>Departure</td>
				<td><input type="text" placeholder=<?php echo $departure ?> name="departure"></td>
				<td>Arrival</td>
				<td><input type="text" placeholder=<?php echo $arrival ?> name="arrival"></td>
				<td>Duration</td>
				<td><input type="text" placeholder=<?php echo $duration ?> name="duration"></td>
			</tr>
			<tr>
				<td>Price :</td>
			</tr>
			<tr>
				<td>
					Business Class
				</td>
				<td>
					<input type="number" placeholder=<?php echo $businessclass ?> name="businessclass">
				</td>
				<td>
					Economy Class
				</td>
				<td>
					<input type="number" placeholder=<?php echo $economyclass ?> name="economyclass">
				</td>
				<td>
					For Students
				</td>
				<td>
					<input type="number" placeholder=<?php echo $students ?> name="students">
				</td>
				</tr>
				<tr>
				<td>
					For Differently Abled
				</td>
				<td>
					<input type="number" placeholder=<?php echo $diff ?> name="diff">
				</td>
			</tr>
			<tr>
				<td>
					<input type="Submit" value="Modify" name="submit">
				</td>
			</tr>
		</table>
</body>
</html>