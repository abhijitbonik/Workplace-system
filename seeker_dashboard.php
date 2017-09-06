<?php 
   include("php_classes/seeker_auth.php");

?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Responsive Resume/CV Template for Developers</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="favicon.ico">  
    
    <!-- Global CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">   
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style.css">
     <?php
                      include("php_classes/db.php");
                      $phno=$_SESSION["cname"];
                      $query="Select cname, email, address, location, phno from `company_user` where phno = '$phno'";
                      $result = mysql_query($query) or die(mysql_error());
                      $row = mysql_fetch_assoc($result);
                      $mail = $row["email"];
                      $name= $row['cname'];

                      
                    ?>
</head> 

<body>
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
                                    <li><a href="seeker_dashboard.php">Dashboard</a></li>
                                    <li><a href="seeker_profile.php">Profile</a></li>
                                    <li><a href="seeker_jobs.php">Post Jobs</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                    
                                    
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile" src="img/profile.png" alt="" />
                <h1 class="name"><?php echo $name; ?></h1>
                <h3 class="tagline">Full Stack Developer</h3>
            </div><!--//profile-container-->
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa fa-envelope"></i><a href="mailto: "><?php echo $mail; ?></a></li>
                    <li class="phone"><i class="fa fa-phone"></i><a href="tel:0123 456 789"><?php echo $phno; ?></a></li>
                    <li class="website"><i class="fa fa-globe"></i><a href="http" target="_blank">portfoliosite.com</a></li>
                    <li class="linkedin"><i class="fa fa-linkedin"></i><a href="#" target="_blank">linkedin.com</a></li>
                    <li class="github"><i class="fa fa-github"></i><a href="#" target="_blank">github.com/username</a></li>
                    <li class="twitter"><i class="fa fa-twitter"></i><a href="https://twitter.com/3rdwave_themes" target="_blank">@twittername</a></li>
                </ul>
            </div><!--//contact-container-->
            <div class="education-container container-block">
                <h2 class="container-block-title">Education</h2>
                <div class="item">
                    <h4 class="degree">MSc in Computer Science</h4>
                    <h5 class="meta">University of London</h5>
                    <div class="time">2011 - 2012</div>
                </div><!--//item-->
                <div class="item">
                    <h4 class="degree">BSc in Applied Mathematics</h4>
                    <h5 class="meta">Bristol University</h5>
                    <div class="time">2007 - 2011</div>
                </div><!--//item-->
            </div><!--//education-container-->
            
            
            
        </div><!--//sidebar-wrapper-->
        
       <div class="main-wrapper ">
           
            <section class="section summary-section row">
                <h2 class="section-title"><i class="fa fa-user"></i>Update Company Description</h2>
                <div class="summary">
                   
                    
                    <form role="form" id = "form1" name="form1" class="col-md-8 " method="post" action="php_classes/company_update.php">
                             
                       <div class="form-group">
                                
                                <textarea class="form-control" name="desc"  id="desc"  rows="3" ></textarea>
                       </div>
                     <div class="form-group col-md-12">
                           <button id ="sub" type="submit" class="btn btn-success"  >Update</button>
                           
                     </div>
                     <div class="form-group col-md-12">
                     <span id="result"></span>
                     </div>
                 </form>
                        </div><!--//summary-->
            </section>
           
           <section class="section experiences-section row">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Request for the jobs</h2>

                <?php 
                     include("php_classes/db.php");
                     $query = $query = "SELECT job_apply.job_id as job_id, writer_user.phno as user_id, wname, cname, job_name, job_descrp, post_date, job_rate, expire_date, status FROM job_posts, company_user, job_apply, writer_user WHERE company_id = company_user.phno AND job_posts.job_id = job_apply.job_id AND writer_user.phno = user_id AND 
                         company_id = $phno LIMIT 0 , 30";
                     $result = mysql_query($query) or die(mysql_error());
                     $count=1;
                     while($row = mysql_fetch_assoc($result))
                     { ?>
                                 <div class="item border">
                    <div class="meta ">
                        <div class="upper-row">
                            <form role="form" id = <?php echo $count; ?> name="form" method="post" action="job_approve.php">
                            <h3 class="job-title"> <?php echo $row["job_name"]; ?></h3>
                            <div class="time">Valid till: <?php echo $row["expire_date"]; echo " Requested by "; echo $row["wname"]; ?></div>
                        </div><!--//upper-row-->
                        <div class="company">Rate: <?php echo $row["job_rate"]; ?> Posted by: <?php echo $row["cname"];?></div>
                    </div><!--//meta-->
                    <div class="details">
                        <p><?php echo $row["job_descrp"]; ?></p>  
                        <input name ="jobid" type = "hidden" value = <?php echo $row["job_id"] ?> />
                        <input name ="userid" type = "hidden" value = <?php echo $row["user_id"] ?> />
                        <button type="submit" id = "sub" class="btn btn-primary"  >Approve</button>
                        <span id="result"></span>
                        </form>
                    </div><!--//details-->
                </div><!--//item-->
               

                 <?php $count++; } ?>
                
                
                
            </section><!--// section-->
             
            
        </div><!--//main-body-->

    </div>
     
    <footer class="footer navbar-fixed-bottom text-center">
       <p>Copyright: &copy; <a href="http://networksofshon">Abhijit</a> | All rights reserved</p>
    </footer>
    <!-- Javascript -->          
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>    
    <!-- custom js -->
    <script type="text/javascript" src="js/main.js"></script>   
    <script type="text/javascript" src="js/update.js"></script>
          
</body>
</html> 

