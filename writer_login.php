<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Freelance</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">

</head>

<body>
    <!-- ====================================================
	header section -->
    <header class="top-header">
        <div class="container">
            <div class="row header-row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <a href="index.html"><img src="img/logo.png" alt="" class="logo"></a>
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="register.php">Register</a></li>
									<li><a href="login.php">Log In</a></li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- banner area starts here -->
  
   

    <!-- service section -->

    <section class="service text-left" id="sec3">
        <div class="container">
            <div class="row">
                <br><br><br><br><br>
				<div class="col-md-12">
				<h2>Writer's Account </h2>
                    <img src="img/daag.png" alt="">

                    <p>It's none of their business that you have to learn to write.
                        <br>
                        <br> Let them think you were born that way. - Ernest Hemingway</p>
                
                  <?php
    require('php_classes/db.php');
    session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
        $username = $_POST['email'];
        $password = $_POST['password'];
        $username = stripslashes($username);
        $username = mysql_real_escape_string($username);
        $password = stripslashes($password);
        $password = mysql_real_escape_string($password);
    //Checking is user existing in the database or not
        $query = "SELECT * FROM `writer_user` WHERE email='$username' and password='".md5($password)."'";
        $result = mysql_query($query) or die(mysql_error());
        $rows = mysql_num_rows($result);
        if($rows==1){
            $row = mysql_fetch_assoc($result);
            $_SESSION['username'] = $row["phno"];
            header("Location: writer_profile.php"); // Redirect user to index.php
            }else{
                echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
                }
    }else{ ?>      <div class="login">
                  <h1>Login</h1>
                    <form method="post">
    	              <input type="text" name="email" placeholder="Email" required="required" />
                     <input type="password" name="password" placeholder="Password" required="required" />
                     <button type="submit" class="btn btn-primary btn-block btn-large">LogIn</button>
                   </form>
                  <p>Not registered yet? <a href='writer_register.php'>Register Here</a></p>
               </div>
               <?php } ?>
               </div>
                
            </div>
        </div>
    </section>
    <!-- about section ends -->
<br>
   <br>
 <br>
<br>
 <br>
    <!-- footer starts here -->
    <footer class="footer text-center">
        <p>Copyright: &copy; <a href="http://networksofshon">Abhijit</a> | All rights reserved</p>
    </footer>
    <!-- script tags
	============================================================= -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
