<?php 
    include("php_classes/db.php");

    if(isset($_POST["jobid"]))
    {
       $jobid = $_POST["jobid"];
       $query = " DELETE from `job_posts` where job_id = $jobid";
       $query1 = " DELETE from `job_apply` where job_id = $jobid";

           mysql_query($query1) or die(mysql_error());

          if(mysql_query($query)){
             
             header("Location: folio/seeker_jobs.php");

            }
          else
            {
       	echo "error";
            }
       }
    

?>