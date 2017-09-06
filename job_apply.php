<html>
<head>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">   
</head>
<body>

<?php
    include("php_classes/writer_auth.php");
    include("php_classes/db.php");
    $username = $_SESSION["username"];
    if(isset($_POST["jobid"]))
    {
    $jobid = $_POST["jobid"];
    $userid = $_SESSION["username"];
    $query="Select * from `job_apply` where job_id='$jobid' and user_id='$userid'";
    $result = mysql_query($query) or die(mysql_error());
        $rows = mysql_num_rows($result);
        if($rows==0){
    $query = "INSERT into `job_apply`(job_id, user_id, status) values('$jobid', '$userid','Request')";
    if(mysql_query($query))
    {
        echo '<h1 align = "center"><label class="label label-success col-ld-8" >Successfully Applied</label></h1>';
    }
    else
    {
        echo "Error";
    }
    }
    else
    {
        echo '<h1 align = "center"><label class="label label-danger col-ld-8" >You have already applied for this job</label></h1>';
    }
}

    ?>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
</body>
</html>