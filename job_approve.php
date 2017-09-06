<?php
      

      include("php_classes/db.php");

      if(isset($_POST["jobid"]))
      {
         $jobid = $_POST["jobid"];
         $userid = $_POST["userid"];
         $date = date("Y-m-d ");

         $query = "UPDATE `job_posts` set job_status = 'Approved' where job_id = '$jobid'";
         $query1 = "INSERT into `job_approved`(job_id, user_id, approved_date) values('$jobid', '$userid', '$date')";
         $query2 = "DELETE  from `job_apply` where job_id ='$jobid' ";

         if(mysql_query($query)){

         	if(mysql_query($query1)){

         		if(mysql_query($query2)){

         			echo "Successfully approved";
         		}
         	}
         }




      }

?>