<?php
require_once "dbconnection.php";
if(isset($_POST['submit']))
{
	$count=0;
	$flag=0;
	$flag1=0;
	$num=0;
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
					$flag1+=1;
				}
			}
			else
			{
				$flag1=0;
			}
		}
	}
	if($count==0)
	{
		echo "<script>alert('No such Tickets found !')</script>";
		echo "<script>window.location='deletepassengerdetails.html'</script>";
	}
	if($flag1==0)
	{
		echo "<script>alert('No such Tickets found !')</script>";
		echo "<script>window.location='deletepassengerdetails.html'</script>";
	}
	if(($count!=0)&&($flag1!=0))
	{
		$sql="delete from ticket where TICKET_NO='$ticketno' && PASSPORT_NO='$passportno'";
		$sql1="delete from passenger where PASSPORT_NO='$passportno'";
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
		if($num==2)
		{
			echo "<script>alert('Ticket deleted successfully')</script>";
			echo "<script>window.location='passengerchoice.html'</script>";
		}
		else if($flag!=0)
		{	
			echo "<script>alert('Ticket deletion failed')</script>";
			echo "<script>window.location='deletepassengerdetails.html'</script>";
		}
	}
}

?>