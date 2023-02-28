
<html>
<head>
  <title>Status</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
		
	
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
	body{
    background:#b5b5b5;
	}

	h1{
		margin-top:2px 10px 2px 10px;
	}

	.actionBtns{
		width:35%;
		background-color:#613FE5;
		margin:1em;
		margin-left:32%;
		margin-top:0%;
		display:flex;
		justify-content:space-between;
		position:relative;
		border-radius:50px;
		box-shadow:rgba(0,0,0,0.09)0px 3px 12px;
	}

	.actionBtn{
		padding:1em;
		width:50%;
		outline:none;
		border:none;
		background-color:transparent;
		border-radius:50px;
		color:#fff;
		font-size:0.8em;
		font-weight:600;
		cursor:pointer;
		
	}

	.moveBtn{
		position:absolute;
		width:50%;
		height:90%;
		margin:2px;
		border:none;
		outline:none;
		border-radius:50px;
		background-color:#f6f6f7;	
		font-size:0.8em;
		font-weight:600;
		box-shadow:rgba(0,0,0,0.1) 0px 4px 12px;
		transform:translateX(0);
		transition:all 0.2s ease-in-out;
	}

	.rightBtn{
		transform:translateX(98%);
		transition:all 0.2s ease-in-out;
	}
	</style>

	<body>
	<h1 style="font-family:monospace,sans-serif;"><center>Projects With Ongoing & Upcoming Status</center></h1>;

	<div class="actionBtns">
		<button class="actionBtn signupBtn">ONGOING</button>
		<button class="actionBtn loginBtn"><a href="UPCOMING.php">UPCOMING</a></button>
		<button class="moveBtn"><a href="ONGOING.php">ONGOING</a></button>
	</div>

	<script type="text/javascript">		
		const singupBtn=document.querySelector(".signupBtn");
		const loginBtn=document.querySelector(".loginBtn");
		const moveBtn=document.querySelector(".moveBtn");

		loginBtn.addEventListener("click",()=>{
			moveBtn.classList.add("rightBtn");
			moveBtn.innerHTML="UPCOMING";
		})

		singupBtn.addEventListener("click",()=>{
			moveBtn.classList.remove("rightBtn");
			moveBtn.innerHTML="ONGOING";
		})

                //window.location='/Sem2/Dataretrive/FormData.php';
                //document.location.href='FormData.php';
                

	</script>
	</body>

</html>


<?php
	$con=pg_connect("host=localhost dbname=postgres user=postgres  password=paswan9741") or
		die("Not able to Connect");

	error_reporting(0);
	$query="select pid,pname,ptype,pstatus,psdat,pedat,plocation,latitude,longitude from projects_info;";
	$result=pg_query($query);

	echo "<table border='2' cellspacing='0'>

		<tr>
		<th style='background-color:#613FE5;'><b>Project ID</b></th>
		<th style='background-color:#613FE5'><b>Project Name</b></th>
		<th style='background-color:#613FE5'><b>Project Type</b></th>
		<th style='background-color:#613FE5'><b>Status</b></th>
		<th style='background-color:#613FE5'><b>Project Commencement</b></th>
		<th style='background-color:#613FE5'><b>Project DeadLine</b></th>
		<th style='background-color:#613FE5'><b>Project Location</b></th>
		<th style='background-color:#613FE5'><b>Latitude</b></th>
		<th style='background-color:#613FE5'><b>Longitude</b></th>
		<th style='background-color:#613FE5'><b>Map</b></th>
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

<a href="FormData.php">Back</a>