<?php
	require_once "dbconnection.php";
	$query=mysqli_query($con,("select * from selected"));
	$rows=mysqli_fetch_array($query);
	$flight=$rows['FLIGHT_CODE'];
	$query=mysqli_query($con,("select * from pass"));
	$rows=mysqli_fetch_array($query);
	$passportno=$rows['PASSPORT_NO'];
	$query=mysqli_query($con,("select * from ticket where PASSPORT_NO='$passportno'"));
	$rows=mysqli_fetch_array($query);
	$ticketno=$rows['TICKET_NO'];
	$source=$rows['SOURCE'];
	$destination=$rows['DESTINATION'];
	$date=$rows['DATE_OF_TRAVEL'];
	$query=mysqli_query($con,("select * from passenger where PASSPORT_NO='$passportno'"));
	$rows=mysqli_fetch_array($query);
	$fname=$rows['FNAME'];
	$lname=$rows['LNAME'];
	$age=$rows['AGE'];
	$sex=$rows['SEX'];
	$phone=$rows['PHONE'];
	$address=$rows['ADDRESS'];
	$query=mysqli_query($con,("select * from flight where FLIGHT_CODE='$flight'"));
	$rows=mysqli_fetch_array($query);
	$arrival=$rows['ARRIVAL'];
	$departure=$rows['DEPARTURE'];
	$duration=$rows['DURATION'];
	$airlineid=$rows['AIRLINE_ID'];
	$query=mysqli_query($con,("select * from airline where AIRLINE_ID='$airlineid'"));
	$rows=mysqli_fetch_array($query);
	$airlinename=$rows['AIRLINE_NAME'];
	$query=mysqli_query($con,("select PRICE,TYPE from price"));
	$rows=mysqli_fetch_array($query);
	$price=$rows['PRICE'];
	$type=$rows['TYPE'];
	$sql1=mysqli_query($con,"DELETE FROM selected WHERE FLIGHT_CODE='$flight'");
	$sql2=mysqli_query($con,"DELETE FROM pass WHERE PASSPORT_NO='$passportno'");
	$sql3=mysqli_query($con,"DELETE FROM price WHERE PRICE='$price'");
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
			.choices{
			position: absolute;
			top: 95%;
			left: 50%;
			transform: translate(-50%,-50%);
			}
			.a1{
				border: 1px solid #fff;
				padding: 10px 30px;
				color: #fff;
				text-decoration: none;
				transition: 0.6s ease;
			}
			.a1:hover{
			background-color: #fff;
			color: #000;
			}
			body{
			background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(plane.jpg);
			height: 100vh;
			background-size: cover;
			background-position: center;
			}
			div.a{
				position: absolute;
				left: 40%;
				top: 5%;
				color: #fff;
				font-size: 40px;
			}
			div.b{
				border: 1px solid #fff;
				padding: 10px 30px;
				color: #fff;
				text-decoration: none;
				position: absolute;
				top: 55%;
				left: 50%;
				transform: translate(-50%,-50%);
				font-size: 23px;
			}
	</style>
</head>
<body>
	<div class="main">
			<ul>
				<li class="active"><a href="#">E-Ticket</a></li>
			</ul>
		</div>
	<div class="a"><h1>E-Ticket:</h1></div>
	<div class="b">
		<?php echo "First Name  :".$fname ?></br>
		<?php echo "Last Name  :".$lname ?></br>
		<?php echo "Age  :".$age ?></br>
		<?php echo "Sex  :".$sex ?></br>
		<?php echo "Phone  :".$phone ?></br>
		<?php echo "Address  :".$address ?></br>
		<?php echo "Passport Number  :".$passportno ?></br>
		<?php echo "Source  :".$source ?></br>
		<?php echo "Destination  :".$destination ?></br>
		<?php echo "Arrival  :".$arrival ?></br>
		<?php echo "Departure  :".$departure ?></br>
		<?php echo "Duration  :".$duration ?></br>
		<?php echo "Date  :".$date ?></br>
		<?php echo "Price  :".$price ?></br>
		<?php echo "Type 	:".$type ?></br>
		<?php echo "Airline Name  :".$airlinename ?></br>
		<?php echo "Flight Code  :".$flight ?></br>
		<?php echo "Ticket Number  :".$ticketno ?></br>
	</div>
	<div class="choices" >
			<a href="homepage.html" class="a1">Home</a>
	</div>
</body>
</html>