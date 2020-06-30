<?php 
require_once "dbconnection.php";
if(isset($_POST['submit']))
{
	$num=0;
	$flag=0;
	$count=0;
	$catch=$_POST['flightcode'];
	$sql="delete from ticket where FLIGHT_CODE='$catch'";
	$sql1="delete from passenger where FLIGHT_CODE='$catch'";
	$sql2="delete from flight where FLIGHT_CODE='$catch'";
	$sql3="select * from flight where FLIGHT_CODE='$catch'";
	$res=mysqli_query($con,$sql3);
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			if($catch==$row['FLIGHT_CODE'])
			{
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
		echo "<script>alert('Flight code not in database')</script>";
		echo "<script>window.location='deletedetails.html'</script>";
	}
	else
	{
		if(mysqli_query($con,$sql))
		{
			$num+=1;
		}
		else
		{
			$flag+=1;
		}
		if(mysqli_query($con,$sql1))
		{
			$num+=1;
		}
		else
		{
			$flag+=1;
		}
		if(mysqli_query($con,$sql2))
		{
			$num+=1;
		}
		else
		{
			$flag+=1;
		}
		if($num!=0)
		{
			echo "<script>alert('Flight deleted successfully')</script>";
			echo "<script>window.location='homepage.html'</script>";
		}
		else if($flag!=0)
		{	
			echo "<script>alert('Flight deletion failed')</script>";
			echo "<script>window.location='homepage.html'</script>";
		}
	}
}

?>