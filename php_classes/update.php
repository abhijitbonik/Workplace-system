<?php
  session_start();
  include("db.php");

  if(isset($_POST["bio"]))
  {
     $bio = $_POST["bio"];
     $phno = $_SESSION["username"];


  $sql=" UPDATE `writer_user` SET bio = '$bio' where phno = '$phno'  " ;

   if(mysql_query($sql))

     echo "Successfully inserted";

   else

   	echo "Insertion Error ";


  }

 if(isset($_POST['pskills']))
  {
    $pskills = $_POST['pskills'];
    $lskills = $_POST['lskills'];
    $sskills = $_POST['sskills'];
    $cskills = $_POST['cskills'];
    $cfskills = $_POST['cfskills'];
    $spskills = $_POST['spskills'];
    

     $phno = $_SESSION["username"];

    $sql="SELECT phno from `writer_user` where phno='$phno'";
      
      $result = mysql_query($sql) or die(mysql_error());
      $row = mysql_fetch_assoc($result);

      $id=$row['phno'];

      $sql = "SELECT wid from `w_skills` where wid = '$id'";

      $result = mysql_query($sql) or die(mysql_error());
      $row = mysql_fetch_assoc($result);

      if($row['wid']!=$id)
      {
        $sql = "INSERT into  `w_skills`(wid) values ('$id') ";

         mysql_query($sql) or die(mysql_error());
      }

    $sql = "UPDATE `w_skills` SET p_skills = '$pskills', l_skills = '$lskills', s_skills = '$sskills', c_skills = '$cskills', cf_skills = '$cfskills' , sp_skills = '$spskills' where wid = '$id'" ;

      if(mysql_query($sql))

              echo "Successfully inserted";

         else

              echo "Insertion Error ";
  }

 ?>