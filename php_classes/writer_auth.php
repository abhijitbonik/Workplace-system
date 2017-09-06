

<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: writer_login.php");
exit(); }
?>
