<?php
	require_once "dbconnection.php";
	$count=0;
	$query=mysqli_query($con,("select * from pass"));
	$rows=mysqli_fetch_array($query);
	$passportno=$rows['PASSPORT_NO'];
	if(isset($_POST['submit']))
	{
		if(isset($_POST['firstname']) && !empty($_POST['firstname']))
		{
			$fname=$_POST['firstname'];
			$sql="update passenger set FNAME='$fname' where PASSPORT_NO='$passportno'";
			if(mysqli_query($con,$sql))
			{
				$count+=1;
			}
		}
		if(isset($_POST['middlename']) && !empty($_POST['middlename']))
		{
			$mname=$_POST['middlename'];
			$sql="update passenger set MNAME='$mname' where PASSPORT_NO='$passportno'";
			if(mysqli_query($con,$sql))
			{
				$count+=1;
			}
		}
		if(isset($_POST['lastname']) && !empty($_POST['lastname']))
		{
			$lname=$_POST['lastname'];
			$sql="update passenger set LNAME='$lname' where PASSPORT_NO='$passportno'";
			if(mysqli_query($con,$sql))
			{
				$count+=1;
			}
		}
		if(isset($_POST['passportnumber']) && !empty($_POST['passportnumber']))
		{
			$passportno1=$_POST['passportnumber'];
		}
		if(isset($_POST['age']) && !empty($_POST['age']))
		{
			$age=$_POST['age'];
			$sql="update passenger set AGE='$age' where PASSPORT_NO='$passportno'";
			if(mysqli_query($con,$sql))
			{
				$count+=1;
			}
		}
		if(isset($_POST['sex']) && !empty($_POST['sex']))
		{
			$sex=$_POST['sex'];
			$sql="update passenger set SEX='$sex' where PASSPORT_NO='$passportno'";
			if(mysqli_query($con,$sql))
			{
				$count+=1;
			}
		}
		if(isset($_POST['phonenumber']) && !empty($_POST['phonenumber']))
		{
			$phonenumber=$_POST['phonenumber'];
			$sql="update passenger set PHONE='$phonenumber' where PASSPORT_NO='$passportno'";
			if(mysqli_query($con,$sql))
			{
				$count+=1;
			}
		}
		if(isset($_POST['address']) && !empty($_POST['address']))
		{
			$address=$_POST['address'];
			$sql="update passenger set ADDRESS='$address' where PASSPORT_NO='$passportno'";
			if(mysqli_query($con,$sql))
			{
				$count+=1;
			}
		}
		$sql1=mysqli_query($con,"DELETE FROM pass WHERE PASSPORT_NO='$passportno'");
		if($count>0)
		{
			echo "<script>alert('Data Modified Successfully')</script>";
			echo "<script>window.location='passengerchoice.html'</script>";
		}
		else
		{
			echo "<script>alert('Data Modification Failed')</script>";
			echo "<script>window.location='modifypassengerdetails.html'</script>";
		}
	}
?>

