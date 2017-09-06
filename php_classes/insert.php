<?php
include("db.php");
session_start();

if(isset($_POST['title']))
  {
    $phno = $_SESSION["username"];
    $title=$_POST['title'];
    $cname=$_POST['cname'];
    $des=$_POST['des'];
    $duration=$_POST['duration'];

    $sql="SELECT phno from `writer_user` where phno='$phno'";
      
      $result = mysql_query($sql) or die(mysql_error());
      $row = mysql_fetch_assoc($result);

      $id=$row['phno'];

      $sql="INSERT into `w_exp` (wid, title, des, company_name, duration) values('$id','$title','$des','$cname','$duration') ";

      if(mysql_query($sql))
      {
        echo "Successfully insert";
      }
        else
      {
        Echo "Insertion Error";
      }
  
  }

?>