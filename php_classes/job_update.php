<?php 

include("db.php");
session_start();
if(isset($_POST['jobname'])){
	
	$jobname = $_POST['jobname'];
	$jobdescrp = $_POST['jobdescrp'];
	$jobrate = $_POST['jobrate'];
	$jobexpire = $_POST['jobexpire'];
    $phno = $_SESSION['cname'];
    $date = date("Y-m-d H:i:s");

                      

    $query = "INSERT into `job_posts`(job_name, job_descrp, post_date, job_rate, expire_date, company_id) values('$jobname', '$jobdescrp', '$date' ,'$jobrate', '$jobexpire', '$phno')";

    if(mysql_query($query))
    {
    	echo "Successfully updated";
    }
    else
    {
    	echo "Insertion Error";
    }


}

?>