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
                
        <div class="main-wrapper">
            
            <section class="section summary-section row">
                 <h2 class="section-title"><i class="fa fa-briefcase"></i>Post a Job</h2>
                <div class="summary">
                    
                    <form role="form" id = "form1" name="form1" class="col-md-8 " method="post" action="php_classes/job_update.php">
                             
                       <div class="form-group">
                      
                             <input type="text" class="form-control" name="jobname" id="jobname" placeholder="Job Titile">
                        </div>
                        
                        <div class="form-group">
                                
                                <textarea class="form-control" name="jobdescrp"  id="jobdescrp"  rows="3" placeholder="Give detail descrption"></textarea>
                       </div>
                         <div class="form-group">
                      
                             <input type="text" class="form-control" name="jobrate" id="jobrate" placeholder="Enter Rate">
                        </div>
                         <div class="form-group">
                             Enter Expire Date
                             <input type="date" class="form-control" name="jobexpire" id="jobexpire" placeholder="Expire On">
                        </div>
                        
                     <div class="form-group col-md-12">
                           <button type="submit" id ="sub" class="btn btn-success"  >Insert</button>
                     </div>
                     <div class="form-group col-md-12">
                     <span id="result"></span>
                     </div>
                 </form>

                        </div><!--//summary-->
            </section>

            <section class="section experiences-section row">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Newly posted jobs by You</h2>

                <?php 
                     include("php_classes/db.php");
                     $phno=$_SESSION["cname"];
                     $date = date("Y-m-d");
                     $query = $query = "SELECT job_id, cname, job_name, job_descrp, post_date, job_rate, expire_date, job_status FROM job_posts, company_user WHERE company_id = phno and company_id = '$phno' and job_status != 'Approved' and job_status != 'Completed' LIMIT 0 , 30";
                     $result = mysql_query($query) or die(mysql_error());
                     $count=1;
                     while($row = mysql_fetch_assoc($result))
                     { ?>
                                 <div class="item border">
                    <div class="meta">
                        <div class="upper-row">
                            <form role="form" id = <?php echo $count; ?> name="form" method="post" action="job_delete.php">
                            <h3 class="job-title"> <?php echo $row["job_name"]; ?></h3>
                            <div class="time"><?php if($row["expire_date"]<$date){ echo '<label class="label label-danger col-md-12" >This job has expired.Please delete it.</label>';} else {echo "Valid till: ";echo $row["expire_date"];}?></div>
                        </div><!--//upper-row-->
                        <div class="company">Rate: <?php echo $row["job_rate"]; ?> Posted by: <?php echo $row["cname"];?></div>
                    </div><!--//meta-->
                    <div class="details">
                        <p><?php echo $row["job_descrp"]; ?></p>  
                        <input name ="jobid" type = "hidden" value = <?php echo $row["job_id"] ?> />
                        <div class="form-group">
                        <button type="submit" id = "sub" class="btn btn-primary"  >Delete this job</button>
                        </div>
                        <span id="result"></span>
                        </form>
                    </div><!--//details-->
                </div><!--//item-->
               

                 <?php $count++; } ?>
                
                
                
            </section><!--//section-->
                
            
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

