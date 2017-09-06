
<?php include("php_classes/db.php");
 include("php_classes/seeker_auth.php");

 $phno =  $_SESSION["cname"];


 $_FILES["image"]["name"] = $_SESSION["cname"].".jpg";
 if(isset($_POST['submit'])){
      $msg = '';
    
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $chk_file = $target_file;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    if (copy($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=basename( $_FILES["image"]["name"]); // used to store the filename in a variable

    //storind the data in your database
    
        $query = "UPDATE `company_user` SET image = '$image' where phno = '$phno'" ;
   

    mysql_query($query) or die(mysql_error());
 
 }
 
?>























      