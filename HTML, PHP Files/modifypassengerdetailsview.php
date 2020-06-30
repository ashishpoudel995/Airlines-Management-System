<?php
require_once "dbconnection.php";
if(isset($_POST['submit']))
{
	$count=0;
	$flag=0;
	$passportno=$_POST['passportno'];
	$ticketno=$_POST['ticketnumber'];
	$sql="select * from passenger where PASSPORT_NO='$passportno'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			if($passportno==$row['PASSPORT_NO'])
			{
				$fname=$row['FNAME'];
				$mname=$row['MNAME'];
				$lname=$row['LNAME'];
				$age=$row['AGE'];
				$sex=$row['SEX'];
				$phone=$row['PHONE'];
				$address=$row['ADDRESS'];
				$count+=1;
			}
			else
			{
				$count=0;
			}
		}
	}
	$sql="select * from ticket where TICKET_NO='$ticketno'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			if($ticketno==$row['TICKET_NO'])
			{
				if($passportno=$row['PASSPORT_NO']){
					$flag+=1;
				}
			}
			else
			{
				$flag=0;
			}
		}
	}
	if($count==0)
	{
		echo "<script>alert('No such Tickets found !')</script>";
		echo "<script>window.location='modifypassengerdetails.html'</script>";
	}
	if($flag==0)
	{
		echo "<script>alert('No such Tickets found !')</script>";
		echo "<script>window.location='modifypassengerdetails.html'</script>";
	}
	if(($count!=0)&&($flag!=0)){
	$sql="insert into pass(PASSPORT_NO) values('$passportno')";
	$res=mysqli_query($con,$sql);
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
		</style>
</head>
<body>
	<div class="main">
			<ul>
				<li class="active"><a href="#">Modify Passenger Details</a></li>
				<li><a href="homepage.html">Home</a></li>
			</ul>
		</div>
	<div class="title">
		<h1>PASSENGER DETAILS</h1>
	</div>
	<form action="modifypassengerdetails.php" method="post">
		<table class="a" width=40%>
			<tr>
				<td>
					First Name:
				<td>
					<input type="text" placeholder=<?php echo $fname ?> name="firstname">
				</td>
			</tr>
			<tr>
				<td>
					Middle Name:
				</td>
				<td>
					<input type="text" placeholder=<?php if($mname!=NULL){echo $mname;}else{echo "MiddleName";} ?> name="middlename">
				</td>
			</tr>
			<tr>
				<td>
					Last Name:
				</td>
				<td>
					<input type="text" placeholder=<?php echo $lname ?> name="lastname">
				</td>
			</tr>
			<tr>
				<td>
					Age:
				</td>
				<td>
					<input type="Number" placeholder=<?php echo $age ?> name="age">
				</td>
			</tr>
			<tr>
				<td>
					Sex:
				</td>
				<td>
					<input type="text" placeholder=<?php echo $sex ?> name="Sex">
				</td>
			</tr>
			<tr>
				<td>
					Phone Number:
				</td>
				<td>
					<input type="text" placeholder=<?php echo $phone ?> name="phonenumber">
				</td>
			</tr>
			<tr>
				<td>
					Address:
				</td>
				<td>
					<input type="text" placeholder=<?php echo $address ?> name="address">
				</td>
			</tr>
			<tr>
				<td>
					<input type="Submit" value="Modify" name="submit">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>