<html>
<head>
  <title>Project with Ongoing Status </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
    <title></title>
    <h1><center>Projects With Ongoing Status</center></h1>
	<body style="background-color:#b5b5b5">
<?php
	//include('Insert_emp.php');
	$con=pg_connect("host=localhost dbname=postgres user=postgres  password=paswan9741") or
		die("Not able to Connect");

	error_reporting(0);
	//$query="SELECT pid,pname,pstatus FROM project_detls"; //WHERE pstatus = 'ONG' ORDER BY pstatus ASC;";
	$query="SELECT pid, pname,ptype,pstatus,psdat,pedat,plocation,latitude,longitude FROM projects_info WHERE pstatus = 'ONG' ORDER BY pstatus ASC";
	//$query="SELECT COUNT(*) FROM projects_info WHERE pstatus = 'UPC';";
	$result=pg_query($query);

	echo "<table border='2' cellspacing='0'>

		<tr>
		<th style='background-color:#613FE5;font-size:18px'><b>Project ID</b></th>
		<th style='background-color:#613FE5;font-size:18px'><b>Project Name</b></th>
		<th style='background-color:#613FE5;font-size:18Px'><b>Project Type</b></th>
		<th style='background-color:#613FE5;font-size:18px'><b>Status</b></th>
		<th style='background-color:#613FE5;font-size:18px'><b>Project Commencement</b></th>
		<th style='background-color:#613FE5;font-size:18px'><b>Project DeadLine</b></th>
		<th style='background-color:#613FE5;font-size:18px'><b>Project Location</b></th>
		<th style='background-color:#613FE5;font-size:18px'><b>Latitude</b></th>
		<th style='background-color:#613FE5;font-size:18px'><b>Longitude</b></th>
		<th style='background-color:#613FE5;font-size:18px'><b>Map</b></th>
		</tr>";
		

	while($row=pg_fetch_row($result))
	{
	 echo"<tr>";
	echo"<td style='text-align:center;font-weight:800'>" . $row[0] . "</td>";
	echo"<td style='text-align:center'>" . $row[1] . "</td>";
	echo"<td style='text-align:center'>" . $row[2] . "</td>";
	echo"<td style='text-align:center'>" .$row[3]  . "</td>";
	echo"<td style='text-align:center'>" . $row[4] . "</td>";
	echo"<td style='text-align:center'>" . $row[5] . "</td>";
	echo"<td style='text-align:center'>" . $row[6] . "</td>";
	echo"<td style='text-align:center'>" . $row[7] . "</td>";
	echo"<td style='text-align:center'>" . $row[8] . "</td>";
	echo'<td style="width:450px;height:450px;"> <iframe src="https://maps.google.com/maps?q='. $row[6].','. $row[7].'&h1=es&z=14&amp;output=embed" style="width:100%;height:100%"></iframe> </td>';
	echo "</tr>";
	//https://www.google.com/maps?q='. $row[6].','. $row[7].'&h1=es;z=14&output=embed" style="width:100%;height:100%"></iframe> </td>';
	//https://maps.google.com/maps?q='. $row[6].','. $row[7].'&t=&z=15&ie=UTF8&iwloc=&output=embed" style="width:100%;height:100%"></iframe> </td>';
	//https://maps.google.com/maps?q='. $row[6].','. $row[7].'&h1=es&z=14&amp;output=embed" style="width:100%;height:100%"></iframe> </td>';
	
	}
	echo "</table>";
	pg_close($con);
?>

<a href="UPCOMING.php">Show Upcoming Projects</a>

</body>
</html>