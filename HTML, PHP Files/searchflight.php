<?php 
	require_once "dbconnection.php";
	if(isset($_POST['search']))
	{
		if(isset($_POST['source']) && !empty($_POST['source']))
		{	
			if(isset($_POST['destination']) && !empty($_POST['destination']))
			{
				if(isset($_POST['date']) && !empty($_POST['date']))
				{
					$source=$_POST['source'];
					$destination=$_POST['destination'];
					$date=$_POST['date'];
					$query=mysqli_query($con,("select ARRIVAL,DEPARTURE,DURATION,FLIGHT_CODE,AIRLINE_ID,PRICE_BUSINESS,PRICE_ECONOMY,PRICE_STUDENTS,PRICE_DIFFERENTLYABLED from flight where SOURCE='$source' && DESTINATION='$destination' && DATE='$date'"));
					$rowscount=mysqli_num_rows($query);
					if ($rowscount==0){
						echo "<script>alert('No Flights available')</script>";
						echo "<script>window.location='searchflight.html'</script>";
					}
				}
				else{
					echo "<script>alert('Please Enter the details correctly')</script>";
					echo "<script>window.location='homepage.html'</script>";
				}
			}
			else{
				echo "<script>alert('Please Enter the details correctly')</script>";
				echo "<script>window.location='homepage.html'</script>";
			}
		}
		else{
			echo "<script>alert('Please Enter the details correctly')</script>";
			echo "<script>window.location='homepage.html'</script>";
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
			top: 15%;
			left: 35%;
			/*transform: translate(-50%,-50%);*/
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
			top: 27%;
			left: 20%;
			/*transform: translate(-50%,-50%);*/
			border: 1px solid #fff;
			padding: 10px 30px;
			color: #fff;
			text-decoration: none;
			transition: 0.6s ease;
			font-size: 20px;
		}
		button[type="submit"]{
			border: 1px solid #fff;
			padding: 10px 30px;
			text-decoration: none;
			transition: 0.6s ease;
		}
		button[type="submit"]:hover{
			background-color: #fff;
			color: #000;
		}
	</style>
</head>
<body>
	<div class="main">
			<ul>
				<li class="active"><a href="#">Available Flights</a></li>
				<li><a href="homepage.html">Home</a></li>
			</ul>
		</div>
	<div class="title">
		<h1>Available Flights</h1>
	</div>
	<table class="a">
		<tr>
			<th>DEPARTURE&emsp;</th>
			<th>ARRIVAL&emsp;</th>
			<th>DURATION&emsp;</th>
			<th>FLIGHT_CODE&emsp;</th>
			<th>AIRLINE_ID&emsp;</th>
			<th>PRICE&emsp;</th>
			<th>TYPE&emsp;</th>
			<th></th>
		</tr>

		<form action="postflightcode.php" method="post">
		<?php 
			for($i=1;$i<=$rowscount;$i++)
			{
				$rows=mysqli_fetch_array($query);
		?>
				<tr>
						<td><?php echo $rows['DEPARTURE'] ?></td>
						<td><?php echo $rows['ARRIVAL'] ?></td>
						<td><?php echo $rows['DURATION'] ?></td>
						<td><?php echo $rows['FLIGHT_CODE']?></td>
						<td><?php echo $rows['AIRLINE_ID']?></td>
						<td><?php echo $rows['PRICE_BUSINESS']?></td>
						<td><?php echo "BUSINESS";?></td>
						<td>&nbsp;<button type="submit"><a href="postflightcodebusiness.php?id=<?php echo $rows['FLIGHT_CODE'] ?>">Select</a></button></td>
				</tr>
				<tr>
						<td><?php echo $rows['DEPARTURE'] ?></td>
						<td><?php echo $rows['ARRIVAL'] ?></td>
						<td><?php echo $rows['DURATION'] ?></td>
						<td><?php echo $rows['FLIGHT_CODE']?></td>
						<td><?php echo $rows['AIRLINE_ID']?></td>
						<td><?php echo $rows['PRICE_ECONOMY']?></td>
						<td><?php echo "ECONOMY";?></td>
						<td>&nbsp;<button type="submit"><a href="postflightcodeeconomy.php?id=<?php echo $rows['FLIGHT_CODE'] ?>">Select</a></button></td>
				</tr>
				<tr>
						<td><?php echo $rows['DEPARTURE'] ?></td>
						<td><?php echo $rows['ARRIVAL'] ?></td>
						<td><?php echo $rows['DURATION'] ?></td>
						<td><?php echo $rows['FLIGHT_CODE']?></td>
						<td><?php echo $rows['AIRLINE_ID']?></td>
						<td><?php echo $rows['PRICE_STUDENTS']?></td>
						<td><?php echo "STUDENTS";?></td>
						<td>&nbsp;<button type="submit"><a href="postflightcodestudents.php?id=<?php echo $rows['FLIGHT_CODE'] ?>">Select</a></button></td>
				</tr>
				<tr>
						<td><?php echo $rows['DEPARTURE'] ?></td>
						<td><?php echo $rows['ARRIVAL'] ?></td>
						<td><?php echo $rows['DURATION'] ?></td>
						<td><?php echo $rows['FLIGHT_CODE']?></td>
						<td><?php echo $rows['AIRLINE_ID']?></td>
						<td><?php echo $rows['PRICE_DIFFERENTLYABLED']?></td>
						<td><?php echo "DIFFERENTLY ABLED";?></td>
						<td>&nbsp;<button type="submit"><a href="postflightcodediff.php?id=<?php echo $rows['FLIGHT_CODE'] ?>">Select</a></button></td>
				</tr>
		<?php	
			}
		?>
	</form>
	</table>
</body>
</html>