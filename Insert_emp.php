<?php
session_start();
	$con=pg_connect("host=localhost user=postgres dbname=postgres password=paswan9741") or
	die("Cloud not connect to database");
	
	/*
	$query="INSERT INTO projects_info(pid,pname,ptype,pstatus,psdat,pedat,plocation,latitude,longitude)  
					VALUES (' ".intval($_POST['pid'])." ' , ' ".$_POST['pname']." ' ,'".$_POST['ptype']."',
						' " .($_POST['pstatus'])." ' , ' " .($_POST['psdat'])." ' ,' ".($_POST['pedat'])." ',
						' ".$_POST['loc']." ',' ".$_POST['latitude']." ',' ".$_POST['longitude']." ')";
	*/

	if(isset($_POST['s1']))
	{
		$pid=$_POST['pid'];
		$name=$_POST['pname'];
		$type=$_POST['ptype'];
		$status=$_POST['pstatus'];
		$sdat=$_POST['psdat'];
		$edat=$_POST['pedat'];
		$loc=$_POST['loc'];
		$lat=$_POST['latitude'];
		$long=$_POST['longitude'];


		$query="Insert into projects_info(pid,pname,ptype,pstatus,psdat,pedat,plocation,latitude,longitude)
		 values('$pid','$name','$type','$status','$sdat','$edat','$loc','$lat','$long')";

		 $query_run=pg_query($con,$query);

		 if($query_run)
		 {
			$_SESSION['status']="Data Inserted Successfully";
			header("Location:FormData.php");
		 }
		 else
		 {
			$_SESSION['status']=" NOT Inserted";
			header("Location:Insert_emp.php");
		 }
	}

?>
<a href="FormData.php">Back</a>
