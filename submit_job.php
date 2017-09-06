<html>
<head>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">   
</head>
<body>

<?php

 include("php_classes/db.php");
 include("php_classes/writer_auth.php");

 if(isset($_POST["submit"])){

 $data = $_POST['editor'];
 $jobid = $_POST['jobid'];
 

 $query = "Update job_posts set submited_data = '$data' , job_status = 'Completed' where job_id = '$jobid'" ;

 if(mysql_query($query)){

 	echo '<h1 align = "center"><label class="label label-success col-ld-8" >Successfully Posted</label></h1>';
 	
 }

else
{
	echo "Unsuccessful"; 
}

 }

?>
 <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
</body>
</html>