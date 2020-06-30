<?php 
	$flag=0;
	require_once "dbconnection.php";
	if(isset($_POST['submit']))
	{
		$country=$_POST['country'];
		$state=$_POST['state'];
		$city=$_POST['source'];
		$airportname=$_POST['airportname'];
		$source=$_POST['source'];
		$destination=$_POST['destination'];
		$departure=$_POST['departure'];
		$arrival=$_POST['arrival'];
		$duration=$_POST['duration'];
		$airlinesid=$_POST['airlinesid'];
		$flightcode=$_POST['flightcode'];
		$date=$_POST['date'];
		$economyclass=$_POST['economyclass'];
		$businessclass=$_POST['businessclass'];
		$students=$_POST['students'];
		$diff=$_POST['diff'];
		$sql="select * from airline where AIRLINE_ID='$airlinesid'";
		$res=mysqli_query($con,$sql);
		if(mysqli_num_rows($res)>0){
			$sql="select * from flight where FLIGHT_CODE='$flightcode'";
			$res=mysqli_query($con,$sql);
			if(mysqli_num_rows($res)==0){
				if(strlen($flightcode)==10){
				$sql1="insert into city(C_NAME,STATE,COUNTRY) values ('$city','$state','$country')";
				if(mysqli_query($con,$sql1))
				{
				$flag=$flag+1;
				}
				$sql2="insert into airport(A_NAME,STATE,COUNTRY,C_NAME) values ('$airportname','$state','$country','$city')";
				if(mysqli_query($con,$sql2))
				{
				$flag=$flag+1;
				}
				$sql4="insert into contains(A_NAME,AIRLINE_ID) values('$airportname','$airlinesid')";
				if(mysqli_query($con,$sql4))
				{
				$flag=$flag+1;
				}
				$sql5="insert into flight(SOURCE,DESTINATION,DEPARTURE,ARRIVAL,DURATION,FLIGHT_CODE,AIRLINE_ID,PRICE_BUSINESS,PRICE_ECONOMY,PRICE_STUDENTS,PRICE_DIFFERENTLYABLED,DATE) values('$source','$destination','$departure','$arrival','$duration','$flightcode','$airlinesid','$businessclass','$economyclass','$students','$diff','$date')";
				if(mysqli_query($con,$sql5))
				{
				$flag=$flag+1;
				}
				if ($flag=4)
				{
				echo "<script>alert('Inserted successfully')</script>";
				echo "<script>window.location='homepage.html'</script>";
				}
				else
				{
				echo "<script>alert('Insertion Failed')</script>";
				}
				}
				else{
					echo "<script>alert('Flight Code should be of length 10')</script>";
					echo "<script>window.location='admin_form.html'</script>";
				}
				}
				else{
					echo "<script>alert('Duplicate Flight Code !')</script>";
					echo "<script>window.location='admin_form.html'</script>";
				}
			}
		else{
			echo "<script>alert('Airline Code not in database')</script>";
			echo "<script>window.location='admin_form.html'</script>";
		}
	}
?>