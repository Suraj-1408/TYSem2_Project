<?php
	$con=pg_connect("host=localhost dbname=postgres user=postgres password=paswan9741") or die("Unable to connect to DataBase");
        error_reporting(0);
    if(isset($_POST['s1']))
	{
        $did=$_POST['did'];
        $pid=$_POST['pid'];
        
		$powner=$_POST['powner'];
		$contact=$_POST['cnt'];


		$query="Insert into project_detail(dtl_id,pid,project_owner,contact_detail)
		 values('$did','$pid','$powner','$contact')";

    }	 
        //$query_run=pg_query($con,$query);

         if(pg_query($query)){
            echo "Inserted Succesfully";
         }
         else
	     echo "Not Inserted<br/>";


	//error_reporting(0);
	$query="select dtl_id,pid,project_owner,contact_detail from project_detail;";
	$result=pg_query($query);
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>


<table class="table">
    <thead>
      <tr>
        <th>Detail Id</th>
        <th>Project Id</th>
        <th>Project Owner</th>
        <th>View Detail</th>
      </tr>
    </thead>
    <tbody>

<?php

    if(pg_num_rows($result)>0){
    while($row=pg_fetch_row($result)){
        ?>
        <tr>
            <td><?php echo $row[0]?></td>
            <td><?php echo $row[1]?></td>
            <td><?php echo $row[2]?></td>
            <td><button id='<?php echo $row['pid']?>' class='btn btn-primary'>View</button><?php echo $row[3]?></td>
            
        </tr>

    <?php
        //echo "Detail_Id:".$row[0]."</br>Project_Id:".$row[1]."<br>Project_Owner:".$row[2]."<br>Contact_On:".$row[3]."<br><br>";
        }
    }
    else{
        echo"0 Results";
    }
	
	pg_close($con);
?>

</tbody>
  </table>

    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

    <script>
        $(document).ready(function(){
            $('button').click(function(){
        did=$(this).attr(id)
        alert(did);        

                // $.ajax({url:"upcoming.php",
                //     method:'post',
                //     data:{pid:}
                //     success:function(result){
                //     $("#div1").html(result);
                // }});

                $('#myModal').modal("show");
            })
        })
        
    </script>

<body>  
<!--           -->
</body>
</html>




<!-------------------Input Form Table --->
<html>
<head>
<body>
<h1>Employee Information</h1>
<form action="view.php" method="POST">
Detail_Id<input type="text" name="did"/><br/>
Project_Id<input type="text" name="pid"/><br/>
Project_Owner<input type="text" name="powner"/><br>
Contact<input type="text" name="cnt"/><br/><br/>

<input type="Submit" name="s1" value="Insert"/><br/><br/>
<a href="Show_Employee.php">Show Employee</a>
</form>
</body>
</html>

<a href="FormData.php">Back</a>