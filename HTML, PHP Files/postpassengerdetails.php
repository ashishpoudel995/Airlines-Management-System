<?php 
require_once "dbconnection.php";
if(isset($_POST['submit']))
{
	$condition=0;
	$len=0;
	$firstname=$_POST['firstname'];
	$middlename=$_POST['middlename'];
	$lastname=$_POST['lastname'];
	$query=mysqli_query($con,("select * from selected"));
	$rows=mysqli_fetch_array($query);
	$flight=$rows['FLIGHT_CODE'];
	$age=$_POST['age'];
	$sex=$_POST['Sex'];
	$phonenumber=$_POST['phonenumber'];
	$address=$_POST['address'];
	$passportnumber=$_POST['passportnumber'];
	$len= strlen($passportnumber);
	$sql1=mysqli_query($con,"select PRICE from price");
	$row=mysqli_fetch_array($sql1);
	$price=$row['PRICE'];
	$sql="select * from passenger where PASSPORT_NO='$passportnumber'";
	$res=mysqli_query($con,$sql);
	if($len==8){
		if(strlen($phonenumber)==10){
		if(mysqli_num_rows($res)>0){	
			while($row=mysqli_fetch_assoc($res))
			{
				if($passportnumber==$row['PASSPORT_NO'])
				{
				$query=mysqli_query($con,("select * from selected"));
				$rows=mysqli_fetch_array($query);
				$flight=$rows['FLIGHT_CODE'];
				$sql1=mysqli_query($con,"DELETE FROM selected WHERE FLIGHT_CODE='$flight'");
				$sql2=mysqli_query($con,"DELETE FROM price WHERE PRICE='$price'");
				$condition=1;
				echo "<script>alert('Enter Unique Passport Number')</script>";
				echo "<script>window.location='searchflight.html'</script>";
				}
				else{
					$condition=0;
				}
			}
		}
		if($condition==0){
			$sql="insert into passenger(FNAME,MNAME,LNAME,PASSPORT_NO,AGE,SEX,PHONE,ADDRESS,FLIGHT_CODE) values('$firstname','$middlename','$lastname','$passportnumber','$age','$sex','$phonenumber','$address','$flight')";
			mysqli_query($con,$sql);
			$passportnumber=$_POST['passportnumber'];
			$sql="insert into pass(PASSPORT_NO) values('$passportnumber')";
			mysqli_query($con,$sql);
			$query=mysqli_query($con,("select * from selected"));
			$rows=mysqli_fetch_array($query);
			$flight=$rows['FLIGHT_CODE'];
			$query=mysqli_query($con,("select SOURCE,DESTINATION,DATE from flight where FLIGHT_CODE='$flight'"));
			$rows1=mysqli_fetch_array($query);
			$source=$rows1['SOURCE'];
			$destination=$rows1['DESTINATION'];
			$date=$rows1['DATE'];
			$query=mysqli_query($con,("select PRICE,TYPE from price"));
			$rows2=mysqli_fetch_array($query);
			$price=$rows2['PRICE'];
			$type=$rows2['TYPE'];
			$sql="insert into ticket(PRICE,SOURCE,DESTINATION,DATE_OF_TRAVEL,PASSPORT_NO,FLIGHT_CODE,TYPE) values('$price','$source','$destination','$date','$passportnumber','$flight','$type')";
			if(mysqli_query($con,$sql))
			{
			echo "<script>alert('Ticket Booked Successfully')</script>";
			echo "<script>window.location='reviewticket.php'</script>";
			}
			else
			{
			echo"<script>alert('Ticket Booking Failed')</script>";
			}
		}
	}
	else{
		$query=mysqli_query($con,("select * from selected"));
		$rows=mysqli_fetch_array($query);					
		$flight=$rows['FLIGHT_CODE'];
		$sql1=mysqli_query($con,"DELETE FROM selected WHERE FLIGHT_CODE='$flight'");
		$sql2=mysqli_query($con,"DELETE FROM price WHERE PRICE='$price'");
		echo "<script>alert('Phone Number should be of 10 digits !')</script>";
		echo "<script>window.location='searchflight.html'</script>";
	}
	}
	else{
		$query=mysqli_query($con,("select * from selected"));
		$rows=mysqli_fetch_array($query);					
		$flight=$rows['FLIGHT_CODE'];
		$sql1=mysqli_query($con,"DELETE FROM selected WHERE FLIGHT_CODE='$flight'");
		$sql2=mysqli_query($con,"DELETE FROM price WHERE PRICE='$price'");
		echo "<script>alert('Passport Number should be of 8 digits !')</script>";
		echo "<script>window.location='searchflight.html'</script>";
		}
}

?>
