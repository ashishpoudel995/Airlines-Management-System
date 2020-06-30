<?php
	require_once "dbconnection.php";
	$count=0;
	$flag=0;
	$query=mysqli_query($con,("select * from selected"));
	$rows=mysqli_fetch_array($query);
	$flight=$rows['FLIGHT_CODE'];
	if(isset($_POST['submit']))
	{
		if(isset($_POST['departure']) && !empty($_POST['departure']))
		{
			if(isset($_POST['arrival']) && !empty($_POST['arrival']))
			{
				if(isset($_POST['duration']) && !empty($_POST['duration']))
				{
					$departure=$_POST['departure'];
					$arrival=$_POST['arrival'];
					$duration=$_POST['duration'];
					$sql="update flight set DEPARTURE='$departure' where FLIGHT_CODE='$flight'";
					$sql1="update flight set ARRIVAL='$arrival' where FLIGHT_CODE='$flight'";
					$sql2="update flight set DURATION='$duration' where FLIGHT_CODE='$flight'";
					if(mysqli_query($con,$sql))
					{
						$count+=1;
					}
					if(mysqli_query($con,$sql1))
					{
						$count+=1;
					}
					if(mysqli_query($con,$sql2))
					{
						$count+=1;
					}
					if($count!=3)
					{
						echo "<script>alert('Data Modification Failed')</script>";
						echo "<script>window.location='modifyadmindetails.html'</script>";
					}
				}
				else
				{
					echo "<script>alert('Enter values for Duration also')</script>";
				}
			}
			else
			{
				echo "<script>alert('Enter values for Arrival and duration also')</script>";
			}
		}
		if(isset($_POST['businessclass']) && !empty($_POST['businessclass']))
		{
			$businessclass=$_POST['businessclass'];
			$sql="update flight set PRICE_BUSINESS='$businessclass' where FLIGHT_CODE='$flight'";
			if(mysqli_query($con,$sql))
			{
					$flag+=1;
			}
				else
			{
				echo "<script>alert('Data Modification Failed')</script>";
				echo "<script>window.location='modifyadmindetails.html'</script>";
			}
		}
		if(isset($_POST['economyclass']) && !empty($_POST['economyclass']))
		{
			$economyclass=$_POST['economyclass'];
			$sql="update flight set PRICE_ECONOMY='$economyclass' where FLIGHT_CODE='$flight'";
			if(mysqli_query($con,$sql))
			{
					$flag+=1;
			}
				else
			{
				echo "<script>alert('Data Modification Failed')</script>";
				echo "<script>window.location='modifyadmindetails.html'</script>";
			}
		}
		if(isset($_POST['students']) && !empty($_POST['students']))
		{
			$students=$_POST['students'];
			$sql="update flight set PRICE_STUDENTS='$students' where FLIGHT_CODE='$flight'";
			if(mysqli_query($con,$sql))
			{
					$flag+=1;
			}
				else
			{
				echo "<script>alert('Data Modification Failed')</script>";
				echo "<script>window.location='modifyadmindetails.html'</script>";
			}
		}
		if(isset($_POST['diff']) && !empty($_POST['diff']))
		{
			$diff=$_POST['diff'];
			$sql="update flight set PRICE_DIFFERENTLYABLED='$diff' where FLIGHT_CODE='$flight'";
			if(mysqli_query($con,$sql))
			{
					$flag+=1;
			}
				else
			{
				echo "<script>alert('Data Modification Failed')</script>";
				echo "<script>window.location='modifyadmindetails.html'</script>";
			}
		}
	$sql1=mysqli_query($con,"DELETE FROM selected WHERE FLIGHT_CODE='$flight'");
	if($count==3 || $flag!=0)
	{
		echo "<script>alert('Data Modified Successfully')</script>";
	}
	else
	{
		echo "<script>alert('Data Modification Failed')</script>";
		echo "<script>window.location='modifyadmindetails.html'</script>";
	}
	echo "<script>window.location='homepage.html'</script>";
	}
?>