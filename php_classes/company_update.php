<?php 
   
   session_start();
   include("db.php");

   if(isset($_POST['desc']))
   {
              
           $desc = $_POST['desc'];
           $phno = $_SESSION['cname'];

           $query = "UPDATE `company_user` SET descrp = '$desc' where phno = '$phno' ";
           if(mysql_query($query))

     echo "Successfully inserted";

   else

   	echo "Insertion Error ";


   }

?>