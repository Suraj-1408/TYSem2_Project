<?php
session_start(); 
?>


<html lang="en">
<head>
  <title>Project with Ongoing Status </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<!--<head>
        <title></title>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght!400;500;600&display=swap" rel="stylesheet"/>
    </head> 
-->

    <style>
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
            font-family:monospace,sans-serif;
        }

        body{
            background-color:#120E16;

        }

        .container{
            width:90w;
            max-width:800px;
            padding:2em 1.5em;
            background-color:#f6f6f7;
            margin:1em auto;
            border-radius:0.5em;

        }

        h4{
            font-size:1.5em;
            margin-bottom:20px;
            margin-left:140px;
        }

        .input-section{
            margin:0.5em 0;
        }
        label,
        .error-message{
            display:block;
            font-size:1em;
        }

        label{
            margin-bottom:0.5em;
            font-weight:600;
        }

        .error-message{
            margin-top:0.2em;
        }

        input,button{
            display:block;
            outline:none;
            width:100%;
            padding:0.5em;
            border-radius:0.3em;
        }

        input{
            padding:1em 0.5em;
            border:1.5px solid #d0d0d0;
        }

        button{
            font-size:1em;
            background-color:#3164ff;
            border:none;
            color:#ffffff;
            padding:0.8em 0;
            margin-top:2em;
        }

        select{
            display:block;
            outline:none;
            width:100%;
            padding:0.5em;
            border-radius:0.3em;
        }

        select{
            padding:1em 0.5em;
            border:1.5px solid #d0d0d0;
        }

        .required-color{
            color:#ff4747;
        }

        .error{
            border-color:#37a147;
        }

        .valid{
            border-color:#37a137;
        }

        .hide{
            display:none;
        }

    
        @media only screen and (max-width:450px){
            .container{
                font-size:14px;
            }
        }
    </style>


    <body onload="getLocation();">
    <center><h1 style="background-color:#613FE5">Project Information Gathering of Several Departments</h1></center>

    
    <?php
        if(isset($_SESSION['status']))
        {
            ?>
            
            <?php
             echo $_SESSION['status'];
             unset($_SESSION['status']);
        }
    ?>



    <div class="container">
        <form  style="background-color:#b5b5b5;" class="myForm" action="Insert_emp.php" method="POST">
            <h4   style="background-color:">Project Information Gathering</h4>
            
            
            <div class="input-section">
                <label>Project Id<span class="required-color">*</span></label>
                <input type="text" placeholder="Enter Project ID" id="project-id" name="pid" required>
            </div>

            <div class="input-section">
                <label>Project Name<span class="required-color">*</span></label>
                <input type="text" placeholder="Enter Project Name" id="project-name-input" name="pname" required/>
           </div>

            <div class="input-section">
                <label>Project Type<span class="required-color">*</span></label>
                <select name="ptype" required>
                <option value="" disabled selected hidden>Select Project Type</option>
                <option value="Construction">Construction</option>
                <option value="Pipeline Distribution">Pipeline Distribution</option>                
                <option value="Electrical Power Work">Electrical Power Work</option>                
                <option value="Sanitiation & Hygien Management Work">Sanitiation & Hygien Management Work</option>                
                <option value="Environment/Park Recreation">Environment/Park Recreation</option>                
                <option value="Infrastructure & Transportation">Infrastructure & Transportation</option>                
               </select>
            </div>

            <div class="input-section">
                <label>Project Status<span class="required-color">*</span></label>
                <!--<input type="text" placeholder="Enter Project Status" id="project-name-input" name="pstatus" required/>  -->
                <select name="pstatus"  id="project-status-input" required>
                <option value="" disabled selected hidden>Select Project Status</option>
                <option value="ONG">ONG</option>
                <option value="UPC">UPC</option>                               
               </select>
            </div>


            <div class="input-section">
                <label>Project Commencement<span class="required-color">*</span></label>
                <input type="text" placeholder="Enter Project Start Date" id="commencement-date-input" name="psdat" required/>
            </div>

            <div class="input-section">
                <label>Project Termination<span class="required-color">*</span></label>
                <input type="text" placeholder="Enter Project End Date" id="termination-date-input" name="pedat" required/>
            </div>

            <div class="input-section">
                <label>Project Location<span class="required-color">*</span></label>
                <input type="text" placeholder="Enter Project Location" id="termination-date-input" name="loc" required/>
                
            </div>

            <div class="input-section">
                <label>Latitude<span class="required-color">*</span></label>
                <input type="text" placeholder="Latitude Location" id="project-latitude-input" name="latitude" required/>
        
            </div>

            <div class="input-section">
                <label>Longitude<span class="required-color">*</span></label>
                <input type="text" placeholder="Longitude Location" id="project-longitude-input" name="longitude" required/>
            </div>

            <div class="from-group mb-3">
            <button type="submit" name="s1" class="btn btn-primary">Submit</button><br/><br>
            </div>
            <a href="Show_emp.php">Show Projects</a>
            

        </form>

    </div>


        <script type="text/javascript">
    
            function getLocation(){
                if(navigator.geolocation){
                    navigator.geolocation.getCurrentPosition(showPosition);
                }
            }

            function showPosition(position){
                document.querySelector('.myForm input[name="latitude"]').value=position.coords.latitude;
                document.querySelector('.myForm input[name="longitude"]').value=position.coords.longitude;
            }

            function showError(error){
                switch(error.code){
                    case error.PERMISSION_DENIED:
                    alert("You Must allow the Request for Geolocation to Fill out the Form ");
                    location.reload();
                    break;
                }
            }

            //alert('Project Data Recorded Sucessfully');
                //window.location='/Sem2/Dataretrive/FormData.php';
                //document.location.href='Insert_emp.php';
        </script>

</body>
</html>
