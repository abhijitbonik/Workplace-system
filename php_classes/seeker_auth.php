
<?php
session_start();
if(!isset($_SESSION["cname"])){
header("Location: seeker_login.php");
exit(); }
?>
